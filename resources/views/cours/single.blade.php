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
            <h3 class="card-title "><strong>{{$cours->classes->name}}</strong> <span> </span>  COURS de <span> <strong>{{ $cours->title }}</strong></span></h3>

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

                              <div class="card-body direct-chat-messages" style="height: 629px;">
                                <div class="card-body">
                                    @foreach($courses as $course)
                                    <div class="user-block">
                                        <img src="../../documents/{{$course->file}}"  style="height: 30px; width: 30px; clear: both; display: block; ">                                        <span class="username">

                                            <a href="{{url('cours/'.$cours->slug)}}">{!!substr(strip_tags($course->title), 0, 30)!!}{!!strlen(strip_tags($course->title))> 50 ? "...":"" !!}</a>
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
                                      <h3 class="card-title">Enseignants</h3>
                  
                                      <div class="card-tools">
                                        <span class="badge badge-danger">{{ $cours->user()->count() }}Membres</span>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                        </button>
                                      </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0 direct-chat-messages" style="height: 150px; ">
                                      
                                      <ul class="users-list clearfix">
                                        @foreach($cours as $cour)
                                        <li>
                                          <img src="/uploads/avatars/{{$course->user->avatar }}" alt="User Image">
                                          <a class="users-list-name" href="#">{{$course->user->name}}</a>
                                        </li>   
                                        @endforeach                    
                                      </ul>
                                    
                                      <!-- /.users-list -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                      <a href="javascript::">Voir Tous Les Enseignants</a>
                                    </div>
                                    <!-- /.card-footer -->
                                  </div>
                            
                    
                                  <div class="card">
                                    <div class="card-header">
                                      <h3 class="card-title">Etudiants</h3>
                  
                                      <div class="card-tools">
                                        <span class="badge badge-danger">{{ $etudiants->count() }}Membres</span>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                        </button>
                                      </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0 direct-chat-messages" style="height: 330px; ">
                                      
                                      <ul class="users-list clearfix">
                                        @foreach($etudiants as $etudiant)
                                        <li>
                                          <img src="/uploads/avatars/{{$etudiant->avatar }}" alt="User Image">
                                          <a class="users-list-name" href="#">{{$etudiant->name}}</a>
                                        </li>   
                                        @endforeach                    
                                      </ul>
                                    
                                      <!-- /.users-list -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                      <a href="javascript::">Voir Tous Les Etudiants</a>
                                    </div>
                                    <!-- /.card-footer -->
                                  </div>
                   

                  </div>
                  <div class="col-12 col-sm-8 col-lg-6 ">
                    <div class="card">
                        <!-- DIRECT CHAT -->
                        <div class="card direct-chat direct-chat-primary">
                          <div class="card-header">
                            <h3 class="card-title">Forum : Titre du cours    Télécharger:<a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                                data-widget="chat-pane-toggle">
                                <i class="fas fa-comments"></i>
                                </button>
                                <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">{{ $cours->coments()->count() }}</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>
                              </div>

                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" style="height: 629px;">
                              <!-- Message. Default to the left -->
                              <div class="direct-chat-msg">
                                <div class="card-tools">


                                     <div class="card-body">



                                      @include('cours.partials.replays', ['coments' => $cours->coments, 'cours_id' => $cours->id])


                                     </div>

                                     <div class="card-body">
                                      <h5>Leave a comment</h5>
                                      <form method="post" action="{{ route('admin.coment.add') }}">
                                          @csrf
                                          <div class="form-group">
                                              <input class="form-control form-control-sm" name="" type="text" placeholder="votre messages">
                                              <input type="hidden" name="cours_id" value="{{ $cours->id }}" />
                                          </div>
                                          <div class="form-group">
                                              <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
                                          </div>
                                      </form>
                                      <style>
                                          .test {
                                              margin-left: 40px;
                                          }
                                      </style>
                                     </div>

                                  </div>
                            </div>
                                <!-- /.direct-chat-text -->
                              </div>
                              <!-- /.direct-chat-msg -->




                          <!-- /.card-body -->


                        </div>





                            </div>
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
