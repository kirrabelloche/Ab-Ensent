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
                                <h1>Mise a jour du Cours</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Mise a jour cours</li>
                                </ol>
                            </div>
                        </div>
                    </div>







                    <div class="row">
                        <div class="col-sm-8">
                          <div class="card">
                            <div class="card-body">

                              <div class=" panel-body">

            {!! Form::model($cours, ['route' => ['admin.cours.update', $cours->id], 'method'=>'PUT']) !!}
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

                {{Form::label('title','Title :')}}
                        {{Form::text('title',null,array('class'=>'form-control input-lg' , 'required'=>'','maxlength' =>'255'))}}
                        <br>
                    {{Form::label('slug', 'Slug :',['class'=>'form-spacing-top'])}}
                    {{Form::text('slug',null,array('class'=>'form-control','required'=>'', 'minlength'=>'5', 'maxlength'=>'255'))}}
                        <br>

                    {{Form::label('body','description :' )}}
                    {{Form::textarea('body',null,array('class'=>'form-control input-lg','required'=>''))}}
                    <br>

                    {{Form::label('classes_id','Classes :' )}}
                    {{Form::select('Classes_id', $classes, null, ['class'=>'form-control' ])}}
                    <br>
                    <label class="text-left">Charger les fichier du cours</label>
                    <div class="input-group control-group increment" >
                        <input type="file" name="filename[]" class="form-control">
                        <div class="input-group-btn">
                        </div>
                    </div>


                        {{Form::label('file','photo du cours:')}}
                        <br>
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
                                        <dt>Create At:</dt>
                                        <dd>{{date('j M,Y H:ia',strtotime($cours->created_at))}}</dd>

                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Last Update:</dt>
                                        <dd>{{date('j M ,Y H:ia',strtotime($cours->updated_at))}}</dd>

                                    </dl>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {!! Html::linkRoute('admin.cours.show','Cancel',array($cours->id), array('class'=>'btn btn-danger btn-block')) !!}

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

