
<!-- 
<html>
<head>
	<title></title>
</head>
<body>

<?php
	if (isset($_POST['submit'])) {

		$message = $_POST['message'];

		if (!empty($message)){
			echo "<p>Thanks you, , for your submission.</p>";	
		}else{
					header('Location: form.php');
		}

	}
 	else {
		header('Location: form.php');
	}
?>
<!-- <!-- 
</body>
</html> -->

<html>
<head>
<?php
	require('functions.php');

	if (!isset($_POST['submit'])) {
		echo "redirect";
		redirect('form.php');
	}
?>
</head>
<body>
	<?php

	if (isset($_POST['submit'])) {

		$message = $_POST['message'];

		if (!empty($message)){
			$video = searchVideos($message);
			//print_r($photos);
			echo "<div id=\"container\" style=\"width:1000px\">";
			echo "<div id=\"header\" style=\"background-color:#008AE6;\">";
			echo "<h1 style=\"margin-bottom:0;\">YouTube Search</h1></div>";
			echo "<div id=\"menu\" style=\"background-color:#FFFFFF;height:1200px;width:300px;float:left;\">";
			echo "<a href=form.php>Redo Search</a><br></div>";
			echo "<div id=\"content\" style=\"background-color:#EEEEEE;height:1200px;width:1000px;float:center;\"><b>Top 10 Results:</b><br/>";
			foreach ($video->entry as $entry) {
			 	$media = $entry->children('http://search.yahoo.com/mrss/');
		     	$attrs = $media->group->player->attributes();
		      	$watch = $attrs['url'];
				echo "<a href=". $watch. ">" . $entry->title . "</a><br/>";

				// get video thumbnail
		        $attrs = $media->group->thumbnail[0]->attributes();
		        $thumbnail = $attrs['url']; 
		        echo "<a href=\"{$watch}\"><img src=\"$thumbnail\"/></a><br/>";
			}
			echo "</div>";
		}else{
			echo "<p>Cannot search for empty string!</p>";	
		}

	}
 	else {
		header('Location: form.php');
	}
?>
</body>
</html>