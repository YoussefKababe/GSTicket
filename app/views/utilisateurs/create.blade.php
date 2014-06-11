@extends('layouts.login')


@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Inscription</h3>
  </div>

  {{ Form::open(array('action' => 'UtilisateursController@store', 'class' => 'form-horizontal', 'role' => 'form')) }}

  <div class="panel-body">

  		@if ( Session::has('error') )
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
  		@endif

  		<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				{{ Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) }}
			</div>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				{{ Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Votre prenom']) }}
			</div>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Adresse e-mail']) }}
			</div>

  		<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				{{ Form::text('nomUtilisateur', null, ['class' => 'form-control', 'placeholder' => 'Nom d\'utilisateur']) }}
			</div>

  </div>

	<div class="panel-footer">
	  <div class="input-group pull-left">
			{{ Form::submit('Créer mon compte', ['class' => 'btn btn-default']) }}
		</div>
	</div>

  {{ Form::close() }}
</div>

@stop