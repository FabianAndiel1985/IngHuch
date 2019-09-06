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
    </div> <!-- End of main container -->
    
    <div class="container">

      <div id="FAQS_hor_line">
      <div id="FAQS_ver_line">
      <div id="FAQs">

        <h3 id="first_header_accordion"> <span class="FAQ_heading"> First Section </span> </h3> 
        <p id="first_paragraph_accordion">Hello</p>
        <h3 id="second_header_accordion"><span class="FAQ_heading"> First Section </span></h3>
        <p id="second_paragraph_accordion">Hello</p>
        <h3 id="third_header_accordion"><span class="FAQ_heading"> First Section </span></h3>
        <p id="third_paragraph_accordion">Hello</p>
        <h3 id="fourth_header_accordion"><span class="FAQ_heading"> First Section </span></h3>
        <p id="fourth_paragraph_accordion">Hello</p>
      </div>
    </div>
    </div>

  </div>

    <?php
      include 'components/footer.php';
    ?>
  


<?php
  include 'components/scripts.php';
?>

  
  </body>
</html>