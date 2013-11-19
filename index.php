<DOCTYPE html>
<!-- http://sentimentizer.herokuapp.com/?jsoncallback=? -->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>sentimentizer</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
	console.log("hello?");

	
	// Attach a submit handler to the form
	//$("#foo").submit(function(event) {		
	$(function(){

		console.log("Am I inside this function?!");	
		// stop the form from submitting normally
		event.preventDefault();
		
		console.log("this is happening?");

		$.ajax({
				url: "http://sentimentizer.herokuapp.com/", //url to hit
				dataType: "json", //type of data expected back from server {status:success}
				data: {analyze: "Squid got this thing working even though she's flailing like a n00b."},
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

		$('#fooBtn').click(function(){
			$('#foo').submit();
		});	
			
	</script>
	
</head>
<body>
	<form id="foo">
		<input type="text" name="message" id="message" value="" />
		<input type="submit" value="Sentimentize" />
	</form>
	<div id="messages"></div>
	<div id="sentence"></div>
	<div id="polarity"></div>
	<div id="subjectivity"></div>
</body>
</html>
