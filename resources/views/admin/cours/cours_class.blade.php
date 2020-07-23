
@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item active"> Tableau de bord</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            @foreach($cours as $cour)
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                    <img class="card-img-top" src="../../documents/{{$cour->file}}" alt="Card image cap">
                  <h3 style="font-size: 19px;"> {{substr( $cour->title, 0, 30)}}{{strlen($cour->title)>30 ? "...":""}}</h3>
                  <p class="date col-lg-12 col-md-12 col-6"><a href=""> </a>  <span class="lnr lnr-calendar-full" ></span> Poster le: {{date('F nS, Y ',strtotime($cour->created_at))}}</p>  
                  <p>Par:  {{$cour->user->name}}</p>
                </div>
                <div class="icon primary">
                  
                </div>
                <a href="{{url('cours/'.$cour->slug)}}" class="small-box-footer">Plus D'infos <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            @endforeach
            
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
           
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
           
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>


    <!-- /.content -->
  </div>
@endsection
