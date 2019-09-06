
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

      table,th, td {
        border: 1px solid black;
      }

      #deleteForm {
        margin-top: 10px;
        margin-bottom: 10px;
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

        $ISBN = $_GET['ISBN'];

        $query = "SELECT * FROM media WHERE ISBN = $ISBN";

        $retrievedDeleteData = mysqli_query($conn,$query);

        $retrievedDeleteDataArray = mysqli_fetch_array($retrievedDeleteData,MYSQLI_ASSOC);

        // echo $retrievedDeleteDataArray['title'];

        $ISBN =   $retrievedDeleteDataArray['ISBN'];
        $title =  $retrievedDeleteDataArray['title'];
        $description =  $retrievedDeleteDataArray['description'];
        $type =  $retrievedDeleteDataArray['type'];
        $publish_date =  $retrievedDeleteDataArray['publish_date'];
        $availability =  $retrievedDeleteDataArray['availability'];
        $FK_publisher_ID =  $retrievedDeleteDataArray['FK_publisher_ID'];
       
      ?>
     

      <h1> Do you really want to delete following row: </h1>


      <table>

      <tr>
        <th>ISBN</th>
        <th>title</th> 
        <th>description</th>
        <th>type</th>
        <th>publish date</th>
        <th>availability</th>
        <th>publisher</th>
      </tr>


      <?php

       echo "<tr> 
                    <td>".$ISBN."</td>
                    <td>".$title."</td>
                    <td>".$description."</td>
                    <td>".$type."</td>
                    <td>".$publish_date."</td>
                    <td>".$availability."</td>
                    <td>".$FK_publisher_ID."</td>
                    
                  </tr>"
                  ;


                  ?>

      </table>


      <form action="delete.php" method="post" id="deleteForm">
        <input type="hidden" name= "id" value="<?php echo $ISBN;?>"/>
        <button type="submit" name="deleteBtn" class="btn btn-primary">delete</button>
      </form>
      
      <a href ='displayMedia.php'><button  class="btn btn-secondary" id="backBtn"> Back </button></a>

    </div>


    <?php

       if($_POST)
       {
        // echo "Hallo";

        $id = $_POST['id'];

        $query = "DELETE FROM media WHERE ISBN = {$id}";

        if (mysqli_query($conn, $query))
        {
          echo "success";
        }

        else {
          echo "try again";
        }

    }


    ?>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>