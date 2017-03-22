@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"> Edycja Użytkownika: <div class="pull-right"><strong>{{$user->name}}</strong></div></div>
                <div class="panel-body">
                    <form action="{{url('/users/' . $user->id)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="name">Imię i Nazwisko</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Imię i Nazwisko">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
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