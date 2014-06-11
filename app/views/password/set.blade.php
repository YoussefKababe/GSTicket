@extends('layouts.login')


@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Inscription - Choisissez votre mot de passe</h3>
  </div>

  {{ Form::open(array('action' => 'RemindersController@postReset', 'class' => 'form-horizontal', 'role' => 'form')) }}

  <div class="panel-body">

  		@if ( Session::has('error') )
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
  		@endif

  		<div id="picture-container" class="picture">
  			<img src="/uploads/userimg/default.png" id="preview">
  		</div>
  		{{ Form::file('image', ['id' => 'image-input']) }}

  		<input type="text" id="x" hidden="hidden">
  			<input type="text" id="y" hidden="hidden">
  			<input type="text" id="w" hidden="hidden">
  			<input type="text" id="h" hidden="hidden">	


  		<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				{{ Form::text('nomUtilisateur', $nomUtilisateur, ['class' => 'form-control', 'placeholder' => 'Nom d\'utilisateur', 'readonly']) }}
			</div>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Nouveau mot de passe']) }}
			</div>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
				{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation'])}}
			</div>

			{{ Form::text('token', $token, ['hidden'])}}

  </div>

	<div class="panel-footer">
	  <div class="input-group pull-left">
			{{ Form::submit('Enregistrer mon mot de passe', ['class' => 'btn btn-primary']) }}
		</div>
	</div>

	<div class="modal fade" id="cropmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-md">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Recadrage photo</h4>
	      </div>
	      <div class="modal-body">
	        <img src="" id="target">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

  {{ Form::close() }}
</div>

@stop

@section('scripts')
	<script>
		function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();            
          reader.onload = function (e) {
              $('#target').attr('src', e.target.result);
              $('#preview').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]);
      }
    }

    function setCoords(coords)
		{
			var rx = xsize / coords.w;
			var ry = ysize / coords.h;

			$('#preview').css({
				width: Math.round(rx * boundx) + 'px',
				height: Math.round(ry * boundy) + 'px',
				marginLeft: '-' + Math.round(rx * coords.x) + 'px',
				marginTop: '-' + Math.round(ry * coords.y) + 'px'
			});


			$('#x').val(coords.x);
			$('#y').val(coords.y);
			$('#w').val(coords.w);
			$('#h').val(coords.h);
		}

		function initCoords()
		{
			var rx = xsize / 200;
			var ry = ysize / 200;

			$('#x').val(50);
			$('#y').val(50);
			$('#w').val(150);
			$('#h').val(150);

			$('#preview').css({
				width: Math.round(rx * boundx) + 'px',
				height: Math.round(ry * boundy) + 'px',
				marginLeft: '-' + Math.round(rx * 0) + 'px',
				marginTop: '-' + Math.round(ry * 0) + 'px'
			});
		}

    var jcrop_api, boundx, boundy;

    xsize = $('#picture-container').width(),
    ysize = $('#picture-container').height();
    
    $("#image-input").change(function(){
    		if (jcrop_api) {
		    	jcrop_api.destroy();
		    	$('#target').css('width', '');
		    	$('#target').css('height', '');
		    }
        readURL(this);
        $('#cropmodal').modal('toggle');
    });

    $('#cropmodal').on('shown.bs.modal', function (e) {
		  var jcrop = $('#target').Jcrop({
		  	onChange: setCoords,
		  	onSelect: setCoords,
		  	setSelect: [ 50, 50, 200, 200 ],
		  	minSize: [150, 150],
		  	aspectRatio: 1
		  }, function() {
		  	jcrop_api = this;
		  	var bounds = this.getBounds();
		  	boundx = bounds[0];
	      boundy = bounds[1];
	      initCoords();
		  });
		})
	</script>
@stop