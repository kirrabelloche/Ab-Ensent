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
                <h1>Tous Les Cours</h1>
                </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.') }}">Accuiel</a></li>
                            <li class="breadcrumb-item active">Tous Les Cours</li>
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
                  <h3 class="card-title">
                      <a href="{{route('admin.cours.create') }}" class="btn btn-primary" title="Modifier cours" ><i class="fa fa-plus" aria-hidden="true"></i>  Créer un cours</a>
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
                        <th>profeseurs</th>
                        <th>Classe</th>
                        <th>Titre</th>
                        <th>slug</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Cours</th>
                        <th>Date Creation</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach($cours as $cour)
                      <tr>
                        <td>{{ $cour->id }}</td>

                        <td>{{$cour->user->name}}</td>
                        <td><span class="badge badge-secondary">{{ $cour->classes->name }}</td>
                        <td>{{$cour->title}}</td>
                        <td><a href="{{url($cour->slug)}}">{{url($cour->slug)}}</a></td>
                        <td>{!!substr(strip_tags($cour->body), 0, 30)!!}{!!strlen(strip_tags($cour->body))> 50 ? "...":"" !!}</td>
                        <td><img src="../../documents/{{$cour->file}}"  style="height: 40px; width: 40px; clear: both; display: block; "></td>
                        <td>{{ $cour->filename }}</td>
                        <td>{{ date('j M ,Y / H:ia',strtotime($cour->created_at))}}</td>
                        <td>

                              <div class='btn-group'>

                                  <a href="{{route('admin.cours.edit',$cour->id)}}" class="btn btn-primary" title="Edit cour" ><i class="fas fa-pen"></i></a></li>


                                  <a href="{{route('admin.cours.show',$cour->id)}}" title="Voir Cours" class="btn btn-success"><i class="fas fa-user-alt"></i></a></li>



                                      <form  action="{{ route('admin.cours.destroy',$cour->id) }}" method="DELETE"

                                          {{ csrf_field() }}
                                          <button class="btn btn-danger" title="Supprimer cours"><i class="fas fa-trash"></i></button>
                                      </form>

                              </div>
                         </td>
                      </tr>

                      @endforeach



                      </tbody>
                      <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>profeseurs</th>
                        <th>Classe</th>
                        <th>titre</th>
                        <th>slug</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Cours</th>
                        <th>Date Creation</th>
                        <th>Action</th>
                      </tr>
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
