
@extends('layouts.frontend')




@section('content')

<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
            <div class="banner-content col-lg-9 col-md-12">
                <h1 class="text-uppercase">
                    l'innovation pédagogique au coeur des enjeux . 
                </h1> 
                <p class="pt-10 pb-10"  style="color: #eee;">
                   Avec AB-Enset profiter de d'une Expérience unique  et soyer ravie 
                </p>
                <a href="#" class="primary-btn text-uppercase">Commencer</a>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start feature Area -->
<section class="feature-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4>L'actualité de l'ENSET</h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            Rester a la une de l'actualité a l'Enset et vous êtes informé de la moindre information .
                        </p>
                        <a href="#">Regiogner Nous</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4>Les Evement a la une</h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            Rester a la une des évènements pour pourvoir y participer .
                        </p>
                           .
                        <a href="#">Regiogner Nous</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4> Cours et Memoires Disponible </h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            Abonnez vous pour avoir a un espace étudiant pour suivre tous vos cours.
                        </p>
                        <a href="#">Regiogner Nous</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End feature Area -->


<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Communiqués & Evenements a l'Enset </h1>
                    <p> Pour plus d'information aller voir à Communiqués&Evenements</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="img-fluid" src="../../documents/{{$post->file}}" style="height: 200px; width: 100%; clear: both; display: block; ">
                </div>
                <p class="meta">{{date('nS F , Y ',strtotime($post->created_at))}}  |  By <a href="#">{{$post->user->name}}</a></p>
                <a class="posts-title" href="{{url('blog/'.$post->slug)}}"><h3> {{substr( $post->title, 0, 20)}}{{strlen($post->title)>50 ? "...":""}}</h3></a>
                <p>
                    {{substr( $post->body, 0, 30)}}{{strlen($post->body)>50 ? ".....":""}}
                </p>
                <a href="{{url('blog/'.$post->slug)}}" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End blog Area -->


<!-- Start search-course Area -->
<section class="review-area section-gap relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
       
        <div class="section-top-border">
            <h1 class="mb-30 title text-center">AB-Enset en chiffres</h1>
            <br><br>
            <div class="row">
                <div class="col-md-3">
                    <div class="single-defination">
                        <h2 class="mb-20 text-center">50000 </h2>
                        <p  class="text-center"> Etudiant</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-defination">
                        <h2 class="mb-20 text-center">350</h2>
                        <p  class="text-center">Cours</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-defination text-center">
                        <h4 class="mb-20">1900</h4>
                        <p  class="text-center">Memoires</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-defination text-center">
                        <h4 class="mb-20">300</h4>
                        <p class="text-center">Derniers Communiquers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End search-course Area -->


<!-- Start upcoming-event Area -->

<!-- End upcoming-event Area -->

<!-- Start review Area -->
<br>
<section class="review-area section-gap relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row">
            <div class="active-review-carusel">
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Chef de département</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Enseignant</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>AE-Enset</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Service de la scolarité</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Cellule informatique</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Service CPS</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <img src="{{asset('assets/frontend/img/r1.png')}}" alt="">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Cabinet du directeur</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Club Enset</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End review Area -->

<!-- Start cta-one Area -->
<section class="cta-one-area relative section-gap">
    <div class="container">
        <div class="overlay overlay-bg"></div>
        <div class="row justify-content-center">
            <div class="wrap">
                <h1 class="text-white">Vous pouvez rester informer des actualités et évènements rattachés à l'ENSET en cliquant sur le lien ci-dessous</h1>
               
                <a class="primary-btn wh" href="#">Voir L'actualité</a>
            </div>
        </div>
    </div>
</section>
<!-- End cta-one Area -->




<!-- Start cta-two Area -->
<section class="cta-two-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 cta-left">
                <h1>L'offre de formation</h1>
            </div>
            <div class="col-lg-4 cta-right">
                <a class="primary-btn wh" href="{{route('blog.index')}}">Voir notre blog</a>
            </div>
        </div>
    </div>
</section>


@endsection
