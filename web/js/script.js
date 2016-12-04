$(function() {

$('#envoyer-message').click(function() {
	var message = $('#message').val();
	var username = $('#loggedInUser').val();
	if (message != '') {
		$.ajax({
			data: { username: username, message: message },
			type: "POST",
			url: "message.php",
			success: function() {
				$('#message').val('');
			}
		});
	}
});
var scrollHeightOfChatBox = $('#chat_area').scrollHeight;
setInterval(function() {
	$('#chat_area').load('display.php');
	$('#chat_area').scrollTop( scrollHeightOfChatBox );
}, 1000);

});