@extends('layouts.admin')

@section('css')


@endsection

@section('content')
@push('css')





    @endpush


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lists Categories</h1>
                </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Lists Categories</li>
                        </ol>
                     </div>
                </div>
        </div>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">

              <div class="card">
                <div class="card-header">



                    <p col-md-offset>
                    </p>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Action</th>

                    </tr>
                     </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                   <td>
                                    <div class='btn-group'>

                                        <a href="" class="btn btn-primary" title="Modifier utilisateur" ><i class="fas fa-pen"></i></a></li>






                                              <form  action="" method="DELETE"  class="bb"
                                                style=" position: relative; "></form>
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger" title="Supprimer utilisateur"><i class="fas fa-trash"></i></button>
                                              </form>

                                    </div>
                                   </td>
                                </tr>
                            @endforeach
                       </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Action</th>

                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="card text-white bg-light  mb-4" style="max-width: 40rem;">
                <div class="card-header"></div>
                <div class="card-body">
                    <h2>New Category</h2>
                    {!! Form::open(['route'=>'categories.store','method' =>'POST']) !!}
                    {{Form::label('name','Name:')}}
                    {{Form::text('name', null, ['class' =>'form-control'])}}
                    <br>
                    {{Form::submit('Create New Category',  ['class' =>'btn btn-primary btn-block btn-h1-spacing' ])}}
                    {!! Form::close() !!}
                </div>
            




                </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>

    <!-- /.content -->
  </div>

  @push('js')


  @endpush

  @section('js')



  @endsection

@endsection
