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
                                {!! Form::open(array('route'=>'store','data-parsley-validate' =>'','enctype'=>'multipart/form-data')) !!}
                                {{Form::label('title','Title :')}}
                                {{Form::text('title',null,array('class'=>'form-control input-lg', 'required'=>'','maxlength' =>'255'))}}
                               <br>
                            {{Form::label('slug', 'Slug :',['class'=>'form-spacing-top'])}}
                            {{Form::text('slug',null,array('class'=>'form-control','required'=>'', 'minlength'=>'5', 'maxlength'=>'255'))}}

                            <br>


                            {{Form::label('body','Post Body :'),[ 'class'=>'form-spacing-top']}}
                            {{Form::textarea('body',null,array('class'=>'form-control '))}}

                            <br>






                        </div>

                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="card">
                            <div class="card-body">


                              <br>
                              <fieldset>
                                <label class="text-left">Choisir le departement</label>
                                <select class="form-control" name="departement" id="departement">
                                    <option value="diables"> Departement </option>
                                    <?php foreach ($departements as $donnee) : ?>
                                    <option value="{{ $donnee->id  }}">{{ $donnee->name }}</option>
                                    <?php endforeach; ?>
                                </select>

                            </fieldset>
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

                              {{Form::label('category_id','Category :')}}
                              <select name="category_id" id="" class="form-control">
                                  @foreach($categories as $category)
                                          <option value='{{$category->id}}'>{{$category->name}} </option>
                                  @endforeach
                              </select>
                              <br>


                              {{Form::label('tags','Aplication :')}}
                              <select name="tags[]"  class="form-control select2-multi" multiple="multiple">
                                  @foreach($tags as $tag)
                                          <option value='{{$tag->id}}'>{{$tag->name}} </option>
                                  @endforeach
                              </select>
                              <br><br>
                             </div>


                            </div>
                            {{Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;'))}}
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
</script>


@endsection

