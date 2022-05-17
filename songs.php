<!DOCTYPE html>
<html>
<head>
  <title>Movie Extension</title>
  <script src="Js/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest"> </script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="src/jquery.facedetection.js"></script> 
<script src="src/ccv.js"></script> 
<script src="src/cascade.js"></script> 
<script src="face-api.js"></script>
<style type="text/css">
  .video-container {
            position: relative;
            width: 260px;
            height: auto;
            margin: 20px auto;
            border: 10px solid #fff;
            box-shadow: 0 5px 5px #000;
        }
            .video {
                display: block;
                width: 100%;
                height: auto;
            }

        #face {
            position: absolute;
            border: 2px solid #FFF;
            left:560px;
            top:200px;
            width:280px;
            height: 320px;
            color: white;
        }
        .face {
            position: absolute;
            border: 2px solid #FFF;
          
        }
         #emo {
            position: absolute;
            left:450px;
            top:530px;
            font-size: 20px;
            font-style: bold;
            color: red;
        }
        #emo2 {
            position: absolute;
            left:450px;
            top:730px;
            font-size: 20px;
            font-style: bold;
            color: red;
        }

</style>
     <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/templatemo-style.css">
</head>
 
<style>
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/materialicons/v48/flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2) format('woff2');
}
.color {
    background-color: magenta;
    color:white;
}
.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-smoothing: antialiased;
}
body {
  min-width: 600px;
  max-width: 100%;
  position: relative;
  vertical-align:middle;
  margin-top:-15px;
  margin-left:-15px;
  margin-right:-15px;
  background-color:white;

}
#Header
{
color:black;
padding-left:30px;
background-color:white;
padding-top:5px;

text-shadow:1px 1px 1px white;
}
form
{
    margin-left:30px;
    font-size: 20px;
    color:black;
    margin-top: 10px;
    align-content: justify;
    color:white;
}
.select_panel
{
   color:black;
   background-color:white;
   margin-left:10px;
   font-size: 15px;

   width:90px;
   height: 40px;
   margin-top: 5px;
}
.vtn
{
   color:white;
   background-color:magenta;
   margin-left:10px;
   font-size: 20px;
   border-radius: 8px;
}
.ListItems
{
  width:60 px;
   font-size:80%;
    text-align:center;
   margin-left: 10px;
   color:white;
}
.serviceBox{
    text-align: center;
}
.serviceBox .service-icon{
    width: 150px;
    height:150px;
    line-height:150px;
    font-size: 40px;
    color: #434163;
    margin: 20px auto;
    position: relative;
}
.serviceBox .service-icon:before,
.serviceBox .service-icon:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    position: absolute;
    top: 0;
    left: -2px;
    transition: all 0.33s ease-out 0s;
}
.serviceBox .service-icon:before{
    border: 2px solid #00a79c;
    top: -4px;
}
.serviceBox .service-icon:after{
    border: 2px solid #ff794a;
    top: 4px;
}
.serviceBox:hover .service-icon:before{
    top: 4px;
}
.serviceBox:hover .service-icon:after{
    top: -4px;
}
.serviceBox .title{
    font-size: 24px;
    font-weight: bold;
  
    margin-bottom: 15px;
    color:white;
}
.serviceBox .description{
    font-size: 14px;
    color: #666;
}
@media only screen and (max-width: 990px){
    .serviceBox{ margin-bottom: 30px; }
}
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
}
</style>
 <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<body>
<nav class="nav">
          <div class="burger">
            <div class="burger__patty"></div>
          </div>

          <ul class="nav__list">
            <li class="nav__item">
              <a href="index.php" class="nav__link c-blue"><img src="img/home-icon.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="movies.php" class="nav__link c-yellow scrolly"><img src="img/video-camera.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="#3" class="nav__link c-red"><img src="img/headphones.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="books.php" class="nav__link c-green"><img src="img/books.png" alt=""></a>
            </li>
          </ul>
        </nav>


  <section class="panel b-blue" id="1">

          <article class="panel__wrapper">
             
                  <div class="video-wrap">
    <video id="video" playsinline autoplay></video>

</div>

<!-- Trigger canvas web API -->


<div id="face">
</div>
<div id="emo">
	<center>Put Your Face here and Get Songs as per your mood..
	<br />

    <button id="snap">Capture</button></center>
</div>

<!-- Webcam video snapshot -->



</article>
</section>
 <section class="panel b-red" id="3">
<canvas id="canvas" width="640" height="480"></canvas  >
<div id="emo2">
	Calculating Emotion
</div>
<script src="index.js"></script>

                 
           
</section>
 
        

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="Js/Highlighter.js"></script>
</body>
</html>

