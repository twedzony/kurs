@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"> Edycja Użytkownika: <div class="pull-right"><strong>{{$user->name}}</strong></div></div>
                <div class="panel-body">    

                    <img src="{{ url('user-avatar/'. $user->id . '/600') }}" alt="Avatar" class="thumbnail img-responsive">

                    <form action="{{url('/users/' . $user->id)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <label for="name">Avatar</label>
                                    <input type="file" name="avatar" class="form-control" placeholder="Wybierz plik">
                                        @if ($errors->has('avatar'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Imię i Nazwisko</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Imię i Nazwisko">
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="sex">Płeć</label>
                                    <select class="form-control" name="sex">
                                        <option value="m" @if( $user->sex == 'm' ) selected @endif>
                                            Mężczyzna
                                        </option>
                                        <option value="f" @if( $user->sex == 'f' ) selected @endif>
                                            Kobieta
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm pull-right">Zapisz zmiany</button>                                
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection