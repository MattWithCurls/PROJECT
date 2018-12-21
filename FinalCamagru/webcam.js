
const constraints = {
    video:true,
    audio:false
}
const video = document.querySelector("#video");
//getUserMedia method prompts the user for permission to use a media input which produces, in this case, a video stream.
navigator.mediaDevices.getUserMedia(constraints).then((stream) => {video.srcObject = stream});
const screenShotButton = document.querySelector('#snap');
const img = document.querySelector("img");
const img1 = document.querySelector('.img1');

//this function is called above with the selection of superposable images. Depending on which option you selected it takes the value and adds it to the image src.
function setPicture(select){
    var DD = document.getElementById('dropdown');
    var value = DD.options[DD.selectedIndex].value;
    img1.src = value;
}
//when the screenshot button is clicked a canvas image is created from the video feed and img1 is added on the top
canvas.width = width;
			canvas.height = height;
			// Draw image of the video on the canvas
			context.drawImage(video, 0, 0, width, height);
			context.drawImage(overlay, 150, 0, 200, 200);
			
			// Create image from canvas
			const imgUrl = canvas.toDataURL("image/png");
			// Create image element
			//mj
			// console.log(imgUrl);
			const screenShotButton = document.createElement('img');
			screenShotButton.setAttribute('src', imgUrl);             // later
			
			var imageObj1 = new Image();
			var imageObj2 = new Image();
			imageObj1 = capture;
			// console.log("Obj1: " + imageObj1 + '\n');
			
			imageObj1.onload = function() {
				context.drawImage(imageObj1, 0, 0, width, height);
				imageObj2 = (overlay);
				imageObj2.onload = function() {
					context.drawImage(imageObj2, 0, 0, width, height);
					var img = context.toDataURL("image/png");
				}
			};