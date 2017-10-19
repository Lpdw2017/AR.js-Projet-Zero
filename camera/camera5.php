<!-- Sur le travail de Jerome Etienne  -->
<?php
require('../inc/session.php');
require('../inc/db.php');
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <title>Realite augmentee</title>
  <script src="lib/three.js/three.min.js"></script>
  <script src="lib/three.js/OBJLoader.js"></script>
  <script src="lib/AR.js/ar.js"></script>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

  <main id="markerInfo">
    <div class="marker-img-container">
      <img src="marker/marker5/pattern-marker.png" alt="marker">
    </div>
    <p>Marker not detected</p>
  </main>
  <script>
    // init rendu
    var renderer  = new THREE.WebGLRenderer({
      antialias: true,
      alpha: true
    });
    renderer.setClearColor(new THREE.Color('lightgrey'), 0)
    renderer.setSize( 640, 640 );
    renderer.domElement.style.position = 'absolute'
    renderer.domElement.style.top = '0px'
    renderer.domElement.style.left = '0px'
    document.body.appendChild( renderer.domElement );

    // Tableau renderer boucle
    var onRenderFcts= [];

    // init de scene et camera
    var scene = new THREE.Scene();

    // Creation de la caméra
    var camera = new THREE.Camera();
    scene.add(camera);

    //arToolkit Manipulation

    var arToolkitSource = new THREEx.ArToolkitSource({
      sourceType : 'webcam',
      sourceWidth: 640,
      sourceHeight: 640,
      displayWidth: 640,
      displayHeight: 640
    })

    arToolkitSource.init(function onReady(){
      onResize()
    }, function onError() {
      window.alert('MediaDevices.getUserMedia() is not supported on your browser. Try this with Chrome for Android or Safari on iOS 11.');
    })

    // resize = redimension
    window.addEventListener('resize', function(){
      onResize()
    })
    function onResize(){
      arToolkitSource.onResizeElement()
      arToolkitSource.copyElementSizeTo(renderer.domElement)
      if( arToolkitContext.arController !== null ){
        arToolkitSource.copyElementSizeTo(arToolkitContext.arController.canvas)
      }
    }
    // creation atToolkitContext
    var arToolkitContext = new THREEx.ArToolkitContext({
      cameraParametersUrl: 'lib/AR.js/data/camera_para.dat',
      detectionMode: 'mono',
    })
    // initialitation du ARTKit
    arToolkitContext.init(function onCompleted(){
      // copy projection matrix to camera
      camera.projectionMatrix.copy( arToolkitContext.getProjectionMatrix() );
    })

    // update du ARTKit / la frame
    onRenderFcts.push(function(){
      if( arToolkitSource.ready === false ) return

      arToolkitContext.update( arToolkitSource.domElement )

      // update scene.visible quand le marker apparait
      scene.visible = camera.visible

      markerInfo.classList.toggle('hidden', camera.visible)
    })

    // init MARKERCONTROLS de camera pour le MARKER
    var markerControls = new THREEx.ArMarkerControls(arToolkitContext, camera, {
      type : 'pattern',
      patternUrl : 'marker/marker5/pattern-marker.patt',
      changeMatrixMode: 'cameraTransformMatrix'
    })
    scene.visible = false

    // SCENE AJOUT D'ELEMENT
    var material  = new THREE.MeshNormalMaterial({
      transparent : true,
      opacity: 1,
      side: THREE.DoubleSide
    });

    var loader = new THREE.OBJLoader();
    loader.load('models/p-logo5.obj', function ( object ) {
      object.traverse( function ( child ) {
        if ( child instanceof THREE.Mesh ) {
          child.material = material;
        }
      } );

      // HACK(keanulee): AR.js assumes video source is 4:3, but we use a square canvas instead
      // to handle portrait and landscape. This vertical scale accounts for that.
      object.scale.y = 0.75;

      scene.add( object );
    });

    // rendu de la scene
    onRenderFcts.push(function(){
      renderer.render( scene, camera );
    });

    // run the rendering loop
    requestAnimationFrame(function animate(){
      // keep looping
      requestAnimationFrame( animate );
      // call each update function
      onRenderFcts.forEach(function(onRenderFct){
        onRenderFct()
      })
    });
  </script>
</body>
</html>

<?php

?>
