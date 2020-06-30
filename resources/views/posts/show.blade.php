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





                                <div class="col-md-8">
                                    <h1>{{$post->title}}</h1>

                                   <p class="lead"> {!! $post->body !!} </p>


                                   <div>
                                       <img src="../../documents/{{$post->file}}"  style="height: 400px; width: 400px; clear: both; display: block; ">
                                   </div>
                                   <hr>
                               <div class="tags">
                                   @foreach ($post->tags as $tag)

                                       <span class="badge badge-secondary">{{$tag->name}}</span>
                                   @endforeach
                               </div>
                               <div id="backend-comments" style="margin-top: 50px";>


                            </div>
                            </div>



                        </div>

                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="card">
                            <div class="card-body">


                                <div class="well">

                                    <dl class="dl-horizontal  ">
                                        <label >Url:</label>
                                        <p><a href="{{route('blog.single', $post->slug)}}">{{ route('blog.single', $post->slug)}}</a></p>

                                    </dl>

                                    <dl class="dl-horizontal ">
                                        <label for="">Departement:</label>
                                        <p>{{ $post->departement->name }}<p>


                                    </dl>
                                    <dl class="dl-horizontal ">
                                        <label for="">Category:</label>
                                        <p>{{ $post->category->name }}<p>


                                    </dl>

                                   <dl class="dl-horizontal">
                                       <label>Create At:</label>
                                       <p>{{date('j M,Y  H:ia',strtotime($post->created_at))}}</p>

                                   </dl>
                                    <dl class="dl-horizontal">
                                        <label>Last Update:</label>
                                        <p>{{date('j M ,Y H:ia',strtotime($post->updated_at))}}</p>

                                    </dl>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {!! Html::linkRoute('posts.edit','Edit',array($post->id), array('class'=>'btn btn-primary btn-block')) !!}

                                        </div>
                                        <div class="col-sm-6">
                                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            {!! Html::linkRoute('posts.index','<< See All Posts',array($post->id), array('class'=>'btn btn-Dark btn-block ')) !!}
                                        </div>
                                    </div>
                                </div>

                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <h3>Comments <small> {{ $post->comments()->count() }}  total </small></h3>
                          <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                          </tr>
                           </thead>
                                  <tbody>
                                    @foreach ($post->comments as $comment )
                                      <tr>
                                        <td> {{ $comment->name }} </td>
                                        <td> {{ $comment->email }} </td>
                                        <td> {{ $comment->comment }} </td>
                                         <td>
                                          <div class='btn-group'>
                                              <a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-primary" title="Modifier utilisateur" ><i class="fas fa-pen"></i></a></li>
                                                    <form  action="{{ route('comments.delete',$comment->id) }}" method="DELETE"  class="bb"
                                                      style=" position: relative; "></form>
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
                            <th>Name</th>
                            <th>Action</th>

                          </tr>
                          </tfoot>
                        </table>
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

