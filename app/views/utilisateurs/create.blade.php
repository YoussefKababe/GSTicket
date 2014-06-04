{{ Form::open(array('route' => 'users.store')) }}
	
	<p>
		{{ Form::label('nom', 'Nom:') }}
		{{ Form::text('nom') }}
	</p>

	<p>
		{{ Form::label('prenom', 'Prenom:') }}
		{{ Form::text('prenom') }}
	</p>

	<p>
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email') }}
	</p>

	<p>
		{{ Form::label('nomUtilisateur', 'Nom utilisateur:') }}
		{{ Form::text('nomUtilisateur') }}
	</p>

	<p>
		{{ Form::label('role_id', 'Type de compte:')}}
		{{ Form::select('role_id', ['1'=> 'Administrateur', '2' => 'Partenaire', '3' => 'CLient']) }}
	</p>

	<p>
		{{ Form::label('motDePasse'), 'Mot de passe:' }}
		{{ Form::password('motDePasse') }}
	</p>

	<p>
		{{ Form::label('motDePasse_confirmation', 'Confirmation:')}}
		{{ Form::password('motDePasse_confirmation') }}
	</p>

	<p>
		{{ Form::submit('Creer') }}
	</p>

{{ Form::close() }}