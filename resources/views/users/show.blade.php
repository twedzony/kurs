@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Użytkownik: 
                    @if($user->id === Auth::id())
                    <a href="{{url('/users/' .$user->id. '/edit')}}" class="pull-right"><small>Edytuj</small></a>
                    @endif
                </div>

                <div class="panel-body text-center">
                    <img src="{{ url('user-avatar/' . $user->id . '/250') }}" alt="" class="thumbnail img-responsive">
                    <h2><a href="{{url('/users/' . $user->id)}}"/>{{ $user->name }}</a></h2>
                        <p>
                        @if ($user->sex === 'm')
                        Mężczyzna
                        @else 
                        Kobieta
                        @endif
                        </p>

                        <p>
                        {{ $user->email }}
                        </p>
                </div>
            </div>
      </div>
        <div class="col-md-7 ">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas urna turpis, ac sollicitudin mi auctor vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent blandit ac turpis euismod tristique. Phasellus hendrerit, neque eget malesuada vehicula, metus diam elementum dui, eu ornare lacus metus eu sem. Proin condimentum bibendum tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam faucibus consequat ex quis luctus.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection