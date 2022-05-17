<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Website Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    table{border-style:solid;
          border-width:3px;
          border-color:blue;
        }
      </style>
  </head>
  <body>
      <?php
        $host="localhost";
        $user="root";
        $password="root";
        $con=mysqli_connect($host,$user,$password);
        $dbname=mysqli_select_db($con,"cda") or die('error connect');
        $querytype="select Type from website_data group by Type";
        $query_run1=mysqli_query($con,$querytype) or die('error exec');
        $data=array();
        if(mysqli_num_rows($query_run1)>0){
          while ($row=mysqli_fetch_assoc($query_run1)){
            $data[]= $row['Type'];
          }
        }
        $querycoun="select Country from website_data group by Country";
        $query_run2=mysqli_query($con,$querycoun);
        $data1=array();
        if(mysqli_num_rows($query_run2)>0){
          while ($row=mysqli_fetch_assoc($query_run2)){
            $data1[]= $row['Country'];
          }
        }
        $search=" ";
        $type=" ";
        $lang=" ";
        $checkbox=" ";
        $storage=array();
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          if($_POST["search"]===''){
            $search=null;
          }else{
            $search=$_POST["search"];
          }
          if($_POST["type"]===''){
            $type=null;
          }else{
            $type=$_POST["type"];
          }
          if($_POST["Country"]===''){
            $Country=null;

          }else{
            $Country=$_POST["Country"];
           
          }
           if(isset($_GET['Country']))
            {
            	$Country=htmlspecialchars($_GET['Country']);
            }
          // foreach($checkbox as $selected){
          //   $storage[]= $selected;}
        }
        // if(isset($_GET['page'])){
        //   $page=$_GET['page'];
        // }
        // else {
        //   $page=1;
        // }
        // $start_from = ($page-1)*$num_per_page;


       ?>
      <div class="jumbotron container" style="width: 550px; ">
        <center><h1>Website Data Fetch</h1></center><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group ">
            <label for="exampleFormControlInput1">Search</label>
            <input type="text" class="form-control" name="search">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Type</label>
            <?php
                echo "<select class='form-control' id='exampleFormControlSelect1' name='type'>";
                echo "<option value=''></option>";
                for($i=0;$i<sizeof($data);$i++){
                  echo "<option value='$data[$i]'>$data[$i]</option>";
                }
                echo "</select>";
             ?>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Country</label>
            <?php
              echo "<select class='form-control' id='exampleFormControlSelect1' name='Country'>";
              echo "<option value=''></option>";
              for($i=0;$i<sizeof($data1);$i++){
                echo "<option value='$data1[$i]'>$data1[$i]</option>";
              }
              echo "</select>";
             ?>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submitreset" class="btn btn-primary">Reset</button>
          </form>
