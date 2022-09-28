<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    //
    public function payment()
    {
        return view('client.payment');
    }
    public function __construct()
    {
        $this->vnp=Config::get('vnp');
//        dd($this->vnp['vnp_Returnurl']);
        $this->obj=new Payment();
    }
    public function vnpPayment(Request $request)
    {
//        dd($request->id);
//        dd($this->vnp['vnp_TmnCode']);
//        $vnp_Inv_Type= time();
        $vnp_TxnRef = $request->code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh Toán Qua VN Pay';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->total_pr * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//        dd($vnp_TxnRef);
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $this->vnp['vnp_TmnCode'],
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $this->vnp['vnp_Returnurl'],
//            "vnp_Inv_Type"=>$vnp_Inv_Type,
            "vnp_TxnRef" =>$vnp_TxnRef,
        );
//        dd($vnp_Inv_Type,$vnp_TxnRef);
//        dd(str_replace($vnp_Inv_Type,'',$vnp_TxnRef));
//        dd($inputData);
//        echo "<pre>";
//        print_r($inputData);
//        echo "</pre>";
//        die();
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

//var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $this->vnp['vnp_Url'] . "?" . $query;
        if (isset($this->vnp['vnp_HashSecret'])) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $this->vnp['vnp_HashSecret']);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }


    public function IPN(Request $request)
    {
      //  dd(1);
        /* Payment Notify
   * IPN URL: Ghi nhận kết quả thanh toán từ VNPAY
   * Các bước thực hiện:
   * Kiểm tra checksum
   * Tìm giao dịch trong database
   * Kiểm tra số tiền giữa hai hệ thống
   * Kiểm tra tình trạng của giao dịch trước khi cập nhật
   * Cập nhật kết quả vào Database
   * Trả kết quả ghi nhận lại cho VNPAY
   */
        $vnp_HashSecret=$this->vnp['vnp_HashSecret'];
        $inputData = array();
        $returnData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
//        $bank=$inputData['vnp_BankTranNo'];
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
        $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
        $vnp_Amount = $inputData['vnp_Amount'] / 100; // Số tiền thanh toán VNPAY phản hồi
        $paid = 0; // Là trạng thái thanh toán của giao dịch chưa có IPN lưu tại hệ thống của merchant chiều khởi tạo
//        URL thanh toán.
//        dd($paid);
        $orderId = $inputData['vnp_TxnRef'];
//        echo "<pre>";
//        print_r($orderId);
//        echo "</pre>";
//        die();
        try {
            //Check Orderid
            //Kiểm tra checksum của dữ liệu
            if ($secureHash == $vnp_SecureHash) {
                //Lấy thông tin đơn hàng lưu trong Database và kiểm tra trạng thái của đơn hàng, mã đơn hàng là: $orderId
                //Việc kiểm tra trạng thái của đơn hàng giúp hệ thống không xử lý trùng lặp, xử lý nhiều lần một giao dịch
                //Giả sử: $order = mysqli_fetch_assoc($result);
                $result=$this->obj->loadOne($orderId);
                $order = [];
                foreach ($result as $or) {
                    $order[] = $or;
                }
                if ($order != NULL) {
                    if ($order[0]->total_pr == $vnp_Amount) //Kiểm tra số tiền thanh toán của giao dịch: giả sử số tiền
//                    kiểm tra là đúng. //$order["Amount"] == $vnp_Amount
                    {
                        if ($order[0]->paid == 0) {
                        if ($inputData['vnp_ResponseCode'] == '00' || $inputData['vnp_TransactionStatus'] == '00') {
                            $paid = 1; // Trạng thái thanh toán thành công
                        } else {
                            $paid = 0; // Trạng thái thanh toán thất bại / lỗi
                        }
                        //Trả kết quả về cho VNPAY: Website/APP TMĐT ghi nhận yêu cầu thành công
                        $returnData['RspCode'] = '00';
                        $returnData['Message'] = 'Confirm Success';
                            //Cài đặt Code cập nhật kết quả thanh toán, tình trạng đơn hàng vào DB
                          $query=$this->obj->updatePaid($orderId);
                    } else {
                        $returnData['RspCode'] = '02';
                        $returnData['Message'] = 'Order already confirmed';
                    }
                } else {
                    $returnData['RspCode'] = '04';
                    $returnData['Message'] = 'invalid amount';
                }
            } else {
                $returnData['RspCode'] = '01';
                $returnData['Message'] = 'Order not found';
            }
        } else {
                $returnData['RspCode'] = '97';
                $returnData['Message'] = 'Invalid signature';
            }
        } catch (Exception $e) {
            $returnData['RspCode'] = '99';
            $returnData['Message'] = 'Unknow error';
        }
        //Trả lại VNPAY theo định dạng JSON
        echo json_encode($returnData);
    }

    public function resultPay(Request $request){

        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $this->vnp['vnp_HashSecret']);
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
//                echo "GD Thanh cong";
                return view('client.complete-pay');
            }
            else {
                echo "GD Khong thanh cong";
            }
        } else {
            echo "Chu ky khong hop le";
        }

    }
}
