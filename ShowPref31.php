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
   margin-left:10px;
   font-size: 15px;
   border-radius: 8px;
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
            <div class="panel__content">
              <i class="large material-icons" id="rd" style="color:white;float: right;margin-top: 20px;font-size: 35px;">refresh</i>
              <div class="container">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="home-content">
                      <div class="home-heading">
                        <h1><em>Expressica</em>BOOKS</h1>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="home-box-content">
                            <div class="left-text">
                              <h4>Your  <em>Recommendedations:</em></h4>
                              <p>The Following is  the List of book based on your choices. It is selected by searching the database for your matching books</p>
                              <div class="primary-button">
                                <a href="#2">See List</a>
                              </div>
                            </div>
                            <div class="right-image">
                              <img src="img/books.png" alt="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </section>
<section class="panel b-yellow" id="2">
          <article class="panel__wrapper">
  <center>
  <div id="MovieList">
<ul style="list-style-type: none;">
  <?php
         $language=$_GET["authors"];
         $genre=$_GET["genre"];
         $rating=$_GET["rating"];
         $votes=$_GET["votes"];
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
$sql = "SELECT * FROM book_det where rating>=".$rating." and rating_count>".$votes." and authors like '%".$language."%' and genres like '%".$genre."%' ORDER BY RAND() LIMIT 15;";
if($language=="ALL")
{
  $sql = "SELECT * FROM book_det where rating>=".$rating." and rating_count>".$votes." and genres like '%".$genre."%' ORDER BY RAND() LIMIT 15;";
}
if($genre=="ALL")
{
  $sql = "SELECT * FROM book_det where rating>=".$rating." and rating_count>".$votes." and authors like '%".$language."%' ORDER BY RAND() LIMIT 15;";
}
if ($language=="ALL" and $genre=="ALL")
{
  $sql = "SELECT * FROM book_det where rating>=".$rating." and rating_count>".$votes." ORDER BY RAND() LIMIT 15;";
}
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

       echo "<li style='display: inline-block;'>
<div class='ListItems' value='".$row["title"]."'><img src='".$row["cover"]."' alt='".$row["title"]."' width='120' height='140' style='padding-bottom:0.5em;' /><br />Title:".$row["title"]."<br />Authors:".$row["authors"]."<br /><br /></div>
</li>";
    }
} 
else {
    echo "<li style='display: inline-block;'><div class='ListItems'>Not Found query:".$sql."</div></li>";
}


mysqli_close($conn);

         

   ?>
</ul>
</div>
</center>
</article>
</section>
 <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
<script src="Js/Highlighter.js"></script>


</body>
</html>