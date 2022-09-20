@foreach($shipping as $sh)
    <p value="{{$sh->id}}">{{$sh->fee}}$</p>
@endforeach