<br><br>
  <center>
    <?php
    echo "<table border= '2'>
      <tr>
      <th>No.</th>
      <th>Url</th>
      <th>Country</th>
      <th>Type</th>
      </tr>";
      switch (True) {

        // case (!is_NULL($Country) AND !is_NULL($search) AND !is_NULL($type)):
        //     $queries="Select Url,Country,Type from website_data where Url like '%".$search."%' AND Country='$Country' AND Type='$type'";
        //     $query_run9=mysqli_query($con,$queries);
        //     if(mysqli_num_rows($query_run9)>0)
        //     {
        //       $i=1;
        //       while ($row=mysqli_fetch_assoc($query_run9))
        //       {
        //         echo "<tr>";
        //         echo "<td>" . $i . "</td>";
        //         echo "<td>" . $row['Url'] . "</td>";
        //         echo "<td>" . $row['Country'] . "</td>";
        //         echo "<td>" . $row['Type'] . "</td>";
        //         echo "</tr>";
        //         $i=$i+1;
        //       }
        //       echo "</table>";
        //     }
        //     break;
        // case (!is_NULL($Country) AND !is_NULL($search)):
        //     $queries="Select Url,Country,Type from website_data where Url like '%".$search."%' AND Country='$Country'";
        //     $query_run9=mysqli_query($con,$queries);
        //     if(mysqli_num_rows($query_run9)>0)
        //     {
        //       $i=1;
        //       while ($row=mysqli_fetch_assoc($query_run9))
        //       {
        //         echo "<tr>";
        //         echo "<td>" . $i . "</td>";
        //         echo "<td>" . $row['Url'] . "</td>";
        //         echo "<td>" . $row['Country'] . "</td>";
        //         echo "<td>" . $row['Type'] . "</td>";
        //         echo "</tr>";
        //         $i=$i+1;
        //       }
        //       echo "</table>";
        //     }
        //     break;

        case (!is_NULL($type) AND !is_NULL($search)):
            $queries="Select Search,Country,Type from website_data where Search like '%".$search."%' AND Type='".$type."'";
            $query_run9=mysqli_query($con,$queries);
            if(mysqli_num_rows($query_run9)>0)
            {
              $i=1;
              while ($row=mysqli_fetch_assoc($query_run9))
              {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row['Search'] . "</td>";
                echo "<td>" . $row['Country'] . "</td>";
                echo "<td>" . $row['Type'] . "</td>";
                echo "</tr>";
                $i=$i+1;
              }
              echo "</table>";
            }
            break;

        case (!is_NULL($type) AND !is_NULL($Country)):
            $queries="select Url,Country,Type from website_data where Country='$Country' AND Type='$type'";
            $query_run9=mysqli_query($con,$queries);
            if(mysqli_num_rows($query_run9)>0)
            {
              $i=1;
              while ($row=mysqli_fetch_assoc($query_run9))
              {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row['Url'] . "</td>";
                echo "<td>" . $row['Country'] . "</td>";
                echo "<td>" . $row['Type'] . "</td>";
                echo "</tr>";
                $i=$i+1;
              }
              echo "</table>";
            }
            break;

        case (!is_NULL($search)):
            $querysea="Select Url,Country,Type from website_data where Url like '%".$search."%'";
            $query_run4=mysqli_query($con,$querysea);
            if(mysqli_num_rows($query_run4)>0)
            {
              $i=1;
              while ($row=mysqli_fetch_assoc($query_run4)) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row['Url'] . "</td>";
                echo "<td>" . $row['Country'] . "</td>";
                echo "<td>" . $row['Type'] . "</td>";
                echo "</tr>";
                $i=$i+1;
              }
              echo "</table>";
            }else{
              echo "<em> <b> Nothing Found </b> </em>";
            }
            break;
        case (!is_NULL($type)):
          $querytype1="select Url,Country,Type from website_data where Type='$type'";
          $query_run5=mysqli_query($con,$querytype1);
          if(mysqli_num_rows($query_run5)>0)
          {
            $i=1;
            while ($row=mysqli_fetch_assoc($query_run5))
            {
              echo "<tr>";
              echo "<td>" . $i . "</td>";
              echo "<td>" . $row['Url'] . "</td>";
              echo "<td>" . $row['Country'] . "</td>";
              echo "<td>" . $row['Type'] . "</td>";
              echo "</tr>";
              $i=$i+1;
            }
            echo "</table>";
          }
          break;
      case (!is_NULL($Country) || isset($_GET['Country'])):
          $num_per_page=2;
          $page=isset($_GET['page'])?intval($_GET['page']):1;
          $start1=($page-1)*$num_per_page;
          $querytype2="select Search,Country,Type from website_data where Country='".$Country."' limit ".$start1.",".$num_per_page."";
          $query_run6=mysqli_query($con,$querytype2);
          $querypag="select Country from website_data where Country='".$Country."'";
          $query_runpag=mysqli_query($con,$querypag);
          $total_record=mysqli_num_rows($query_runpag);
          $total_page=ceil($total_record/$num_per_page);

          if(mysqli_num_rows($query_run6)>0)
          {
            $i=1;
            while ($row=mysqli_fetch_assoc($query_run6))
            {
              echo "<tr>";
              echo "<td>" . $i . "</td>";
              echo "<td>" . $row['Search'] . "</td>";
              echo "<td>" . $row['Country'] . "</td>";
              echo "<td>" . $row['Type'] . "</td>";
              echo "</tr>";
              $i=$i+1;
            }

            echo "</table>";

          }
          else
            {echo "<tr>";
              echo "<td>" .$querytype2."</td>";
              echo "</tr>";

            	echo "</table>";
            }
          for($i=1;$i<$total_page;$i++)
          {
            echo "<a href='?page=$i&Country=$Country'>$i</a>";

          }
          break;

        default:
          // code..
        
          break;
      }

mysqli_close($con);

     ?>
   </center>
</div>
  </body>
</html>
