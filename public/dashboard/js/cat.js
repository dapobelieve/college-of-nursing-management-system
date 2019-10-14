var postId = 0;
var token = '';
$('.catArr').on('click','.cdit', function(event) {
    event.preventDefault();
    var postBody = event.target.parentNode.parentNode.firstChild.nextSibling.textContent;
    var postFont = event.target.parentNode.parentNode.firstChild.nextSibling.nextSibling.nextSibling.textContent
    var postId = event.target.parentNode.parentNode.dataset['zid'];
    $('#post_edit').val(postBody);
    $('#fontty').val(postFont);
	$('#catMod').modal();

	$('#modal-save').on('click', function(event) {
		event.preventDefault();
		token = $('#edit_token').val();
		$.ajax({
			url: eurl,
			method: 'POST',
			data: {postId: postId, _token: token, postFont: $('#fontty').val(), postBody: $('#post_edit').val() },
		})
		.done(function(msg) {
			alert('Category Updated');
		})
	})

});



//delete cat
$('.catArr').on('click','.cdel', function(event) {
	event.preventDefault();
    var postId = event.target.parentNode.parentNode.dataset['zid'];
    token = $('#edit_token').val();
	$.ajax({
		url: durl,
		type: 'POST',
		data: {postId: postId, _token: token},
	})
	.done(function(msg) {
		console.log(msg['message']);
		alert("Category Deleted");
	});

	
	

})


