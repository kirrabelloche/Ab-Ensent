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
                                <h1>Editer Communiqué</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Accuiel</a></li>
                                    <li class="breadcrumb-item active">Editer Communiqué</li>
                                </ol>
                            </div>
                        </div>
                    </div>







                    <div class="row">
                        <div class="col-sm-8">
                          <div class="card">
                            <div class="card-body">

                              <div class=" panel-body">

                                {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method'=>'PUT']) !!}

         {{Form::label('title','Titre :')}}
                {{Form::text('title',null,array('class'=>'form-control input-lg' , 'required'=>'','maxlength' =>'255'))}}
                <br>
            {{Form::label('slug', 'Slug :',['class'=>'form-spacing-top'])}}
            {{Form::text('slug',null,array('class'=>'form-control','required'=>'', 'minlength'=>'5', 'maxlength'=>'255'))}}
                 <br>
                 {{Form::label('departement','Departement :' )}}
                 {{Form::select('departement', $departements, null, ['class'=>'form-control', 'id'=>"departement" ])}}
                 <br>
                 <div id="div_dep" style="display:none">
                    <fieldset>
                        <label class="text-left"> Selectionner la ou les fillieres</label>
                        <br>
                        <select class="form-control select2-multi"  multiple="multiple" name="filiere[]" id="filiere">
                            <option value='0' disable='true' selected='true'>Fillieres</option>
                        </select>
                    </fieldset>
                </div>
                <br>





            {{Form::label('category_id','type :' )}}
            {{Form::select('category_id', $categories, null, ['class'=>'form-control' ])}}
            <br>

            {{Form::label('tag', 'Application :',['class'=>'form-spacing-top'])}}
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple'=>'multiple'])}}
                 <br><br>


            {{Form::label('body','Contenus du communiqué :' )}}
            {{Form::textarea('body',null,array('class'=>'form-control input-lg','required'=>''))}}
            <br>

                 {{Form::label('file','Comuniqué :')}}
                {{Form::file('file',null,array('class'=>'form-control input-lg', ))}}


                        </div>

                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="card">
                            <div class="card-body">


                              <br>
                              <dl class="dl-horizontal">
                                <dt>Créer Le:</dt>
                                <dd>{{date('j M,Y H:ia',strtotime($post->created_at))}}</dd>

                            </dl>
                             <dl class="dl-horizontal">
                                 <dt>dernière Mise à jour:</dt>
                                 <dd>{{date('j M ,Y H:ia',strtotime($post->updated_at))}}</dd>

                             </dl>
                             <hr>
                             <div class="row">
                                 <div class="col-sm-6">
                                     {!! Html::linkRoute('posts.show','Cancel',array($errors->id), array('class'=>'btn btn-danger btn-block')) !!}

                                 </div>
                                 <div class="col-sm-6">

                                     {!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) !!}



                                 </div>
                             </div>

                     {!! form::close() !!}

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

