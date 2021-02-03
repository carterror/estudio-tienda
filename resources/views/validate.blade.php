@if(Session::has('message'))
<div class="container">
<div class="mtop16 alert alert-{{ Session::get('typealert')}}" style="display: none;">
<i class="fas {{ Session::get('icon') }}"></i> {{ Session::get('message') }}
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li style="margin-left: 20px;">{{ $error }}</li>  
            @endforeach
        </ul>
    @endif
</div>
</div>
@endif 