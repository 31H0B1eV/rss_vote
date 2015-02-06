<?php include './thumbsup/init.php' ?>
<?php include './main/rss.php' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Thumbsup</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//cdnjs.cloudflare.com/ajax/libs/bootcards/1.0.0/css/bootcards-desktop.min.css" rel="stylesheet" media="screen">
        <?php echo ThumbsUp::css() ?>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <?php echo ThumbsUp::javascript() ?>
	</head>
    <style>
        body {
            margin-top: -50px;;
        }
    </style>
	<body>

    <div class="container">
        <div class="row-fluid">
            <div class="panel panel-default bootcards-chart">
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                        <?php
                        $data = getData([$rssIndianaUniversity, $rssBloomington, $rssHeraldTimesOnline, $rssMagbloom]);
                        $result = sortData($data);
                        foreach($result as $item){
                        ?>
                    <div class="panel panel-default bootcards-summary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $item->title;?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="bootcards-chart-canvas">
                                    <?php echo '<p>' . $item->description . '</p>';?>
                                    <?php echo ThumbsUp::item($item->guid)->template('thumbs_up_down')->options('align=right');?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <small class="pull-right"><?php echo $item->pubDate;?></small>
                        </div>
                    </div>
                        <?php } ?>
                        <?php echo '<hr />';?>
                </div>
            </div>
        </div>
    </div>

		<!-- Bootstrap JavaScript -->
    <!-- Bootstrap and Bootcards JS -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootcards/1.0.0/js/bootcards.min.js"></script>
	</body>
</html>

