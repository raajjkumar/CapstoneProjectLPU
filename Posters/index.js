
'use strict';
let x=0;
let y=0;
let w=640;
let h=480;
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const shows = document.getElementById('emo');
const snap = document.getElementById("snap");
const errorMsgElement = document.querySelector('span#errorMsg');
const emos=['Angry','Disgust', 'Fear', 'Happy', 'Sad', 'Surprise', 'Neutral']
let model;
const constraints = {
  audio: false,
  video: {
    width: 1280, height: 720
  }
};
function preprocess(imgData)
{
return tf.tidy(()=>{
    //convert the image data to a tensor 
    let tensor = tf.browser.fromPixels(imgData,1)
    //resize to 28 x 28 
    const resized = tf.image.resizeBilinear(tensor, [48,48]).toFloat()
    // Normalize the image 
    const offset = tf.scalar(255.0);
    const normalized = tf.scalar(1.0).sub(resized.div(offset));
    //We add a dimension to get a batch shape 
    const batched = normalized.expandDims(0);
    return batched
})
}
// Access webcam
async function init() {
    model = await tf.loadLayersModel('model/model.json');

  try {
    const stream = await navigator.mediaDevices.getUserMedia(constraints);

        handleSuccess(stream);
  } catch (e) {
    errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
  }
}

// Success
function handleSuccess(stream) {
  window.stream = stream;
  video.srcObject = stream;
}
function findIndexOfGreatest(array) {
  var greatest;
  var indexOfGreatest;
  for (var i = 0; i < array.length; i++) {
    if (!greatest || array[i] > greatest) {
      greatest = array[i];
      indexOfGreatest = i;
    }
  }
  return indexOfGreatest;
}
// Load init
init();

// Draw image

var context = canvas.getContext('2d');
async function fn() {
    var nf=1;
    
     context.drawImage(video,560,200,280,320,0,0,640,480);
        const pred = model.predict(preprocess(canvas)).dataSync();
        let i=findIndexOfGreatest(pred);
      setTimeout(fn,1);
//context.drawImage(video, x,y,w,h);

};
setTimeout(fn, 1000);