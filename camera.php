<?php
require('inc/session.php');
require('inc/db.php');
$finalite = "lol";
$sql="SELECT * FROM ENIGME";
              $req = $db->prepare($sql);
              $req->execute();
              $result = $req->fetchAll(PDO::FETCH_ASSOC);
if(isset($_SESSION['log'])){
?>

<head>
	<script src="aframe.min.js"></script>
<script src="ar-js.js"></script>
<script src=".aframe-artoolkit.js"></script>



<meta charset="utf-8">
<title>Realite augmentee</title>
</head>

<body style='margin : 0px; overflow: hidden;'>
	<a-scene embedded arjs='trackingMethod: best;'>
      <a-anchor hit-testing-enabled='true'>
   		<!--<a-box position='0 0.5 0' material='opacity: 0.5;'></a-box>-->
			<a-text value=<?php	echo $finalite ?>></a-text>
      </a-anchor>
<a-marker type='barcode' value=20>
  <a-box depth="1" height="1" width="1" position='0 0 0.5' material='opacity: 0.5; side:double'></a-box>
</a-marker>
<a-entity camera></a-entity>
	</a-scene>

</body>
<?
}else{
	header('Location: index.php');
	exit();
}
