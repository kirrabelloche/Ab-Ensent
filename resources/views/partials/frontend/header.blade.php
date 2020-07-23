<header id="header" id="home">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                    <ul>
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                     
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
                    <a href="(+237)690419016"><span class="lnr lnr-phone-handset"></span> <span class="text">(+237) 690419016</span></a>
                    <a href="abenset@gmail.com"><span class="lnr lnr-envelope"></span> <span class="text">abenset@gmail.com</span></a>
                    
                </div>
            </div>
        </div>
  </div>
  <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="index.html"><img src="{{asset('assets/frontend/img/logo.png')}}" alt="" title="" /></a>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="{{Request::is('/')? "active": ""}}"><a href="/">Accueil</a></li>
                <li class= "{{Request::is('about')? "active": ""}}"><a href="/about">A Propos</a></li> 
                
                @if (Auth::check())
                <li class= "{{Request::is('blog')? "active": ""}}"><a href="/blog">Communiqués & Evenement</a></li>
                <li class= "{{Request::is('cours')? "active": ""}}"><a href="/cours">cours</a></li>
                <li><a href="events.html">Memoires</a></li>
                <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i> messages</a></li>    
                  
                <li><a href="contact.html">Contact</a></li>            
                <li class="menu-has-children"><a href=" <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style=" width:32px; height:32px; position:absolute; left:40px; top:0px;  border-radius:50%;"> {{ Auth::user()->name }}</a>
                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style=" width:32px; height:32px; position:absolute; left:10px; top:0px;  border-radius:50%; ">
                    <ul>
                      <li> 
                          <a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-btn fa-user"></i>
                             Profile
                             </a>
                       </li>
                        <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>                 
                @else
                <li> <a href="{{route('login')}}" class="btn btn-default">connexion</a></li>
                   
             @endif
            </ul>
        </nav><!-- #nav-menu-container -->
      </div>
  </div>
</header><!-- #header -->
