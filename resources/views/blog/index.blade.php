@extends('layouts.frontend')
@section('title', '|Bog')
@section('content')

<section class="banner-area relative blog-home-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content blog-header-content col-lg-12">
                <h1 class="text-white">
                  Toutes l'actualité de l'Enset en temps réel
                </h1>
                <p class="text-white">
                    Communication Actualitées Evenements et toutes les information possible vous l''avez sur AB-Enset
                </p>
                <a href="blog-single.html" class="primary-btn">voir plus</a>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start top-category-widget Area -->
<section class="top-category-widget-area pt-90 pb-90 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-cat-widget">
                    <div class="content relative">
                        <div class="overlay overlay-bg"></div>
                        <a href="#" target="_blank">
                          <div class="thumb">
                               <img class="content-image img-fluid d-block mx-auto" src="{{asset('assets/frontend/img/blog/cat-widget1.jpg')}}" alt="">
                            </div>
                          <div class="content-details">
                            <h4 class="content-title mx-auto text-uppercase"> Communiquer</h4>
                            <span></span>
                            <p>Enjoy your social life together</p>
                          </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-cat-widget">
                    <div class="content relative">
                        <div class="overlay overlay-bg"></div>
                        <a href="#" target="_blank">
                          <div class="thumb">
                               <img class="content-image img-fluid d-block mx-auto" src="{{asset('assets/frontend/img/blog/cat-widget2.jpg')}}" alt="">
                            </div>
                          <div class="content-details">
                            <h4 class="content-title mx-auto text-uppercase">Actualiter</h4>
                            <span></span>
                            <p>Be a part of politics</p>
                          </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-cat-widget">
                    <div class="content relative">
                        <div class="overlay overlay-bg"></div>
                        <a href="#" target="_blank">
                          <div class="thumb">
                               <img class="content-image img-fluid d-block mx-auto" src="{{asset('assets/frontend/img/blog/cat-widget3.jpg')}}" alt="">
                            </div>
                          <div class="content-details">
                            <h4 class="content-title mx-auto text-uppercase">Evenement</h4>
                            <span></span>
                            <p>Let the food be finished</p>
                          </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End top-category-widget Area -->

<!-- Start post-content Area -->
<section class="post-content-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 posts-list">
                @foreach($posts as $post)
                <div class="single-post row">
                    <div class="col-lg-3  col-md-3 meta-details">
                        <ul class="tags">
                            <li><a href="#">{{$post->category->name}},</a></li>

                        </ul>
                        <div class="user-details row">
                            <p class="date col-lg-12 col-md-12 col-6"><a href="#">{{date('F nS, Y ',strtotime($post->created_at))}}</a> <span class="lnr lnr-calendar-full"></span></p>
                            <p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
                            <p class="comments col-lg-12 col-md-12 col-6"><a href="#"> {{ $post->comments()->count() }}</a> <span class="lnr lnr-bubble"></span></p>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-9 ">
                        <div class="feature-img">
                            <img class="img-fluid" src="../../documents/{{$post->file}}" style="height: 400px; width: 100%; clear: both; display: block; ">
                        </div>
                        <a class="posts-title" href="{{url('blog/'.$post->slug)}}"><h3>{{$post->title}}</h3></a>
                        <p class="excert">
                            {{substr( $post->body, 0, 300)}}{{strlen($post->body)>50 ? "...":""}}
                        </p>
                        <a href="{{url('blog/'.$post->slug)}}" class="primary-btn">Voir plus</a>
                    </div>
                </div>
                   @endforeach

                <nav class="blog-pagination justify-content-center d-flex">

                        {!! $posts->links(); !!}
                        

                        </nav>

            </div>

            <div class="col-lg-4 sidebar-widgets">
                <div class="widget-wrap">
                    <div class="single-sidebar-widget search-widget">
                        <form class="search-form" action="#">
                            <input placeholder="Search Communiquer" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="single-sidebar-widget user-info-widget">
                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style=" width:100px; height:100px; border-radius:50%; margin-right:25px;" alt="">
                        <a href="{{ route('profile') }}" class="d-block"><h4>{{ Auth::user()->name }}</h4></a>
                        <p>
                            Senior blog writer
                        </p>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                        </ul>
                        <p>
                            Boot camps have its supporters andit sdetractors.  Boot camps have itssuppor ters andits detractors.
                        </p>
                    </div>
                    <div class="single-sidebar-widget popular-post-widget">
                        <h4 class="popular-title">Comuniquer populaire</h4>
                        <div class="popular-post-list">
                            @foreach($posts as $post)
                            <div class="single-post-list d-flex flex-row align-items-center">

                                <div class="thumb">
                                    <img class="img-fluid" src="../../documents/{{$post->file}}" style="height: 70px; width: 90px; clear: both; display: block; alt="">
                                </div>
                                <div class="details">

                                    <a href="blog-single.html"><h6>{{$post->title}}</h6></a>
                                    <p>{{date('F nS, Y ',strtotime($post->created_at))}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="single-sidebar-widget ads-widget">
                        <a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
                    </div>
                    <div class="single-sidebar-widget post-category-widget">
                        <h4 class="category-title"> Catgories Communiquer </h4>
                        <ul class="cat-list">
                            @foreach($categories as $category)
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>{{$category->name}}</p>
                                    <p> {{ $post->category()->count() }}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single-sidebar-widget newsletter-widget">
                        <h4 class="newsletter-title">Newsletter</h4>
                        <p>
                            Here, I focus on a range of items and features that we use in life without
                            giving them a second thought.
                        </p>
                        <div class="form-group d-flex flex-row">
                           <div class="col-autos">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" >
                              </div>
                            </div>
                            <a href="#" class="bbtns">Subcribe</a>
                        </div>
                        <p class="text-bottom">
                            You can unsubscribe at any time
                        </p>
                    </div>
                    <div class="single-sidebar-widget tag-cloud-widget">
                        <h4 class="tagcloud-title">Aplication</h4>
                        <ul>
                             @foreach($tags as $tag)
                                <li><a href="#">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    @endsection
