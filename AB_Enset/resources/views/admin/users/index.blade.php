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
                <h1>DataTables</h1>
                </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Lists Users</li>
                        </ol>
                     </div>
                </div>
        </div>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">     <a href="{{route('admin.users.create') }}" class="btn btn-primary" title="Modifier utilisateur" ><i class="fa fa-plus" aria-hidden="true"></i> ADD Users</a>
                  </h3>

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
                      <th>Email</th>
                      <th> Role</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user )
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td> {{ implode(' ,  ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                      <td>
                        <div class='btn-group'>
                            @can('edit-users')
                            <a href="{{route('admin.users.edit',$user->id) }}" class="btn btn-primary" title="Modifier utilisateur" ><i class="fas fa-pen"></i></a></li>

                             @endcan
                             <a href="#" title="Voir utilisateur" class="btn btn-success"><i class="fas fa-user-alt"></i></a></li>

                             @can('delete-users')

                                  <form  action="{{ route('admin.users.destroy',$user->id) }}" method="DELETE"  class="bb"
                                    style=" position: relative; "></form>
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" title="Supprimer utilisateur"><i class="fas fa-trash"></i></button>
                                  </form>
                             @endcan
                        </div>

                      </td>
                    </tr>

                    @endforeach



                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th> Role</th>
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
