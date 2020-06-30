@extends('layouts.admin')

@section('content')




<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
           <section class="content-header">
              <div class="container-fluid">
                   <div class="row mb-2">
                       <div class="col-sm-6">
                            <h1>Create Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Create Users</li>
                            </ol>
                        </div>
                    </div>
                </div>







                <div class="row">
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Infos Users</h5>
                          <br><br>
                          <div class=" panel-body">
                            {!! Form::model($roles, ['route' => ['admin.users.store', $user], 'method'=>'POST']) !!}
                             {{ csrf_field() }}
                       <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                     @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                              <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                     @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>

                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                    </div>

                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Chose Role</h5>
                          <br>

                                @foreach ($roles as $role)
                                <div class="form-groupe form-check">
                                    <input type="checkbox" name="roles[]" class="form-check-input" value="{{ $role->id }}" id="{{ $role->id }}"
                                    @if ($user->roles->pluck('id')->contains($role->id))
                                        checked
                                    @endif
                                    >
                                    <label for="{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                                </div>
                                @endforeach

                        </div>

                      </div>
                    </div>
                  </div>




                            <div class="col-offset-4 text-center">
                                <button type="submit" class="btn btn-primary btn-block"> Create</button
                            </div>


                     {!! form::close() !!}


    </div>
</div>
</div>

@endsection
