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

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Titre de la Classe</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="row">
                  <div class="col-12 col-sm-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tous vos cours</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                            </div>

                              <div class="card-body">
                                <div class="card-body">
                                    @foreach($cours as $cour)
                                    <div class="user-block">
                                        <img src="../../documents/{{$cour->file}}"  style="height: 30px; width: 30px; clear: both; display: block; ">                                        <span class="username">

                                            <a href="#">{!!substr(strip_tags($cour->title), 0, 30)!!}{!!strlen(strip_tags($cour->title))> 50 ? "...":"" !!}</a>
                                        </span>
                                        <hr>
                                      </div>

                                      @endforeach


                                  </div>


                         </div>
                      </div>
                  </div>
                  <div class="col-12 col-sm-3">
                      <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tous les enseignants du cours</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                            </div>
                            </div>

                              <div class="card-body">
                                @foreach($cours as $cour)
                                <div class="user-block">
                                    <img src="/uploads/avatars/{{$cour->user->avatar }}" style=" width:32px; height:32px;  border-radius:50%; ">
                                    <span class="username">
                                      <a href="#">{{$cour->user->name}}</a>
                                    </span>
                                    <hr>
                                  </div>

                                  @endforeach


                              </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Classe : Name Classe</h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                            </div>
                            </div>

                              <div class="card-body">
                                @foreach($etudiants as $etudiant)
                                <div class="user-block">
                                    <img src="/uploads/avatars/{{$etudiant->avatar }}" style=" width:32px; height:32px;  border-radius:50%; ">
                                    <span class="username">
                                      <a href="#">{{$etudiant->name}}</a> <br><br>
                                    </span>
                                    <hr>
                                  </div>

                                @endforeach


                              </div>
                              <nav aria-label="...">
                                <ul class="pagination pagination-sm">



                                </ul>
                              </nav>

                      </div>

                  </div>
                  <div class="col-12 col-sm-8 col-lg-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Forum : Titre du cours    Télécharger:<a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a></h3>

                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>

                            </div>
                            </div>

                              <div class="card-body">
                                <hr />
                                <h4>Display Comments</h4>

                                <hr />
                                <h4>Add comment</h4>
                                <form method="post" action="{{ route('admin.coment.add') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="comment_body" class="form-control" />
                                        <input type="hidden" name="cours_id" value="{{ $cour->id }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-warning" value="Add Comment" />
                                    </div>
                                </form>
                              </div>
                      </div>

                    <div class="text-center mt-5 mb-3">
                      <a href="#" class="btn btn-sm btn-primary">Add files</a>
                      <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                    </div>
                  </div>

                </div>


              </div>

            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
    <!-- /.content -->
  </div>
@endsection
