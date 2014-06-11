@extends('layouts.login')


@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Réinitialisation de mot de passe</h3>
  </div>

  {{ Form::open(array('action' => 'RemindersController@postRemind', 'class' => 'form-horizontal', 'role' => 'form')) }}

  <div class="panel-body">

  		@if ( Session::has('error') )
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
			@elseif ( Session::has('status') )
				<div class="alert alert-success">
					{{ Session::get('status') }}
				</div>
  		@endif

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				{{ Form::text('nomUtilisateur', null, ['class' => 'form-control', 'placeholder' => 'Nom d\'utilisateur']) }}
			</div>

  </div>

	<div class="panel-footer">
	  <div class="input-group pull-left">
			{{ Form::submit('Envoyez moi un email de réinitialisation', ['class' => 'btn btn-default']) }}
		</div>
	</div>

  {{ Form::close() }}
</div>

@stop