@extends('layouts.frontend')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title',"| $titleTag")
@section('content')

<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Blog Details Page
                </h1>
                <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start post-content Area -->
<section class="post-content-area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid"  src="../../documents/{{$post->file}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3 meta-details">
                        <ul class="tags">
                            <li><a href="#">{{$post->category->name}}</a></li>

                        </ul>
                        <div class="user-details row">
                            <p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
                            <p class="date col-lg-12 col-md-12 col-6"><a href="#">{{date('F nS, Y' ,strtotime( $post->created_at ))}}</a> <span class="lnr lnr-calendar-full"></span></p>
                            <p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
                            <p class="comments col-lg-12 col-md-12 col-6"><a href="#">{{ $post->comments()->count() }}</a> <span class="lnr lnr-bubble"></span></p>

                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <h3 class="mt-20 mb-20">{{$post->title}}</h3>
                        <div class="col-lg-12">
                            <div class="quotes">
                                {!! $post->body !!}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="comments-area">
                    <h4>{{ $post->comments()->count() }} Commentaires</h4>
                    @foreach ($post->comments as $comment )
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim("$comment->email"))) . "?s=50&d=mm"}}" class="author-image">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">{{ $comment->name }}</a></h5>
                                    <p class="date">{{date('F nS, Y - g:iA' ,strtotime( $comment->created_at ))}} </p>
                                    <p class="comment">
                                        {{ $comment->comment }}
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                   <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="comment-form">
                    <h4>Commentaire Direct</h4>
                    {{  Form::open(['route'=>['comments.store', $post->id], 'method'=>'POST'])  }}
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12 name">
                                {{ Form::label('name',"Name:") }}
                                {{ Form::text('name',null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group col-lg-6 col-md-12 email">
                                {{ Form::label('email',"Email:") }}
                                {{ Form::text('email',null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('comment',"Comment:") }}
                            {{ Form::textarea('comment',null, ['class' => 'form-control', 'rows' => '5']) }}
                        </div>
                             <br>
                         {{ Form::submit('Add comment', ['class' => 'primary-btn text-uppercase']) }}
                    {{ Form::close() }}

                </div>
            </div>
            <div class="col-lg-4 sidebar-widgets">
                <div class="widget-wrap">
                    <div class="single-sidebar-widget search-widget">
                        <form class="search-form" action="#">
                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
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
                            Boot camps have its supporters andit sdetractors.
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
</section>


 @endsection
