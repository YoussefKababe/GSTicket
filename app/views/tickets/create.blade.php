{{ Form::open(['action' => 'TicketsController@store']) }}

	<p>
		{{ Form::label('produit', 'Produit:') }}
		{{ Form::select('produit', $produits) }}
	</p>

	<p>
		{{ Form::label('sujet', 'Sujet:') }}
		{{ Form::text('sujet') }}
	</p>

	<p>
		{{ Form::label('message', 'Message:') }}
		{{ Form::textarea('message') }}
	</p>

	<p>
		{{ Form::label('priorite', 'Priorité:') }}
		{{ Form::select('priorite', ['normal' => 'Normal', 'urgent' => 'Urgent'])}}
	</p>

	<p>
		{{ Form::submit('Creer') }}
	</p>

{{ Form::close() }}