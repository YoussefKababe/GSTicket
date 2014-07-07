@extends('layouts.default')

@section('content')
	<div class="col-xs-9">
		<div class="panel panel-default ticketpanel">
		  <div class="panel-heading">
		  	<a class="userimg pull-left" href="{{ action('user.show', $ticket->utilisateur->nomUtilisateur) }}">
					<img src="/uploads/userimg/{{ $ticket->utilisateur->photo }}" class="img img-thumbnail">
				</a>
		    <h3 class="panel-title">{{ $ticket->sujet }}</h3>
		    <p><small>Par: <strong>{{ link_to_route('user.show', $ticket->utilisateur->nomUtilisateur, $ticket->utilisateur->nomUtilisateur) }}</strong> - <span class="time">{{ $ticket->created_at }}</span></small></p>
		    @if ($ticket->etat == 'Ouvert')
			    <span class="col-xs-3 label label-success ticket-status">
			  @elseif ($ticket->etat == 'Soumis au partenaire')
			  	<span class="col-xs-3 label label-info ticket-status">
			  @elseif ($ticket->etat == 'Résolu')
					<span class="col-xs-3 label label-default ticket-status">
				@endif
					{{ $ticket->etat }}
				</span>
		  </div>
		  <div class="panel-body">
		    {{ $ticket->message }}

		    @foreach ($ticket->documents as $document)
					<a href="/uploads/documents/{{ $document->nomDocument }}" target="_blank">Document</a><br>
		    @endforeach
		  </div>

		  <div class="panel-footer">
	  		<button id="scroll-to-respond" type="submit" class="btn btn-default">
	  			<i class="fa fa-reply"></i> Repondre
	  		</button>

	  		@if (Auth::user()->role_id == 1)
			  		<a <?php if ($ticket->etat == 'Résolu') echo 'style="display:none"' ?> id="close-ticket" data-url="{{ action('TicketsController@close', $ticket->id) }}" class="btn btn-danger pull-right btn-close">
			  			<i class="fa fa-times"></i> Fermer
			  		</a>
			  		<a <?php if ($ticket->etat == 'Soumis au partenaire' || $ticket->etat == 'Résolu') echo 'style="display:none"' ?> id="submit-ticket" class="btn btn-info pull-right">
			  			<i class="fa fa-paper-plane"></i> Passer au partenaire
			  		</a>
			  		<a <?php if ($ticket->etat == 'Ouvert') echo 'style="display:none"' ?> id="reopen-ticket" data-url="{{ action('TicketsController@reopen', $ticket->id) }}" class="btn btn-success pull-right btn-close">
			  			<i class="fa fa-undo"></i> Réouvrir
			  		</a>
		  	@endif
		  </div>
		</div>

		@foreach ($ticket->reponses()->orderBy('created_at')->get() as $reponse)
			<div class="panel panel-default postedreponse">
			  <div class="panel-heading">
			  	<div class="author-info col-xs-9">
				  	<a class="userimg pull-left" href="{{ action('user.show', $reponse->utilisateur->nomUtilisateur) }}">
							<img src="/uploads/userimg/{{ $reponse->utilisateur->photo }}" class="img img-thumbnail">
						</a>
				    <h3 class="panel-title">{{ link_to_route('user.show', $reponse->utilisateur->nomUtilisateur, $reponse->utilisateur->nomUtilisateur) }}</h3>
				    <p><small><span class="time">{{ $reponse->created_at }}</span></small></p>
			    </div>
			    @if ($reponse->utilisateur->role_id == 1)
			    	<span class="label label-default pull-right">Administrateur</span>
			    @elseif ($reponse->utilisateur->role_id == 2)
			    	<span class="label label-default pull-right">Partenaire</span>
			    @endif
			  </div>
			  <div class="panel-body">
			    {{ $reponse->message }}
			  </div>
			</div>
		@endforeach

		<div class="panel panel-default postreponse">
		  <div class="panel-heading">
		    <h3 class="panel-title">Nouvelle reponse</h3>
		  </div>
		   
		  {{ Form::open(['id' => 'ticket-response', 'action' => ['ReponsesController@store', 'id' => $ticket->id], 'role' => 'form']) }}
			
				<div class="panel-body">
					{{ Form::textarea('message', null, ['placeholder' => 'Ecrire une reponse...', 'class' => 'form-control', 'id' => 'summernote']) }}
			
		  	</div>

		  	<div class="panel-footer">
		  		<button type="submit" class="btn btn-default">
		  			<i class="fa fa-reply"></i> Repondre
		  		</button>
			  </div>

		  {{ Form::close() }}
		</div>
	</div>

	<div id="response-model" class="panel panel-default postedreponse" style="display:none">
	  <div class="panel-heading">
	  	<div class="author-info col-xs-9">
		  	<a class="userimg pull-left" href="{{ action('user.show', '') }}">
					<img src="" class="img img-thumbnail">
				</a>
		    <h3 class="panel-title">
		    	{{ link_to_route('user.show', '', '') }}
		    </h3>
		    <p>
		    	<small>
		    		<span class="time">
		    	
		    		</span>
		  		</small>
		  	</p>
	    </div>
	    <span class="label label-default pull-right" style="display:none">
	    	
	    </span>
	  </div>
	  <div class="panel-body">

	  </div>
	</div>
@stop