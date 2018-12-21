<?php
	include_once("config/database.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="style.css">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<h2>Camagru</h2>
	<div id="vid_div">
		<div class="inline">
			<video id="live_vid" autoplay></video>
		</div>
		<div class="inline">
			<input type="checkbox" name="vehicle1" value="sticker" id="img1"> <img width="100" src="./images/1.png" alt=""><br>
			<input type="checkbox" name="vehicle1" value="sticker" id="img2"> <img width="100" src="./images/2.png" alt=""><br>
			<input type="checkbox" name="vehicle1" value="sticker" id="img3"> <img width="100"  src="./images/3.png" alt=""><br>
		</div>
	</div>
	<button id="snap">screenshot</button>
	<!-- <button id="upload">make_public</button>
	<button id="upload">select_stickers</button> -->
	<canvas id ="webcam_canvas" style="display:none"></canvas>
	<img id="final_img" src="">

	<script>
		const constraints = {
			video:true,
			audio:false
		}
		var video = document.querySelector("#live_vid");
		var save = document.querySelector("#upload");
		var koos = document.querySelector("#snap");
		// var img = document.querySelector("img");
		var final_img = document.getElementById("final_img");

		var canvas = document.querySelector("#webcam_canvas");

		var img1 = document.createElement("img1");
		img1.src = document.getElementById('img1').value;
		var img2 = document.createElement("img2");
		img2.src = document.getElementById('img2').value;
		var img3 = document.createElement("img3");
		img3.src = document.getElementById('img3').value;

		navigator.mediaDevices.getUserMedia(constraints).then((stream) => {video.srcObject = stream});
		
		koos.onclick = video.onclick = () => {
		canvas.width = video.videoWidth;
		canvas.height = video.videoHeight;
		var context = canvas.getContext('2d');

		context.globalAlpha = 1.0;
		context.drawImage(video, 0, 0);
		final_img.src = context.toDataURL("image/png");
		context.drawImage(img1, 0, 0, 100, 100);
		final_img.src = context.toDataURL("image/png");
		context.drawImage(img2, 0, 0, 100, 100);
		final_img.src = context.toDataURL("image/png");
		context.drawImage(img3, 0, 0, 100, 100);
		final_img.src = context.toDataURL("image/png");
		

		// var capture = document.createElement("img");
		// capture.src = canvas.toDataURL("image/png");
		// final_img.src = canvas.toDataURL("image/png");
		};
	   
		</script>
</body>
</html>