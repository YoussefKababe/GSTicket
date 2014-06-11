@extends('layouts.default')

@section('content')
	<div class="col-xs-8">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">{{ $ticket->sujet }}</h3>
		    <p><small>Par: <strong>{{ link_to_route('user.show', $ticket->utilisateur->nomUtilisateur, $ticket->utilisateur->nomUtilisateur) }}</strong> - <span class="time">{{ $ticket->created_at }}</span></small></p>
		  </div>
		  <div class="panel-body">
		    {{ $ticket->message }}
		  </div>
		</div>

		<div class="panel panel-info reponse">
		  <div class="panel-heading">
		    <h3 class="panel-title">Nouvelle reponse</h3>
		  </div>
		   
		  {{ Form::open(['action' => ['ReponsesController@store', 'id' => $ticket->id], 'role' => 'form']) }}
			
				<div class="panel-body">
					{{ Form::textarea('message', null, ['placeholder' => 'Ecrire une reponse...', 'class' => 'form-control']) }}
			
		  	</div>

		  	<div class="panel-footer">
		  		{{ Form::submit('Repondre', ['class' => 'btn btn-default']) }}
			  </div>

		  {{ Form::close() }}
		</div>

		@foreach ($ticket->reponses as $reponse)
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">{{ link_to_route('user.show', $reponse->utilisateur->nomUtilisateur, $reponse->utilisateur->nomUtilisateur) }}</h3>
			    <p><small><span class="time">{{ $reponse->created_at }}</span></small></p>
			  </div>
			  <div class="panel-body">
			    {{ $reponse->message }}
			  </div>
			</div>
		@endforeach
	</div>

@stop

@section('scripts')
	<script>
    $(function() {
      moment.lang('fr');
      $('.time').each(function() {
        var time = $(this).text() + '+0000';
        $(this).text(moment(time).calendar());
      });
    });
  </script>
@stop