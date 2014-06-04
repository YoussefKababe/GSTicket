{{ Form::open(array('route' => 'sessions.store')) }}

	<p>
		{{ Form::label('nomUtilisateur', 'Nom Utilisateur:') }}
		{{ Form::text('nomUtilisateur') }}
	</p>

	<p>
		{{ Form::label('password', ('Mot de Passe:')) }}
		{{ Form::password('password')}}
	</p>

	<p>
		{{ Form::submit('Entrer') }}
	</p>

{{ Form::close() }}