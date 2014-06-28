@extends('layouts.default')

@section('content')
	
	<div class="search-filter pull-left">
		<div class="filter">
			{{ Form::open(['action' => 'TicketsController@index', 'method' => 'get', 'class' => 'form-inline', 'role' => 'form']) }}

				<div class="form-group">
					{{ Form::text('q', Input::get('q'), ['placeholder' => 'Mots clés', 'class' => 'form-control']) }}		
				</div>

				<div class="form-group">
					{{ Form::select('priorite', [
						'' => 'Priorité',
						'Normal' => 'Normal',
						'Urgent' => 'Urgent',
						'Critique' => 'Critique'],
						Input::get('priorite'),
						['class' => 'form-control']
					) }}
				</div>

				<div class="form-group">
					{{ Form::select('etat', [
						'' => 'Etat',
						'Ouvert' => 'Ouvert',
						'Transmit' => 'Transmit',
						'Résolu' => 'Résolu'],
						Input::get('etat'),
						['class' => 'form-control']
					) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Filtrer', ['class' => 'btn btn-info']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>

	<a href="{{ route('tickets.create') }}" class="btn btn-default pull-right">Ouvrire une nouvelle discussion</a>

	<table class="table table-hover">
		<thead>
			<th>Sujet</th>
			<th>Priorité</th>
			<th>Etat</th>
			<th class="align-center">Reponses</th>
		</thead>

		<tbody>
			@foreach ($tickets as $ticket)
				@if ($ticket->etat == "Résolu")
					<tr class="resolved">
				@else
					<tr>
				@endif
					<td>
						<a class="userimg pull-left" href="{{ action('user.show', $ticket->utilisateur->nomUtilisateur) }}">
							<img src="/uploads/userimg/{{ $ticket->utilisateur->photo }}" class="img img-thumbnail">
						</a>
						<strong>{{ link_to_route('tickets.show', $ticket->sujet, $ticket->id, ['class' => 'subject']) }}</strong>
						<p><small>Par: <strong>{{ link_to_route('user.show', $ticket->utilisateur->nomUtilisateur, $ticket->utilisateur->nomUtilisateur) }}</strong> - <span class="time">{{ $ticket->created_at }}</span></small></p>
					</td>
					<td>
						@if ($ticket->priorite == "Normal")
							<span class="label label-success">{{ $ticket->priorite }}</span>
						@elseif ($ticket->priorite == "Urgent")
							<span class="label label-warning">{{ $ticket->priorite }}</span>
						@elseif ($ticket->priorite == "Critique")
							<span class="label label-danger">{{ $ticket->priorite }}</span>
						@endif
					</td>
					<td>{{ $ticket->etat }}</td>
					<td class="align-center">{{ $ticket->reponses()->count() }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop