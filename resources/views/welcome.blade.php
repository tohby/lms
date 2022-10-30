<!-- /*
* Template Name: Passion
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/feather/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/style.css">

    <title>LMS</title>
</head>

<body>


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <div class="container">


        <nav class="site-nav">
            <div class="logo">
                <a href="index.html" class="text-white">LMS<span class="text-black">.</span></a>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-lg-12 site-navigation text-center">
                    <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right menu-absolute">
                        <li class="cta-button"><a href="{{ route('register') }}">Sign up</a></li>
                    </ul>

                    <a href="#" class="burger light ml-auto site-menu-toggle js-menu-toggle d-block d-lg-none"
                        data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </nav> <!-- END nav -->
    </div> <!-- END container -->


    <div class="hero overlay h-100" data-stellar-background-ratio="0.5"
        style="background-image: url('images/hero-min.jpg')">

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="row justify-content-around align-items-center">
                        <div class="col-lg-7 intro">
                            <h1 data-aos="fade-up" data-aos-delay="0">Get your new book with the best price</h1>
                            <p class="text-white mb-4" data-aos="fade-up" data-aos-delay="100">Far far away, behind the
                                word mountains, far from the countries Vokalia and Consonantia, there live the blind
                                texts. Separated they live.</p>
                            <p data-aos="fade-up" data-aos-delay="200"><a href="{{ route('register') }}"
                                    class="btn btn-primary">Get
                                    Started</a></p>
                        </div>

                        <div class="col-lg-4">
                            <form method="POST" action="{{ route('login') }}" class="form-register">
                                @csrf
                                <h2 class="mb-2">Sign in</h2>
                                <p>Don't have an account? <a href="{{ route('register') }}">sign up</a></p>
                                <div class="form-group row px-2">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row px-2">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row px-2">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
