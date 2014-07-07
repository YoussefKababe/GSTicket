$(function () {
	moment.lang('fr');
  $('.time').each(function() {
    var time = $(this).text() + '+0000';
    $(this).text(moment(time).calendar());
  });

  $('#summernote').summernote({
  	height: 200,
  	toolbar: [
  		['style', ['style']],
  		['style', ['bold', 'italic', 'underline', 'strikethrough']],
  		['fontsize', ['fontsize']],
  		['color', ['color']],
  		['para', ['ul', 'ol', 'paragraph']],
  		['table', ['table']],
  		['insert', ['link', 'picture', 'video', 'hr']],
  		['misc', ['fullscreen']]
  	],
  	onImageUpload: function(files, editor, editable) {
  		data = new FormData();
  		data.append("file", files[0]);
  		$.ajax({
  			data: data,
  			type: 'POST',
  			url: "/documents/uploadTicketImage",
  			cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
          editor.insertImage(editable, response);
        }
  		});
	  }
  });

  $('#close-ticket').click(function() {
  	$.ajax({
  		url: $(this).data('url'),
  		type: 'PUT',
  		success: function(response) {
  			alert('Ticket fermé');
  		}
  	});
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
	  		$('form').append('<input hidden type="text" name="file[]" value="' + response.newName + '" data-original-name="' + response.originalName + '" />');
	  	});

	  	this.on('')
	  }
	};

	$('#ticket-response').submit(function(event) {
		data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: $('#ticket-response').attr('action'),
			data: data,
			success: function(response) {
				reponse = $('#response-model').clone();

				$('.author-info', reponse).find('.userimg').attr('href', function(i, href) {
					return href + '/' + response.userName;
				});

				$('.author-info', reponse).find('img').attr('src', '/uploads/userimg/' + response.userImg);

				$(".panel-title", reponse).find("a").attr('href', function(i, href) {
					return href + '/' + response.userName;
				});

				$(".panel-title", reponse).find("a").html(response.userName);

				if (response.userRole == 1)
					$('.panel-heading', reponse).find('.label').html("Administrateur").show();
				else if (response.userRole == 2)
					$('.panel-heading', reponse).find('.label').html("Partenaire").show();

				$(".panel-heading", reponse).find(".time").html(moment(response.date.date).calendar());

				$('.panel-body', reponse).html(response.message);
				$(reponse).removeAttr('id');

				$('#ticket-response')[0].reset();
				$('#summernote').code('<p><br></p>');

				$('.postreponse').after(reponse);

				$(reponse).fadeIn("slow");
			}
		});
		event.preventDefault();
	});
})
