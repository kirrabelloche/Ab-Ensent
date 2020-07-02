@extends('layouts.admin')

@section('content')







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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<br>
    <!-- Main content -->
    <section class="content">
        <div class="card border-primary mb-12" style="max-width: 100rem;">

            <div class="card-body text-primary">
                <!-- Small boxes (Stat box) -->
                <img src="/uploads/avatars/{{ $user->auth()->avatar }}" style=" width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <h2> {{ $user->name }}'s Profile </h2>
                        <form enctype="multipart/form-data" action="/profile" method="POST">

                            <label for=""> Update Profile Image </label>
                            <input type="file" name="avatar" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <br>
                            <input type="submit" class="pull-right btn btn-sm btn-primary"> '

                        </form>
            </div>
          </div>
      <div class="container-fluid">

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@endsection
