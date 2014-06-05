Utilisateur: {{ Auth::user()->nomUtilisateur }} -- ID: {{ Auth::user()->id }}

@foreach ($tickets as $ticket)
	<br>---------------------
	<p>Sujet: {{ $ticket->sujet }}</p>
	<p>Message: {{ $ticket->message }}</p>
	<p>Utilisateur: {{ $ticket->utilisateur->nomUtilisateur }}</p>
	-----------------------<br>
@endforeach