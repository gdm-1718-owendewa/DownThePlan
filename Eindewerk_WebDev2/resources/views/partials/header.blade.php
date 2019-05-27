@if(Auth::user())
<nav class=" navbar navbar-expand-md  bg-light fixed-top">
    <div class=" w-100 order-1 order-md-0">
        <ul class="navbar-nav mr-auto">
        
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{url('/about') }}">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{url('/policy') }}">Policy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark " href="{{url('/contact') }}">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark " href="{{url('/products') }}">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark " href="{{url('/credits') }}">Store</a>
      </li>
      </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="{{url('/') }}"><img src="{{asset('images/logo.svg')}}" style="width:50px;"></a>
        
    </div>
    <div class=" header navbar-collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link  text-dark" href="{{url('/logout') }}">Logout</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-dark">C.{{Auth::user()->credits}}</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-dark" href="{{url('/profile')}}">{{Auth::user()->name}}</a>
        </li>
        </ul>
    </div>
</nav>
@else

<nav class="navbar navbar-expand-md navbar-dark bg-light fixed-top">
    <div class="navbar-collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
        
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{url('/about') }}">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{url('/policy') }}">Policy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark " href="{{url('/contact') }}">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark " href="{{url('/products') }}">Products</a>
      </li>
      </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="{{url('/') }}"><img src="{{asset('images/logo.svg')}}" style="width:50px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link  text-dark" href="{{url('/login') }}">Login</a>
        </li>
        <li class="nav-item">
        <a class="nav-link  text-dark" href="{{ route('register') }}">Register</a>
        </li>
        </ul>
    </div>
</nav>
@endif
