<link rel="stylesheet" href="styles/css/w3schools.css">
<style>
	.w3-panel {
		margin-left:40px;
		margin-right:40px;
	}
	.w3-display-container{
		padding-top: 30px;
		padding-bottom: 30px;
	}
</style>
<div class="slideshow-container responsive-slideshow">
 <center>
  <div class="mySlides fade">

    <img class="w3-animate-top" src="pics/b.jpg" width="100%" height="500px"/>
    <div class="w3-panel w3-red w3-round-large">
	<center><h3><div class="text">Welcome</div><h3></center>
	</div>
  </div>
  
  <div class="mySlides fade">
 
    <img  class="w3-animate-zoom" src="pics/b1.jpg" width="100%" height="500px"/>
	<div class="w3-panel w3-red w3-round-large ">
    <center><h3><div class="text">B.A.E (Glass and Aluminum Supply)</div><h3></center>
	</div>
  </div>

  <div class="mySlides fade">
   
    <img class="w3-animate-zoom" src="pics/b2.jpg" width="100%" height="500px"/>
    <div class="w3-panel w3-red w3-round-large">
	<center><h3><div class="text">Ready to Serve</div></h3></center>
	</div>
 </div>
 </center>
<style type="text/css">
	.patch{
		margin-left: 4%;
		margin-right: 4%;
		margin-top: 60px;
		margin-bottom: 60px;
	}
</style>
 <div class="row patch">

	
	<!-- Location -->
	<center>
	<div class="col s4">
		<div class="w3-card-4 hoverable">
			<div class="w3-container w3-white">
				CONTACT
			</div>
			
			<h1><strong>B.A.E</strong></h1>
			
	<div class="w3-display-container w3-hover-opacity " style="width:50%">
			<img src="pics/call.png" alt="Avatar" style="width:100%">
		<div class="w3-display-middle w3-display-hover w3-xlarge">
			<button class="w3-button w3-black">471-2629 or 471-32-39</button>
		</div>
		
    </div>
	
		</div>
		
	</div>
	
	
	<!-- .Location -->
	
	<!-- Location -->
	

	<div class="col s4">
		<div class="w3-card-4 hoverable">
			<div class="w3-container w3-white">
				LOCATION
			</div>
			
			<h1><strong>B.A.E</strong></h1>
			
			<div class="w3-display-container w3-hover-opacity " style="width:50%">
    <img src="pics/location.png" alt="Avatar" style="width:100%">
    <div class="w3-display-middle w3-display-hover w3-xlarge">
      <button class="w3-button w3-black">Buhay na Tubig, Imus, Cavite</button>
    </div>
  </div>
			
		</div>
	</div>
	<!-- .Location -->
	
	<!-- Location -->
	<div class="col s4">
		<div class="w3-card-4 hoverable">
			<div class="w3-container w3-white">
				WEBSITE
			</div>
			
			<h1><strong>B.A.E</strong></h1>
			
			<div class="w3-display-container w3-hover-opacity " style="width:50%">
    <img src="pics/fb.png" alt="Avatar" style="width:100%">
    <div class="w3-display-middle w3-display-hover w3-xlarge">
      <button class="w3-button w3-black">https://www.facebook.com/BAE-Glass-and-Aluminum-Supply-288919257809840/</button>
    </div>
  </div>
			
		</div>
	</div>
	<!-- .Location -->
	
</div>
</div>		  
</div>
</div>

   
  <div class="section red lighten-1">
    <div class="row container">
    
	    <center>
	    	<h5 class="white-text header">
	    		<b>B.A.E (Glass and Aluminum Supply)</b>
	    	</h5>
	    </center>
	    	<p class="white-text">
	    		The local business firm, B.A.E Glass and Aluminum Supply, started in January 28, 1997. This Supply Store deals in 
				supplying simple fixtures such as sliding windows and doors, casements, magnetic and glass slides, etc. and steel works like gates, doors and grills, in Buhay na Tubig, Imus, Cavite.
			</p>
      
		<center>
			<h5 class="white-text"><b>SERVICE OFFERED:</b></h5>
			<ul>
            	<li class="grey-text text-lighten-3">
              			GLASS &#10004;
            	</li>
            	<li class="grey-text text-lighten-3">
            			ALUMINUM &#10004; 
            	</li>
            	<li class="grey-text text-lighten-3">
            			SUPPLY &#10004;
            	</li>
            </ul>
        </center>      
	
	</div>
  </div>
  <div class="parallax-container">
    <div class="parallax"><img src="pics/c2.jpg"></div>
  </div>
 
<footer class="page-footer red">
	<div class="container">
		
    </div>
    <div class="footer-copyright section">
		<div class="container">
			<b>B.A.E (Glass and Aluminum Supply) &reg;</b><br>
			Copyright <?php echo @date("Y"); ?><br>
			All rights reserved
        </div>
   	</div> 
</footer>
  
  
</div>
</center>

	<script type="text/javascript">
	$(document).ready(function(){
		$('.tap-target').tapTarget('open');
		$('#menu').hide();
		$("#nav").hide();
		$("#nav").slideDown();
	});
	$("#close").click(function(){
		$('.tap-target').tapTarget('close');
		$('#close').hide();
		$('#menu').show();
	});
	$("#menu").click(function(){
		$('.tap-target').tapTarget('open');
		$('#close').show();
		$('#menu').hide();

	});
	      
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
   var slides = document.getElementsByClassName("mySlides");
   for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none"; 
 }
   slideIndex++;
  if (slideIndex> slides.length) {slideIndex = 1} 
  slides[slideIndex-1].style.display = "block"; 
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}

 $(document).ready(function(){
      $('.parallax').parallax();
    });
	
 
 $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

 
</script>	