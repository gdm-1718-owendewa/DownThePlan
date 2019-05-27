@extends('layout')

@section('content')

<div>

    <div class="contactBox">
        <!--Section: Contact v.2-->
        <section class="mb-4 ">

            <p class="text-center w-responsive mx-auto mb-5">Heeft u vragen? Blijf er niet met zitten contacteer ons direct. Ons team zal ervoor zorgen dat u zo snel mogelijk een antwoord ontvangt.</p>
            <div class="row">

                <div class="col-md-9 mb-md-0 mb-5 mt-2">
                    <form id="contact-form" name="contact-form" action="{{route('contactSend')}}" method="POST">
                    @if (session('fail'))
                <div class="alert alert-danger col-lg-12">
                    {{ session('fail') }}
                </div>
                @endif
                @if (session('succes'))
                <div class="alert alert-success col-lg-12">
                    {{ session('succes') }}
                </div>
            @endif
                    @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                <label for="name" class="">Your name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                <label for="email" class="">Your email</label>

                                    <input type="text" id="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                <label for="subject" class="">Subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="md-form">
                                <label for="message">Your message</label>
                                    <textarea type="text" id="message" name="message" rows="2"
                                        class="form-control md-textarea"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-md-left">
                        <a class="btn btn-primary text-white mt-4 mb-4" onclick="document.getElementById('contact-form').submit();">Send</a>
                    </div>
                    <div class="status"></div>
                </div>
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>Gent, 9000 , BE</p>
                        </li>
                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>+324 71 13 03 95</p>
                        </li>
                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>owendewa@student.arteveldehs.be</p>
                        </li>
                    </ul>
                </div>

            </div>
            @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        <ul>
         
            <li>{{ $error }}</li>
         
        </ul>
      </div>
      @endforeach
        </section>
    </div>
</div>

@endsection
