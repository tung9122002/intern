<form method="POST" action="{{route('vnp_payment')}}">
    @csrf
    <div class="form-group">
        <button style="margin-left: 300px;margin-right: 300px" type="submit" name="redirect" class="btn btn-dark btm-md full-width">Thanh Toán VNPAY</button>
    </div>
</form>
