$(function () {
	moment.lang('fr');
  $('.time').each(function() {
    var time = $(this).text() + '+0000';
    $(this).text(moment(time).calendar());
  });
})