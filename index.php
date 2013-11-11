<DOCTYPE html>
<!-- http://sentimentizer.herokuapp.com/?jsoncallback=? -->
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>sentimentizer</title>
	<link rel="stylesheet" href="style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">		
		$(function(){ 
		
			//send the ajax request
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
			
			$('#messages').text('fuck javascript and modern coding');
		}); 
	</script>
	
</head>
<body>
	<!-- <div id="messages"></div> -->
	<form name="messageForm" method="post" action="">
		<input type="text" name="message" id="message" />
		<input type="submit" id="submit" value="Submit" />
	</form>
	<div id="sentence"></div>
	<div id="polarity"></div>
	<div id="subjectivity"></div>
</body>
</html>
