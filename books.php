<!DOCTYPE html>
<html>
<head>
	<title>Movie Extension</title>
	<script src="Js/jquery-3.4.1.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
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
   font-size: 15px;
    border-radius: 8px;
   width:120px;
   height: 30px;
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
 <script src="Js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<body>
<div class="se-pre-con"></div>
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
              <a href="songs.php" class="nav__link c-red"><img src="img/headphones.png" alt=""></a>
            </li>
            <li class="nav__item">
              <a href="books.php" class="nav__link c-green"><img src="img/books.png" alt=""></a>
            </li>
          </ul>
        </nav>


  <section class="panel b-blue" id="1">
          <article class="panel__wrapper">
            <i class="large material-icons" id="rd" style="color:white;float: right;margin-top: 20px;font-size: 35px;">refresh</i>
                <div class="home-content">
                      <div class="home-heading">
                        <h1><em>Expressica</em>BOOKS</h1>
                      </div>

<center>
<form method="get">
<table>
<tr>
<td> 
 Authors</td>
 <td>&nbsp;<select id="authors" class="select_panel" >
      <!-- Dropdown List Option -->
      </select>
</td>
</tr>
<tr>
  <td>
 Your Favorite Genre</td><td>&nbsp;<select id="genres" class="select_panel">
      <!-- Dropdown List Option -->
      </select>
</td>
</tr>
<tr>
  <td>
Rating above</td><td>&nbsp;<select id="rating" class="select_panel">
      <option value="1.0" >1.0</option>
  <option value="1.5">1.5</option>
  <option value="2.0">2.0</option>
  <option value="2.5">2.5</option>
  <option value="2.7">2.7</option>
  <option value="3.0">3.0</option>
  <option value="3.2">3.2</option>
  	 <option value="3.5" >3.5</option>
  <option value="3.7">3.7</option>
  <option value="4.0">4.0</option>
  <option value="4.1">4.1</option>
  <option value="4.3">4.3</option>
  <option value="4.5">4.5</option>
  <option value="4.7">4.7</option>
    <option value="4.9">4.9</option>
      <option value="5.0">5.0</option>
</select>
</td>
</tr>
<tr>
  <td>
Vote Count above</td><td>&nbsp;<select id="votes" class="select_panel">
   <option value="5" >5</option>
   <option value="10" >10</option>
   <option value="50" >50</option>
   <option value="100" >100</option>
  <option value="1000" >1000</option>
  <option value="100">5000</option>
  <option value="5000">10000</option>
  <option value="27800">25000</option>
  <option value="100000">100000</option>
  <option value="3000000">3000000</option>
  <option value="5000000">5000000</option>
</select>
</td>
</tr>
</table>
<br />
<br />
<button class="vtn" type="button" id="s1" > Get Suggestion</button>

</form>
</center>
</div>
</article>
</section>
    <section class="panel b-red" id="3">

<center>
<form method="get">
<br /> 
<br />
<div id="wrapper">
   Or..
     <div class="heading">
                        <h4> Select Your Favorite Movies to see simmilar ones</h4>
                      </div>
<br />

<div id="MovieList" style="overflow: auto;height:300px;">
<ul style="list-style-type: none;">
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM book_det  ORDER BY RAND() LIMIT 15;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        echo "<li style='display: inline-block;'>
<div class='ListItems' value='".$row["title"]."'><img src='".$row["cover"]."' alt='".$row["title"]."' width='120' height='140' style='padding-bottom:0.5em;' /><br />Title:".$row["title"]."<br />Authors:".$row["authors"]."<br /><br /></div>
</li>";
    }
} else {
    echo "Not Found";
}

mysqli_close($conn);

?>
</ul>
</div>
<br />

<button class="vtn" type="button" id="s2"> Get Suggestion</button>
</div>


<script src="Js/njs1.js"></script>
</form>



</center>
</section>
 
        

        <script src="Js/vendor/bootstrap.min.js"></script>

        <script src="Js/plugins.js"></script>
        <script src="Js/main.js"></script>
        <script src="Js/Highlighter.js"></script>
</body>
</html>
