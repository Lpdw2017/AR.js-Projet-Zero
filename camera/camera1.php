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
  <style>
  body {
    margin: 0;
    position: fixed;
    width: 100%;
    height: 100%;
    background: #000;
    overflow: hidden;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    color: #fff;
  }

  #markerInfo {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: rgba(0,0,0,0.5);
    z-index: 1;
    opacity: 1;
    transition: opacity 0.2s;
    will-change: opacity;
  }

  #markerInfo.hidden {
    opacity: 0;
  }

  .marker-img-container {
    perspective: 600px;
  }

  .marker-img-container img {
    width: 200px;
    height: 200px;
    vertical-align: middle;
    transform: rotateX(60deg);
    opacity: 0.5;
  }
  </style>
</head>

<body>
  <main id="markerInfo">
    <div class="marker-img-container">
      <img src="marker/pattern-marker.png" alt="marker">
    </div>
    <p>Marker not detected</p>
  </main>

  <script>
  try {
    /**
     * Based on example code by Jerome Etienne (https://github.com/jeromeetienne/AR.js).
     */

    //////////////////////////////////////////////////////////////////////////////////
    //    Init
    //////////////////////////////////////////////////////////////////////////////////

    // init renderer
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

    // array of functions for the rendering loop
    var onRenderFcts= [];

    // init scene and camera
    var scene = new THREE.Scene();

    //////////////////////////////////////////////////////////////////////////////////
    //    Initialize a basic camera
    //////////////////////////////////////////////////////////////////////////////////

    // Create a camera
    var camera = new THREE.Camera();
    scene.add(camera);

    ////////////////////////////////////////////////////////////////////////////////
    //          handle arToolkitSource
    ////////////////////////////////////////////////////////////////////////////////

    var arToolkitSource = new THREEx.ArToolkitSource({
      // to read from the webcam
      sourceType : 'webcam',
      // resolution of at which we initialize in the source image
      sourceWidth: 640,
      sourceHeight: 640,
      // resolution displayed for the source
      displayWidth: 640,
      displayHeight: 640
    })

    arToolkitSource.init(function onReady(){
      onResize()
    }, function onError() {
      window.alert('MediaDevices.getUserMedia() is not supported on your browser. Try this with Chrome for Android or Safari on iOS 11.');
    })

    // handle resize
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
    ////////////////////////////////////////////////////////////////////////////////
    //          initialize arToolkitContext
    ////////////////////////////////////////////////////////////////////////////////


    // create atToolkitContext
    var arToolkitContext = new THREEx.ArToolkitContext({
      cameraParametersUrl: 'lib/AR.js/data/camera_para.dat',
      detectionMode: 'mono',
    })
    // initialize it
    arToolkitContext.init(function onCompleted(){
      // copy projection matrix to camera
      camera.projectionMatrix.copy( arToolkitContext.getProjectionMatrix() );
    })

    // update artoolkit on every frame
    onRenderFcts.push(function(){
      if( arToolkitSource.ready === false ) return

      arToolkitContext.update( arToolkitSource.domElement )

      // update scene.visible if the marker is seen
      scene.visible = camera.visible

      markerInfo.classList.toggle('hidden', camera.visible)
    })

    ////////////////////////////////////////////////////////////////////////////////
    //          Create a ArMarkerControls
    ////////////////////////////////////////////////////////////////////////////////

    // init controls for camera
    var markerControls = new THREEx.ArMarkerControls(arToolkitContext, camera, {
      type : 'pattern',
      patternUrl : 'marker/pattern-marker.patt',
      // patternUrl : 'lib/AR.js/data/patt.hiro',
      // patternUrl : 'lib/AR.js/data/patt.kanji',
      // as we controls the camera, set changeMatrixMode: 'cameraTransformMatrix'
      changeMatrixMode: 'cameraTransformMatrix'
    })
    // as we do changeMatrixMode: 'cameraTransformMatrix', start with invisible scene
    scene.visible = false

    //////////////////////////////////////////////////////////////////////////////////
    //    add an object in the scene
    //////////////////////////////////////////////////////////////////////////////////

    var material  = new THREE.MeshNormalMaterial({
      transparent : true,
      opacity: 1,
      side: THREE.DoubleSide
    });

    var loader = new THREE.OBJLoader();
    loader.load('models/p-logo.obj', function ( object ) {
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

    //////////////////////////////////////////////////////////////////////////////////
    //    render the whole thing on the page
    //////////////////////////////////////////////////////////////////////////////////

    // render the scene
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
  } catch (e) {}



  </script>
</body>
</html>

<?
}else{
	header('Location: index.php');
	exit();
}
