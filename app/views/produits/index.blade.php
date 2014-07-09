@extends('layouts.default')

@section('content')
	<div class="search-filter pull-left">
		<div class="filter">
			{{ Form::open(['action' => 'ProduitsController@index', 'method' => 'get', 'class' => 'form-inline', 'role' => 'form']) }}

				<div class="form-group">
					{{ Form::text('q', Input::get('q'), ['placeholder' => 'Mots clés', 'class' => 'form-control']) }}		
				</div>

				<div class="form-group">
					{{ Form::submit('Filtrer', ['class' => 'btn btn-info']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>

	<a href="{{ action('UtilisateursController@create') }}" class="btn btn-default pull-right">Ajouter un nouveau produit</a>

	<table class="table table-hover">
		<thead>
			<th>Nom produit</th>
			<th>Description</th>
			<th>Partenaire</th>
		</thead>

		<tbody>
			@foreach ($produits as $produit)
				<tr>
					<td>
						<strong>{{ $produit->nomProduit }}</strong>
					</td>
					<td>
						{{ $produit->description }}
					</td>
					<td>
						{{ $produit->utilisateur->nomUtilisateur }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop