@extends('layouts.login')


@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Authentification</h3>
  </div>

  {{ Form::open(array('route' => 'sessions.store', 'class' => 'form-horizontal', 'role' => 'form')) }}

  <div class="panel-body">

  		@if ( Session::has('error') )
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
  		@endif

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				{{ Form::text('nomUtilisateur', null, ['class' => 'form-control', 'placeholder' => 'Nom d\'utilisateur']) }}
			</div>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe'])}}
			</div>

  </div>

	<div class="panel-footer">
	  <div class="input-group pull-left">
			{{ Form::submit('Se connecter', ['class' => 'btn btn-default']) }}
		</div>
		<a href="#" class="pull-right">Mot de passe oublié?</a>
	</div>

  {{ Form::close() }}
</div>

@stop