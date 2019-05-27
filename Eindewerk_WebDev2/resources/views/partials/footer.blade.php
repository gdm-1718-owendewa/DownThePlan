<footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                 <a href="{{url('/') }}"> <img src="{{asset('images/footerlogo.svg')}}" style="width:100px; margin-top:10%;"> </a>
                </div>
                <div class="col-sm-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/login')}}">Sign up</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="{{url('/about')}}">Company Information</a></li>
                        <li><a href="{{url('/contact')}}">Contact us</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="{{url('/policy')}}">TOS</a></li>
                       
                    </ul>
                </div>
                <div class="col-sm-3">
                    <a  href="{{url('/contact')}}" class="btn btn-default mt-5">Contact us</a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2019 Owen De Waele</p>
        </div>
    </footer>