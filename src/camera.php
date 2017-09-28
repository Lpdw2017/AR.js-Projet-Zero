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
   		<a-box position='0 0.5 0' material='opacity: 0.5;'></a-box>
      </a-anchor>
		<a-camera-static/>
	</a-scene>
</body>
