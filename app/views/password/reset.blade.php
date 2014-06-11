@extends('layouts.login')


@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Réinitialisation de mot de passe</h3>
  </div>

  {{ Form::open(array('action' => 'RemindersController@postReset', 'class' => 'form-horizontal', 'role' => 'form')) }}

  <div class="panel-body">

  		@if ( Session::has('error') )
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
  		@endif

  		<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				{{ Form::text('nomUtilisateur', $nomUtilisateur, ['class' => 'form-control', 'readonly']) }}
			</div>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Nouveau mot de passe']) }}
			</div>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
				{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation'])}}
			</div>

			{{ Form::text('token', $token, ['hidden'])}}

  </div>

	<div class="panel-footer">
	  <div class="input-group pull-left">
			{{ Form::submit('Réinitialiser mon mot de passe', ['class' => 'btn btn-danger']) }}
		</div>
	</div>

  {{ Form::close() }}
</div>

@stop