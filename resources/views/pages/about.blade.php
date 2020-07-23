@extends('layouts.frontend')
@section('title', '|Cours')
@section('content')


<section class="banner-area relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    A propos de Nous
                    Découvrez Qui nous sommes et ce que nous faisons				
                </h1>	
                <p class="text-white link-nav"><a href="{{ route('home') }}">Accueil </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html">A propos</a></p>
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->	

<!-- Start feature Area -->

<!-- End feature Area -->		
<br><br>
<!-- Start info Area -->
<section class="info-area pb-120">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 no-padding info-area-left">
                <img class="img-fluid" src="{{asset('assets/frontend/img/cta-bg.jpg')}}" alt="">
            </div>
            <div class="col-lg-6 info-area-right">
                <h1>Situation géographique de l’ENSET</h1>
                <p>L’ENSET de DOUALA est situé à NDOGBONG près du lycée technique de Douala Bassa ’a en face de l’église catholique de NDOGBONG.</p>
                <br>
                <p>
                    une grande école Camerounaise de l’université de Douala. Cette institution est une école qui assure la formation initiale des professeurs dans l’enseignement technique, la recherche scientifique, technologique et pédagogique, l’appui au développement personnel, le recyclage et le perfectionnement du personnel enseignant.
                </p>
            </div>
        </div>
    </div>	
</section>
<!-- Start popular-courses Area --> 
	<section class="course-mission-area pb-120">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Découvrez nos différents départements</h1>
								<p>L’ENSET est constitué de 10 départements</p>
							</div>
						</div>
					</div>							
                    <div class="row">
                        <div class="col-md-6 accordion-left">

                            <!-- accordion 2 start-->
                            <dl class="accordion">
                                <dt>
                                    <a href="">Le GENIE CIVIL </a>
                                </dt>
                                <dd>
                                    Comporte trois filières à savoir Bâtiment et Travaux Publiques (BTP), Installation Sanitaire (IS), et Géomètres Topographe (GT).
                                </dd>
                                <dt>
                                    <a href="">Le GENIE ELECTRIQUE </a>
                                </dt>
                                <dd>
                                    Comporte trois filières l’ElectroTechnique (ET), l’Electronique (EN) et le Froid et Climatisation (FC).
                                </dd>
                                <dt>
                                    <a href="">Le GENIE INFORMATIQUE </a>
                                </dt>
                                <dd>
                                    il comporte deux filières ; Technologie de l’Information et de la Communication (TIC) et Informatique Industriel (II).
                                </dd>
                                <dt>
                                    <a href="">GENIE MECANIQUE </a>
                                </dt>
                                <dd>
                                    comporte trois filières dont Fabrication Mécanique (FM), Mécanique Automobile (MA) et Construction Mécanique (CM)                                </dd>                                    
                            
                                 <dt>
                                     <a href="">GENIE FORESTIER  </a>
                                </dt>
                                <dd>
                                     comporte trois filières à savoir Exploitation Forestière (EF), Industries du Bois (IB) et Métiers du Bois (MEB)     
                          </dl>
                            <!-- accordion 2 end-->
                        </div>
                        <div class="col-md-6 accordion-left">

                            <!-- accordion 2 start-->
                            <dl class="accordion">
                                <dt>
                                    <a href="">SCIENCES TECHNIQUES, ECONOMIQUES ET GESTION </a>
                                </dt>
                                <dd>
                                    ce département comporte trois filières dont économie, comptabilité et marketing                                </dd>
                                <dt>
                                    <a href="">SCIENCE DE L’EDUCATION </a>
                                </dt>
                                <dd>
                                    comporte deux filières à savoir Management de l’Information des Organisations (MOI) et Communication Administrative (CA)                                </dd>
                                <dt>
                                    <a href="">ECONOMIE SOCIALE ET FAMILIALE </a>
                                </dt>
                                <dd>

                                    comporte deux options à savoir Puériculture Gérontologie et Auxiliaire de vie (PGA) et Esthétique, Coiffure et Cosmétologie (ECC)                                </dd>
                                <dt>
                                    <a href="">INDUSTRIE TEXTILE DE L’HABILLEMENT </a>
                                </dt>
                                <dd>
                                    avec une seule filière ITH                                 
                                </dd>   
                                <dt>
                                    <a href="">TECHNIQUE ADMINISTRATIVES </a>
                                </dt>
                                <dd>
                                    comporte deux filières à savoir Management de l’Information des Organisations (MOI) et Communication Administrative (CA)                            
                                </dd>                                   
                            </dl>
                            <!-- accordion 2 end-->
                        </div>
                       
                    </div>
				</div>	
			</section>

@endsection
