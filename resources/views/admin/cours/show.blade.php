@extends('layouts.admin')

@section('stylesheets')
   {!! Html::style('css/select2.min.css') !!}



@endsection

@section('content')
@push('css')





    @endpush






    <div class="content-wrapper ">
        <!-- Content Header (Page header) -->
               <section class="content-header">
                  <div class="container-fluid">
                       <div class="row mb-2">
                           <div class="col-sm-6">
                                <h1>Create New Post</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Create New Post</li>
                                </ol>
                            </div>
                        </div>
                    </div>







                    <div class="row">
                        <div class="col-sm-8">
                          <div class="card">
                            <div class="card-body">

                              <div class=" panel-body">





                                <div class="col-md-6">
                                    <h1>{{$cours->title}}</h1>

                                   <p class="lead"> {!! $cours->body !!} </p>


                                   <div>
                                       <img src="../../documents/{{$cours->file}}"  style="height: 100px; width: 100px; clear: both; display: block; ">
                                   </div>
                                   <hr>
                               <div class="tags">
                                   <p>Prof:  <span class="badge badge-secondary">{{$cours->user->name}}</span> </p>
                                    <p>Classe: <span class="badge badge-secondary">{{ $cours->classes->name }}</span></p>

                               </div>
                               <div id="backend-comments" style="margin-top: 50px";>


                            </div>
                            </div>



                        </div>

                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body">


                                <div class="well">

                                    <dl class="dl-horizontal  ">
                                        <label >Url:</label>
                                        <p><a href="{{route('cours.single', $cours->slug)}}">{{ route('cours.single', $cours->slug)}}</a></p>
                                    </dl>
                                    <dl class="dl-horizontal ">
                                        <label for="">Enseignant:</label>
                                        <p>{{ $cours->user->name }}<p>
                                    </dl>
                                   <dl class="dl-horizontal">
                                       <label>Create At:</label>
                                       <p>{{date('j M,Y  H:ia',strtotime($cours->created_at))}}</p>
                                   </dl>
                                    <dl class="dl-horizontal">
                                        <label>Last Update:</label>
                                        <p>{{date('j M ,Y H:ia',strtotime($cours->updated_at))}}</p>

                                    </dl>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {!! Html::linkRoute('admin.cours.edit','Edit',array($cours->id), array('class'=>'btn btn-primary btn-block')) !!}
                                        </div>
                                        <div class="col-sm-6">
                                            {!! Form::open(['route' => ['admin.cours.destroy', $cours->id], 'method'=>'DELETE']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            {!! Html::linkRoute('admin.cours.index','<< See All cours',array($cours->id), array('class'=>'btn btn-Dark btn-block ')) !!}
                                        </div>
                                    </div>
                                </div>

                          </div>
                        </div>
                      </div>









        </div>
    </div>
    </div>







  @push('js')


  @endpush



@endsection
@section('scripts')
{!! Html::script('js/select2.min.js') !!}
{!! Html::script('js/test.js') !!}
<script type="text/javascript">
$('.select2-multi').select2();

</script>
<script>
 function affCache(idDiv) {
            var div = document.getElementById(idDiv);
            if (div.style.display == "none"){
                div.style.display = "";
            }
        }

        $('#departement').on('change', function(e){
            console.log(e);
            var departement_id = e.target.value;
            affCache('div_dep');
            $.get('/json-filiere?departement_id=' + departement_id,function(data) {
                console.log(data);
                $('#filiere').empty();
                $.each(data, function(index, filiereObj){
                    $('#filiere').append('<option value="'+ filiereObj.id +'">'+ filiereObj.name +'</option>');
                })
            });
        });
</script>


@endsection

