<?php
  require_once 'dbconnect.php'; 

  if(isset($_POST['submitBtn'])) {
    // echo "lalala";
  
    $ISBN = NULL;
    $title = $_POST['title'];  
    $description = $_POST['description'];  
    $type = $_POST['type'];  
    $publish_date = $_POST['publish_date'];  
    $availability = $_POST['availability'];  
    $FK_publisher_ID = $_POST['FK_publisher_ID'];
    $last_update = $_POST['last_update'];   

    $query = "INSERT INTO media (ISBN, title, description,type,publish_date,availability,FK_publisher_ID,last_update) VALUES ('$ISBN', '$title', '$description', '$type', '$publish_date', '$availability', $FK_publisher_ID, '$last_update')";


    $enteredData = mysqli_query($conn,$query);

    if ($enteredData) {
      echo "new record created";
    }

    else {
      echo " didnt work, try again";
    }

    mysqli_close($conn);

  }

?>

<?php
  include 'components/head.php';
?>

  <body>
    
    <div class="container">
      <?php
        include 'components/navbar.php';
      ?>
    </div>


    <div class="container mt-5">

      <form action="insertForm.php" method="post">
        
        <div class="form-group">
          <label for="ISBN" class="d-none">ISBN</label>
          <input type="text" class="form-control d-none" name="ISBN" id="ISBN" placeholder="ISBN input">
        </div>

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="title input">
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="description input">
        </div>
    
        <div class="form-group">
          <label for="type">type</label>
          <select class="form-control" name="type">
            <option value= "NULL" >Please select type</option>
            <option value="DVD">DVD</option>
            <option value="CD">CD</option>
            <option value="BOOK">BOOK</option>
          </select>
        </div>

        <div class="form-group">
          <label for="publish_date">Publish Date</label>
          <input type="text" class="form-control" id="publish_date" name="publish_date" placeholder="publish_date input">
        </div>

         <div class="form-group">
          <label for="availability">Availability</label>
          <select class="form-control" name="availability">
            <option value= "NULL">Please select availability</option>
            <option value="available">available</option>
            <option value="reserved">reserved</option>
          </select>
        </div>

        <div class="form-group">
          <label for="FK_publisher_ID">Another label</label>
          <input type="text" class="form-control" id="FK_publisher_ID" name="FK_publisher_ID" placeholder="FK_publisher_ID input">
        </div>

        <div class="form-group">
          <label for="last_update">Last Update</label>
          <input type="text" class="form-control" id="last_update" name="last_update" placeholder="" readonly>
        </div>

        <button type="submit" class="btn btn-primary" name="submitBtn">Submit</button>

      </form>

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
  include 'components/scripts.php';
  ?>
    

  </body>
</html>