@foreach($coments as $coment)
<div class="display-comment">
    <div class="post test" >
        <div class="user-block">
          <img class="img-circle img-bordered-sm"src="/uploads/avatars/{{$coment->user->avatar }}" alt="user image">
          <span class="username">
            <a href="#">{{ $coment->user->name }}.</a>
          
          </span>
          <span class="description">Poster le: {{date('F nS, Y ',strtotime($coment->created_at))}}</span>
        </div>
       
        <p>
            {{ $coment->body }}
        </p>

       
        <form method="post" action="{{ route('admin.reply.add') }}" >
            @csrf
            <div class="form-group" style="">
                <input class="form-control form-control-sm" name="body" type="text" placeholder="votre messages">
                <input type="hidden" name="cours_id" value="{{ $cours_id }}" />
                <input type="hidden" name="coment_id" value="{{ $coment->id }}" />
            </div>
            <div class="form-group">
                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i><input type="submit" class="btn btn-sm btn-outline-primary py-0" style="font-size: 0.8em;" value="Reply" /></a>
              
        </form>
            @include('cours.partials.replays', ['coments' => $coment->replies])
           
        </div>
   
</div>
@endforeach 