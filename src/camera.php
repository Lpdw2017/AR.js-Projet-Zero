<?php
require('inc/session.php');
require('inc/db.php');

$lol = 'trololo';
if(isset($_SESSION['log'])){
?>

<head>
	<script src="../aframe.min.js"></script>
<script src="../ar-js.js"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Realite augmentee</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
</head>

<body style='margin : 0px; overflow: hidden;'>
	<a-scene embedded arjs='trackingMethod: best;'>
      <a-anchor hit-testing-enabled='true'>
   		<!--<a-box position='0 0.5 0' material='opacity: 0.5;'></a-box>-->
			<a-text value=<?php echo $lol; ?> position='0 1 1'></a-text>
      </a-anchor>

		<a-camera-static/>
	</a-scene>

</body>
<?
}else{
	header('Location: index.php');
	exit();
}
