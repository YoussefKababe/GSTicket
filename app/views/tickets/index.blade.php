Utilisateur: {{ Auth::user()->nomUtilisateur }} -- ID: {{ Auth::user()->id }}

@foreach ($tickets as $ticket)
	<br>---------------------
	<p>Sujet: {{ link_to_action('TicketsController@show', $ticket->sujet, ['id' => $ticket->id]) }}</p>
	<p>Etat: {{ ucfirst($ticket->etat) }}</p>
	<p>Utilisateur: {{ $ticket->utilisateur->nomUtilisateur }}</p>
	-----------------------<br>
@endforeach