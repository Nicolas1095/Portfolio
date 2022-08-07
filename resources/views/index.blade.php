@extends('layouts.structure')
@section('content')
    <nav class="nav d-flex justify-content-end align-item-center">
        <div class="nav-content row mx-sm-5">
            <a class="btn btn-rounded nav-link text-light col-sm-auto col-5 mx-sm-2 m-1 order-2"
                href="#home">{{ __('Home') }}</a>
            <a class="btn btn-rounded nav-link text-light col-sm-auto col-5 mx-sm-2 m-1 order-3"
                href="#about">{{ __('About Me') }}</a>
            <a class="btn btn-rounded nav-link text-light col-sm-auto col-5 mx-sm-2 m-1 order-4"
                href="#certifications">{{ __('Certifications') }}</a>
            <a class="btn btn-rounded nav-link text-light col-sm-auto col-5 mx-sm-2 m-1 order-4"
                href="#proyects">{{ __('Proyects') }}</a>
            <a class="btn btn-rounded nav-link text-light col-sm-auto col-5 mx-sm-2 m-1 order-5"
                href="#skills">{{ __('Skills') }}</a>
            <a class="btn btn-rounded nav-link text-light col-sm-auto col-5 mx-sm-2 m-1 order-6"
                href="#contact">{{ __('Contact') }}</a>
            @auth <form action="{{ route('logout') }}" method="post"> @csrf <button
                        class="btn btn-rounded nav-link bg-danger text-light col-sm-auto col-2 mx-sm-2">{{ __('Log Out') }}</button>
                </form>
            @endauth
        </div>
        <div class="nav-button enabled"><i class="fa fa-bars" aria-hidden="true"></i></div>
    </nav>
    <section class="presentation" id="home">
        <div id="presentation_name">
            <h1 class="text-light" id="presentation_name">Nicolas Galárraga</h1>
        </div>
        <div class="bar"></div>
        <div id="developer">
            <h1 class="text-light">{{ __('Fullstack Developer') }}</h1>
        </div>
        <a href="#about" class="btn btn_rounded text-light btn_presentation m-1">{{ __('About Me') }}</a>
        <div class="presentation__background">
            <video muted src="{{ asset('video/pexels-mikhail-nilov-7534244.mp4') }}" autoplay loop></video>
            <div class="cover"></div>
        </div>
    </section>
    <div class="container d-flex justify-content-center flex-column text-center m-0 p-3 bg-light">
        <section class="inf">
            <article id="about">
                <h2 class="text-primary m-4">{{ __('About me') }}</h2>
                <p>{{ __('I am an individual with an entrepreneurial mind, who enjoys the challenges and circumstances that my work represents, for which I can develop and personalize my projects in detail. I have enough experience in web development in areas such as HTML, CSS3, JavaScript, PHP, Python, Laravel, and Django so if you want to develop your business ') }}<a
                        href="#contact"><b>{{ __('Contact me') }}</b></a>{{ __(' and you can acquire your own identity which your need') }}
                </p>
            </article>
            <article id="certifications">
                <h2 class="text-primary m-4">{{ __('My certifications') }}</h2>
                <div class="cards_container">
                    <div class="row justify-content-center">
                        @auth
                            <div class="col-sm-10 col-md-5 col-lg-3 col-10 card card_form p-3">
                                <form action="{{ route('certification.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-file">
                                        <input type="file" name="img_certification" id="img_certification"
                                            class="custom-file-input">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                    <label for="name_certification" class="m-1">Name</label>
                                    <input type="text" name="name_certification" id="name_certification"
                                        class="form-control">
                                    <label for="granted_by" class="m-1">Granted by</label>
                                    <input type="text" name="granted_by" id="granted_by" class="form-control">
                                    <button type="submit" class="btn btn_rounded m-1 text-light">enviar</button>
                                </form>
                            </div>
                        @endauth
                        @foreach ($certifications as $certification)
                            <div class="col-sm-10 col-md-5 col-lg-3 col-10 card p-3">
                                <img class="img-fluid" src="{{ public_path(Storage::url($certification->img)) }}" alt="">
                                <h4 class="text-secondary m-2">{{ __($certification->name) }}</h4>
                                <span class="text-muted">{{ $certification->granted_by }}</span>
                                @auth
                                    <form action="{{ route('certifications.delete', $certification->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                @endauth
                            </div>
                        @endforeach
                    </div>
                </div>
            </article>
            <article id="proyects">
                <h2 class="text-primary m-4">{{ __('Proyects') }}</h2>
                <div class="cards_container">
                    <div class="row justify-content-center">
                        @auth
                            {{-- <!--<div class="card card__add justify-content-center">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <a href="#"></a>
                                </div>--> --}}
                            <div class="col-sm-10 col-md-5 col-lg-3 col-10 card card_form p-3">
                                <form action="{{ route('proyects.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-file">
                                        <input type="file" name="img_proyect" id="img_proyect" class="custom-file-input">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                    <label for="name_proyect" class="m-1">Name</label>
                                    <input type="text" name="name_proyect" id="name_proyect" class="form-control">
                                    <div class="links">
                                        <div class="row justify-content-center">
                                            <label for="link" class="col-5 m-1">Link</label>
                                            <label for="github" class="col-5 m-1">Github link</label>
                                        </div>
                                        <div class="row justify-content-center">
                                            <input type="text" name="link" id="link"
                                                class="form-control col-5 m-1">
                                            <input type="text" name="github" id="github"
                                                class="form-control col-5 m-1">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn_rounded m-1 text-light">Send</button>
                                </form>
                            </div>
                        @endauth
                        @foreach ($proyects as $proyect)
                            <div class="col-sm-10 col-md-5 col-lg-3 col-10 card p-2">
                                <img class="img-fluid" src="{{ public_path(Storage::url($proyect->img)) }}" alt="">
                                <h4 class="text-secondary m-2">{{ __($proyect->name) }}</h4>
                                <div class="buttons">
                                    <div class="row justify-content-center">
                                        <a href="https:/{{ $proyect->link }}" target="_blank"
                                            class="btn btn_rounded col-5 m-1 text-light">{{ __('See website') }}</a>
                                        <a href="{{ $proyect->github }}" target="_blank"
                                            class="btn btn_rounded col-5 m-1 text-light">{{ __('See in github') }}</a>
                                        @auth
                                            <form action="{{ route('proyects.delete', $proyect->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </article>
            <article id="skills">
                <h2 class="text-primary m-4">{{ __('Skills') }}</h2>
                <div class="row justify-content-center">
                    @auth
                        <div class="col-sm-4 col-10 card card_form p-3">
                            <form action="{{ route('skills.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file">
                                    <input type="file" name="img_skill" id="img_skill" class="custom-file-input">
                                    <label class="custom-file-label" for="file">Choose file</label>
                                </div>
                                <label for="name_skill" class="m-1">Name</label>
                                <input type="text" name="name_skill" id="name_skill" class="form-control">
                                <label for="type" class="m-1">Type</label>
                                <div class="type_select">
                                    <select name="type" id="type" class="form-control m-1">
                                        <option value="" hidden>{{ __('Select type') }}</option>
                                        @foreach ($skills_types as $skill_type)
                                            <option value="{{ $skill_type->id }}" class="form-control">
                                                {{ $skill_type->type }}</option>
                                        @endforeach
                                    </select>
                                    <span id="add_type" class="btn btn-outline-dark m-1">{{ __('Add') }}</span>
                                </div>
                                <button class="btn btn_rounded m-1 text-light">{{ __('Send') }}</button>
                            </form>
                            <form action="{{ route('skills_types.store') }}" method="post"
                                class="form_float p-2 rounded position-absolute">
                                @csrf
                                <i class="fa fa-times text-danger close rounded-circle" aria-hidden="true"></i>
                                <input type="text" name="skill_type" id="skill_type" class="form-control my-1"
                                    placeholder="Name">
                                <button class="btn btn-outline-light my-1">{{ __('Send') }}</button>
                            </form>
                        </div>
                    @endauth
                    @for ($i = 0; $i < count($skills_types); $i++)
                        <div
                            class="skill_category bg-white rounded p-2 col-10 col-md-5 m-2 d-flex flex-column align-items-center">
                            <h3 class="text-secondary text-capitalize m-3">{{ $skills_types[$i]->type }}</h3>
                            <div class="row align-items-center justify-content-center">
                                @foreach ($skills as $skill)
                                    @if ($skill->type == $skills_types[$i]->type)
                                        <div class="skill m-2 col-md-3 col-5">
                                            @auth
                                                <form action="{{ route('skills.delete', $skill->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            @endauth
                                            <img class="skill_img" src="{{ public_path(Storage::url($skill->img)) }}"
                                                alt="{{ $skill->name }}">
                                            <span class="skill_name">{{ $skill->name }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endfor
                </div>
            </article>
        </section>
        <section id="contact" class="footer_content">
            <h2 class="text-primary m-4">{{ __('Contact') }}</h2>
            <div class="contact">
                <div class="form">
                    <form method="post" action="{{ route('sendMessages') }}" class="">
                        @csrf
                        <label for="name" class="m-2">{{ __('Name') }}:</label>
                        <input type="text" name="name" id="name" class="form-control">
                        <label for="phone" class="m-2">{{ __('Phone Number') }}:</label>
                        <input type="num" name="phone" id="phone" class="form-control">
                        <label for="email" class="m-2">{{ __('Email') }}:</label>
                        <input type="email" name="email" id="email" class="form-control">
                        <label for="subject" class="m-2">{{ __('Subject') }}:</label>
                        <input type="text" name="subject" id="subject" class="form-control">
                        <label for="message" class="m-2">{{ __('Message') }}:</label>
                        <textarea name="message" id="message" rows="10" style="min-height: 70px; height: 75px" class="form-control"></textarea>
                        <button type="submit" name="enviar"
                            class="btn btn_rounded m-2 text-light">{{ __('Send') }}</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <div class="d-flex justify-content-center social bg-white border m-0 p-1">
        <a href="https://m.me/nicolas.galarraga.5891" target="_blank" class="m-1 rounded-circle" id="messenger"><i
                class="fab fa-facebook-messenger" aria-hidden="true"></i></a>
        <a href="https://www.linkedin.com/in/nicolas-galarraga/" target="_blank" class="m-1 rounded-circle"
            id="linkedin"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
        <a href="https://t.me/NicolasGalarraga" target="_blank" class="m-1 rounded-circle" id="telegram"><i
                class="fab fa-telegram-plane" aria-hidden="true"></i></a>
    </div>
@endsection
