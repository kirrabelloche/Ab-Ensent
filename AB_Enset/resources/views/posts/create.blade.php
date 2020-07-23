@extends('main')

@section('title','| create new post')
@section('stylesheets')
   {!! Html::style('css/select2.min.css') !!}



@endsection


@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>


         {!! Form::open(array('route'=>'store','data-parsley-validate' =>'','enctype'=>'multipart/form-data')) !!}
                {{Form::label('title','Title :')}}
                {{Form::text('title',null,array('class'=>'form-control input-lg', 'required'=>'','maxlength' =>'255'))}}

            {{Form::label('slug', 'Slug :',['class'=>'form-spacing-top'])}}
            {{Form::text('slug',null,array('class'=>'form-control','required'=>'', 'minlength'=>'5', 'maxlength'=>'255'))}}


            <div class="form-group">
                <select id="departement" name="departement" class="form-control" style="width:350px" >
                <option value="" selected disabled>Select</option>
                  @foreach($departements as $key => $departement)
                  <option value="{{$key}}">{{$departement->name}}</option>
                  @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label for="title">Fillières:</label>
                <select name="filiere" id="filiere" class="form-control" style="width:350px">
                </select>
            </div>
            {{Form::label('category_id','Category :')}}
            <select name="category_id" id="" class="form-control">
                @foreach($categories as $category)
                        <option value='{{$category->id}}'>{{$category->name}} </option>
                @endforeach
            </select>

            {{Form::label('tags','Tags :')}}
            <select name="tags[]"  class="form-control select2-multi" multiple="multiple">
                @foreach($tags as $tag)
                        <option value='{{$tag->id}}'>{{$tag->name}} </option>
                @endforeach
            </select>

            {{Form::label('body','Post Body :'),['class'=>'form-spacing-top']}}
            {{Form::textarea('body',null,array('class'=>'form-control input-lg'))}}





            {{Form::label('file','Piece jointe :',['class'=>'form-spacing-top'])}}
            {{Form::file('file',null,array('class'=>'form-control', ))}}

                {{Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;'))}}
            {!! Form::close() !!}




        </div>
    </div>
    @endsection


    @section('scripts')
{!! Html::script('js/select2.min.js') !!}
{!! Html::script('js/test.js') !!}
<script type="text/javascript">
$('.select2-multi').select2();

</script>
<script>

    
$('#departement').on('change', function () {
    var item=$(this).val();
    console.log(item);
     $.ajax({
         type:'post', // change le type de route de get a post
         url:'posts',//tu mets le nom e la route sans parametre
         data:{
             id:item,//voici en fait les parametres
         },
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},// le token
        // async:false,
         success:function (data) {
             alert(data);
         // each()....
           //  var html='<option>'+data['filere']+'</option>';//ici tu dois verifier que ce qui sort du json c'est un tableau
           // $('#select_filiere').append(html);
            //fin each
         },
         error:function (e) {
              console.log(e);
         }
     });
 });
</script>


@endsection

