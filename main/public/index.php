<?php include '../../thumbsup/init.php' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Thumbsup</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <?php echo ThumbsUp::css() ?>
        <!-- jQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <?php echo ThumbsUp::javascript() ?>
	</head>
	<body>
    <?php
    echo "<br />";
//    echo ThumbsUp::item('first')->template('thumbs_up_down')->options('align=right');

    ?>

		<!-- Bootstrap JavaScript -->
<!--		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>-->
	</body>
</html>

