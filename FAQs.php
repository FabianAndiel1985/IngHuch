<?php
  	include 'components/head.php';
?>


      
<body>

	<div class="container">

	<?php
    include 'components/navbar.php';
	?>

	</div>


	<div class="container">
		<div id="FAQS_hor_line">
			<div id="FAQS_ver_line">
				<div id="FAQs">

					<h3 id="first_header_accordion"> <span> First Section </span> </h3> 
					<p id="first_paragraph_accordion">Hello</p>
					<h3 id="second_header_accordion">Second Section</h3>
					<p id="second_paragraph_accordion">Hello</p>
					<h3 id="third_header_accordion">Third Section</h3>
					<p id="third_paragraph_accordion">Hello</p>
					<h3 id="fourth_header_accordion">Fourth Section</h3>
					<p id="fourth_paragraph_accordion">Hello</p>
				</div>
			</div>
		</div>
	</div>

<!-- 1.Question First try didn't work-->

	<!-- <div  class="footer">
      <div class="container">

      <nav id="FAQs_footer_navbar" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="FAQs_footer_inner">
          <div id="special3">
             <p style="display:inline;" class=""> Hallo hier bin ich </p> 
          </div>
        </div>
      </nav> 
           
      </div>
    </div>
 -->
<!-- 2.Question Why doesn`t this work -->

	<?php
  		include 'components/footer.php';
	?>

		
	<?php
  		include 'components/scripts.php';
	?>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">

		$( document ).ready(function() {

			$("p:not(#first_paragraph_accordion)").hide();

			$("h3").click(function() { 
				$(this).next().slideToggle();	
			});

		});
		

	</script>

</body>
</html>