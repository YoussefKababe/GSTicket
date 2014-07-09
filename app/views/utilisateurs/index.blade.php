@extends('layouts.default')

@section('content')
	<div class="search-filter pull-left">
		<div class="filter">
			{{ Form::open(['action' => 'UtilisateursController@' . $type, 'method' => 'get', 'class' => 'form-inline', 'role' => 'form']) }}

				<div class="form-group">
					{{ Form::text('q', Input::get('q'), ['placeholder' => 'Mots clés', 'class' => 'form-control']) }}		
				</div>

				<div class="form-group">
					{{ Form::submit('Filtrer', ['class' => 'btn btn-info']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>

	<a href="{{ action('UtilisateursController@create') }}" class="btn btn-default pull-right">Ajouter un nouveau utilisateur</a>

	<table class="table table-hover">
		<thead>
			<th>Nom utlisateur</th>
			<th>Prenom</th>
			<th>Nom</th>
			<th>Email</th>
		</thead>

		<tbody>
			@foreach ($utilisateurs as $utilisateur)
				<tr>
					<td>
						<a class="userimg pull-left" href="{{ action('user.show', $utilisateur->nomUtilisateur) }}">
							<img src="/uploads/userimg/{{ $utilisateur->photo }}" class="img img-thumbnail">
						</a>
						<strong>{{ link_to_route('user.show', $utilisateur->nomUtilisateur, $utilisateur->nomUtilisateur) }}</strong>
					</td>
					<td>
						{{ $utilisateur->prenom }}
					</td>
					<td>
						{{ $utilisateur->nom }}
					</td>
					<td>
						{{ $utilisateur->email }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop