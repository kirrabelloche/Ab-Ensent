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
                                <h1>Create New Cours</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Create New Cours</li>
                                </ol>
                            </div>
                        </div>
                    </div>


                      <div class="row">
                        <div class="col-sm-8">
                          <div class="card">
                            <div class="card-body">

                              <div class=" panel-body">
                                {!! Form::open(array('route'=>'admin.cours.store','data-parsley-validate' =>'','enctype'=>'multipart/form-data','method'=>'POST')) !!}
                                @csrf
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('user_id', 'Enseignant', ['class' => 'control-controle']) !!}
                                    {!! Form::select('user_id', $user_id, old('user_id'), ['class' => 'form-control ' ]) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('user_id'))
                                        <p class="help-block">
                                            {{ $errors->first('user_id') }}
                                        </p>
                                    @endif
                                </div>
                                {{Form::label('title','Titre :')}}
                                {{Form::text('title',null,array('class'=>'form-control input-lg', 'id' => 'title', 'required'=>'','maxlength' =>'255'))}}
                               <br>
                            {{Form::label('slug', 'Slug :',['class'=>'form-spacing-top'])}}
                            {{Form::text('slug',null,array('class'=>'form-control','required'=>'', 'minlength'=>'5', 'maxlength'=>'255', 'id' => 'slug'))}}
                            {{Form::label('body','Description/contenue :'),[ 'class'=>'form-spacing-top']}}
                            {{Form::textarea('body',null,array('class'=>'form-control '))}}

                            <label class="text-left">Charger les fichier du cours</label>
                            <div class="input-group control-group increment" >
                                <input type="file" name="filename[]" class="form-control">
                                <div class="input-group-btn">
                                </div>
                            </div>




                        </div>

                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="card">
                            <div class="card-body">

                                {{Form::label('file','Photo du cours:',['class'=>'form-spacing-top'])}}
                                {{Form::file('file',null,array('class'=>'form-control', ))}}


                                {{Form::label('classes_id','Choisir la classe :')}}
                                <select name="classes_id" id="" class="form-control">
                                    @foreach($classes as $classe)
                                            <option value='{{$classe->id}}'>{{$classe->name}} </option>
                                    @endforeach
                                </select>
                                <br>






                            </div>
                            {{Form::submit('Create Crours', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;'))}}
                            {!! Form::close() !!}

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

        $(document).ready(function() {
            console.log('hi');
            $('#title').on('keyup', function(){

                var theTitle = this.value.toLowerCase().trim();
                slugInput = $('#slug'),
                theSlug = theTitle.replace(/&/g, '-and-')
                                  .replace(/[^a-z0-9]+/g, '-')
                                  .replace(/\-\-+/g, '-')
                                  .replace(/^-+|-+&/g, '');

                                  slugInput.val(theSlug);
            });


        });
        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

          });





</script>




@endsection

