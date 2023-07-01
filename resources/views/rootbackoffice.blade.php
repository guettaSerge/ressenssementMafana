<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Contact-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Footer-Clean.css')}}">
    <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Actor')}}">
    <link rel="stylesheet" href="{{asset('assets/css/Profile-Card.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">

    <title>accueil</title>
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand" href="#">Ressencement MA.FA.NA</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/personne">Personne</a></li>
                    <li class="nav-item"><a class="nav-link" href="/perefamille">Pere Famille</a></li>
                    <li class="nav-item"><a class="nav-link" href="/vallee">vallee</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tranobe">tranobe</a></li>
                    <li class="nav-item"><a class="nav-link" href="/inscription">Utilisateur</a></li>
                </ul>
            </div><a class="btn btn-primary" type="button" style="margin-left: 10px;background: var(--bs-green);border-radius: 10px;" href="/login">Se Connecter</a>
        </div>
    </nav>
    @yield('content')
    <footer class="footer-clean">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Legacy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Careers</h3>
                        <ul>
                            <li><a href="#">Job openings</a></li>
                            <li><a href="#">Employee success</a></li>
                            <li><a href="#">Benefits</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">Company Name © 2023</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
