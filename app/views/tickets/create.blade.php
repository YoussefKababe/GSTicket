@extends('layouts.default')

@section('content')

<div class="col-xs-12">
	<h1>Ouvrire une nouvelle discussion</h1>
</div>

{{ Form::open(['action' => 'TicketsController@store', 'role' => 'form']) }}
<div class="col-xs-8">
	<div class="form-group">
		{{ Form::text('sujet', null, ['class' => 'form-control', 'placeholder' => 'Sujet']) }}
	</div>

	<div class="form-group">
		{{ Form::textarea('message', null, ['placeholder' => 'Decrivez votre probleme...', 'class' => 'form-control', 'id' => 'summernote']) }}
	</div>

	<div class="dropzone" id="document-uploader">
		
	</div>
</div>

<div class="col-xs-4">
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

@section('scripts')
	<script>
    $(function() {
      $('#summernote').summernote({
      	height: 150,
      	toolbar: [
      		['style', ['style']],
      		['style', ['bold', 'italic', 'underline', 'strikethrough']],
      		['fontsize', ['fontsize']],
      		['color', ['color']],
      		['para', ['ul', 'ol', 'paragraph']],
      		['table', ['table']],
      		['insert', ['link', 'video', 'hr']],
      		['misc', ['fullscreen']],
      	]
      });

      $('.chosen-select').chosen({
      	no_results_text: 'Acun prodit avec ce nom: '
      });

      Dropzone.options.documentUploader = {
			  paramName: "file",
			  url: "/documents/upload",
			  addRemoveLinks: true,
			  dictDefaultMessage: 'Déposez des fichiers ici pour les télécharger',

			  init: function() {
			  	this.on('success', function(file, response) {
			  		$('form').append('<input hidden type="text" name="file[]" value="' + response + '" />');
			  	})
			  }
			};
    });
  </script>
@stop