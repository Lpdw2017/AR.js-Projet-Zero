<?php
require('inc/session.php');
require('inc/db.php');
$finalite = "lol\ huihui";
$sql="SELECT * FROM ENIGME";
              $req = $db->prepare($sql);
              $req->execute();
              $result = $req->fetchAll(PDO::FETCH_ASSOC);
if(isset($_SESSION['log'])){
?>

<head>
	<script src="aframe.min.js"></script>
<script src="ar-js.js"></script>
<meta charset="utf-8">
<title>Realite augmentee</title>
</head>

<body style='margin : 0px; overflow: hidden;'>
	<a-scene embedded arjs='trackingMethod: best;'>
      <a-anchor hit-testing-enabled='true'>
   		<!--<a-box position='0 0.5 0' material='opacity: 0.5;'></a-box>-->
			<a-text value=<?php	echo $finalite ?>></a-text>
      </a-anchor>

		<a-camera-static/>
	</a-scene>

</body>
<?
}else{
	header('Location: index.php');
	exit();
}
