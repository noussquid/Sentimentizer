<DOCTYPE html>
<!-- http://sentimentizer.herokuapp.com/?jsoncallback=? -->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>sentimentizer</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">

	$(function(){

		$('#fooBtn').click(function(){
			
			console.log("preparing to submit the form.");
			
			// stop the form from submitting normally
			event.preventDefault();
	
			console.log("oh we're really gonna submit the form now.");

			$.ajax({
				url: "http://sentimentizer.herokuapp.com/", //url to hit
				dataType: "json", //type of data expected back from server {status:success}
				data: { analyze: $('#message').val() },
				type: "POST", 
				crossDomain: true,
				success: function(data, textStatus, jqXHR) {
					$('#sentence').text("Sentence: " + data[0].raw);
					$('#polarity').text("Polarity: " + data[0].polarity);
					$('#subjectivity').text("Subjectivity: " + data[0].subjectivity);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$('#messages').append('<div class="error">'+errorThrown+'</div>');
				},
			});

		});
	});

			
	</script>
	
</head>
<body>
	<form id="foo">
		<input type="text" name="message" id="message" value="" />
		<input type="submit" id="fooBtn" value="Sentimentize" />
	</form>
	<div id="messages"></div>
	<div id="sentence"></div>
	<div id="polarity"></div>
	<div id="subjectivity"></div>
</body>
</html>
