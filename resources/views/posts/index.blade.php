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
                <h1>List posts</h1>
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
                  <h3 class="card-title">
                      <a href="{{route('posts.create') }}" class="btn btn-primary" title="Modifier utilisateur" ><i class="fa fa-plus" aria-hidden="true"></i>  Create New Post</a>
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
                        <th>Title</th>
                        <th>slug</th>
                        <th>Body</th>
                        <th>File</th>

                        <th>Created At</th>

                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach($posts as $post)
                      <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{$post->title}}</td>
                        <td><a href="{{url($post->slug)}}">{{url($post->slug)}}</a></td>
                        <td>{{substr(strip_tags($post->body), 0, 30)}}{{strlen(strip_tags($post->body))> 50 ? "...":""}}</td>
                        <td><img src="../../documents/{{$post->file}}"  style="height: 40px; width: 40px; clear: both; display: block; "></td>
                        <td>{{ date('j M ,Y / H:ia',strtotime($post->created_at))}}</td>
                        <td>

                              <div class='btn-group'>

                                  <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary" title="Edit post" ><i class="fas fa-pen"></i></a></li>


                                  <a href="{{route('posts.show',$post->id)}}" title="Voir utilisateur" class="btn btn-success"><i class="fas fa-user-alt"></i></a></li>



                                      <form  action="{{ route('posts.destroy',$post->id) }}" method="DELETE"

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
                        <th>Title</th>
                        <th>slug</th>
                        <th>Body</th>
                        <th>File</th>

                        <th>Created At</th>

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
