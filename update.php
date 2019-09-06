<?php
  require_once 'dbconnect.php';
  ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">

      #backBtn {
        margin-top: 20px;
      }


    </style>

    <title> </title>
  </head>
  <body>

    <div class="container">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">The big library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav> 


    </div>  

    <div class="container">
     

    <?php

        // Start getting the data back and fill in the input fields

      if($_GET['ISBN']) {
        $ISBN = $_GET['ISBN'];
        $query = "SELECT * FROM media WHERE ISBN = $ISBN";
        $result = mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $ISBN =   $row['ISBN'];
        $title =  $row['title'];
        $description =  $row['description'];
        $type =  $row['type'];
        $publish_date =  $row['publish_date'];
        $availability =  $row['availability'];
        $FK_publisher_ID =  $row['FK_publisher_ID'];

      } ?>
<!-- 
     END getting the data back and fill in the input fields -->

    <?php     
      // Sending query to server
     if(isset($_POST['saveChange'])) {

        $ISBN =   $_POST['ISBN'];
        $title =  $_POST['title'];
        $description =  $_POST['description'];
        $type =  $_POST['type'];
        $publish_date =  $_POST['publish_date'];
        $availability =  $_POST['availability'];
        $FK_publisher_ID =  $_POST['FK_publisher_ID'];
        $last_update = $_POST['last_update'];

       
        
        $query = "UPDATE media SET 
                  title= '$title',
                  description = '$description',
                  type = '$type',
                  publish_date = '$publish_date',
                  availability = '$availability',
                  FK_publisher_ID = '$FK_publisher_ID',
                  last_update = '$last_update'
                  WHERE ISBN = '$ISBN';" ; 

                  // last_update

        $updatedData = mysqli_query($conn,$query);
       
        if ($updatedData) {
            echo "Updated successfully";
        }

        else if (!$updatedData) {
          echo "ERROR! Try again";
        }
     }

     // End communicating with server
      
    ?>


    <form action="update.php" method="post">
        
        <div class="form-group">
          <label for="ISBN"></label>
          <input type="hidden" class="form-control" name="ISBN" id="ISBN" value="<?php echo $ISBN;?>">
        </div>

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" value="<?php echo $title;?>">
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" value="<?php echo $description;?>">
        </div>

        <div class="form-group">
          <label for="type">Typ </label>
          <input type="text" class="form-control" id="type" name="type" value="<?php echo $type;?>">
        </div>

        <div class="form-group">
          <label for="publish_date">Publish Date</label>
          <input type="text" class="form-control" id="publish_date" name="publish_date" value="<?php echo $publish_date;?>">
        </div>

        <div class="form-group">
          <label for="availability">Availability</label>
          <input type="text" class="form-control" id="availability" name="availability" value="<?php echo $availability;?>">
        </div>

        <div class="form-group">
          <label for="FK_publisher_ID">Publisher</label>
          <input type="text" class="form-control" id="FK_publisher_ID" name="FK_publisher_ID" value="<?php echo $FK_publisher_ID;?>">
        </div>

        <div class="form-group">
          <label for="last_update">Last Update</label>
          <input type="text" class="form-control" id="last_update" name="last_update" value="">
        </div>

        <button  class="btn btn-primary" name="saveChange">Save Changes</button>

      </form>

      <a href ='displayMedia.php'><button  class="btn btn-secondary" id="backBtn"> Back </button></a>

     </div>


     <?php
       include 'components/footer.php';
     ?>

    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <script type="text/javascript">

        function updateDate() {

        var day = new Date();

        var dd = String(day.getDate()).padStart(2, '0');
        var mo = String(day.getMonth() + 1).padStart(2, '0'); 
        var yyyy = day.getFullYear();

        var hh = day.getHours();
        var mm = day.getMinutes();
        var se = day.getSeconds();

        today =  yyyy + "-" + mo + "-" + dd +" "+ hh + ":" + mm + ":" + se;
        console.log(today);

        $("#last_update").val(today);

        setTimeout( updateDate , 4000 );

        }

        updateDate();

      </script>



    <?php     
      // Sending query to server
     if(isset($_POST['saveChange'])) {

        $ISBN =   $_POST['ISBN'];
        $title =  $_POST['title'];
        $description =  $_POST['description'];
        $type =  $_POST['type'];
        $publish_date =  $_POST['publish_date'];
        $availability =  $_POST['availability'];
        $FK_publisher_ID =  $_POST['FK_publisher_ID'];
        $last_update = $_POST['last_update'];

       
        
        $query = "UPDATE media SET 
                  title= '$title',
                  description = '$description',
                  type = '$type',
                  publish_date = '$publish_date',
                  availability = '$availability',
                  FK_publisher_ID = '$FK_publisher_ID',
                  last_update = '$last_update'
                  WHERE ISBN = '$ISBN';" ; 

                  // last_update

        $updatedData = mysqli_query($conn,$query);
       
        if ($updatedData) {
            echo "Updated successfully";
        }

        else if (!$updatedData) {
          echo "ERROR! Try again";
        }
     }

    ?>

    <!--  End communicating with server -->

    <?php
      include 'components/scripts.php';
    ?>

  </body>
</html>