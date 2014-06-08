@extends('layouts.default')

@section('content')
	<table class="table table-hover">
		<thead>
			<th>Sujet</th>
			<th>Priorité</th>
			<th>Etat</th>
			<th class="align-center">Reponses</th>
		</thead>

		<tbody>
			@foreach ($tickets as $ticket)
				<tr>
					<td>
						<strong>{{ link_to_route('tickets.show', $ticket->sujet, $ticket->id) }}</strong>
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

@section('scripts')
	<script>
    $(function() {
      moment.lang('fr');
      $('.time').each(function() {
        var time = $(this).text() + '+0000';
        $(this).text(moment(time).fromNow());
      });
    });
  </script>
@stop