<!DOCTYPE html>
<html>
<head>
	<style>
	body {
    margin: 0;
    padding: 0;
    height: 100vh; /* Set the height to 100vh (100% of the viewport height) */
    overflow: hidden; /* Hide any content that exceeds the viewport */
}

#video-container {
    position: fixed; /* Make the video container fixed to the viewport */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* Set a negative z-index to make the video appear behind other elements */
    overflow: hidden;
}

#video-container video {
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.container {
    position: relative; /* Make the container positioned relative to its normal position */
    z-index: 1; /* Set a positive z-index to make the container appear in front of the video */
    color: white; /* Set the text color to white for better visibility */
}
</style>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	
	<div id="video-container">
  <video autoplay loop muted playsinline>
    <source src="onepiece_Trim.mp4" type="video/mp4">
  </video>
</div>
	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>