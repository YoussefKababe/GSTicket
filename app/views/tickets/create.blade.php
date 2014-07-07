@extends('layouts.default')

@section('content')

<div class="col-xs-12">
	<h1>Ouvrire une nouvelle discussion</h1>
</div>

{{ Form::open(['action' => 'TicketsController@store', 'role' => 'form']) }}
<div class="col-xs-9">
	<div class="form-group">
		{{ Form::text('sujet', null, ['class' => 'form-control', 'placeholder' => 'Sujet']) }}
	</div>

	<div class="form-group">
		{{ Form::textarea('message', null, ['placeholder' => 'Decrivez votre probleme...', 'class' => 'form-control', 'id' => 'summernote']) }}
	</div>

	<div class="dropzone" id="document-uploader">
		
	</div>
</div>

<div class="col-xs-3">
	<div class="form-group">
		{{ Form::select('produit', $produits, null, ['class' => 'form-control chosen-select', 'data-placeholder' => 'Produit']) }}
	</div>

	<div class="form-group">
		{{ Form::select('priorite', ['' => 'Priorité', 'Normal' => 'Normal', 'Urgent' => 'Urgent', 'Critique' => 'Critique'], Input::get('priorite'), ['class' => 'form-control'])}}
	</div>

	<div class="form-group">
		{{ Form::submit('Envoyer', ['class' => 'btn btn-info']) }}
	</div>
</div>	
{{ Form::close() }}

@stop