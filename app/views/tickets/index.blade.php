@extends('layouts.default')

@section('content')
	<table class="table table-hover">
		<thead>
			<th>Sujet</th>
			<th>Priorité</th>
			<th>Etat</th>
			<th>Reponses</th>
		</thead>

		<tbody>
			@foreach ($tickets as $ticket)
				<tr>
					<td>
						<strong>{{ link_to_route('tickets.show', $ticket->sujet, $ticket->id) }}</strong>
						<p><small>Par: <strong>{{ link_to_route('user.show', $ticket->utilisateur->nomUtilisateur, $ticket->utilisateur->nomUtilisateur) }}</strong></small></p>
					</td>
					<td>
						@if ($ticket->priorite == "Normal")
							<span class="label label-success">{{ $ticket->priorite }}</span>
						@elseif ($ticket->priorite == "Urgent")
							<span class="label label-warning">{{ $ticket->priorite }}</span>
						@endif
					</td>
					<td>{{ $ticket->etat }}</td>
					<td>{{ $ticket->reponses()->count() }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop