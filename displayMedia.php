<?php
  require_once 'dbconnect.php';
?>

<?php
  include 'components/head.php';
?>



  <body>

    <div id="main" class="container">

      <?php
      include 'components/navbar.php';
      ?>
      
   

      <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">ISBN</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">type</th>
            <th scope="col">publish date</th>
            <th scope="col">availability</th>
            <th scope="col">publisher</th>
            <th scope="col">last updated</th>
          </tr>
        </thead>   

    <?php

       $query = "SELECT * FROM media";

       $retrievedData= mysqli_query($conn, $query);

       if (mysqli_num_rows($retrievedData)>0) {

          while($row = mysqli_fetch_assoc($retrievedData) ) {

            echo "<tbody> 
                    <th scope='row'>".$row['ISBN']."</th>
                    <td>".$row['title']."</td>
                    <td>".$row['description']."</td>
                    <td>".$row['type']."</td>
                    <td>".$row['publish_date']."</td>
                    <td>".$row['availability']."</td>
                    <td>".$row['FK_publisher_ID']."</td>
                    <td>".$row['last_update']."</td>
                    <td>
                      <a href='update.php?ISBN=".$row['ISBN']."'> 
                        <button> edit 
                        </button>
                      </a>
                    </td>
                    <td> 
                      <a href='delete.php?ISBN=".$row['ISBN']."'>
                      <button> delete 
                      </button>
                      </a>
                    </td>
                  </tr>
                  </tbody>";
          }

       }

    ?>

     </table> 


     </div> <!-- End of main container -->
   
<?php
  include 'components/footer.php';
?>



<?php
  include 'components/scripts.php';
?>

  
  </body>
</html>