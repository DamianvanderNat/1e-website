<?php

function home()
{

  return "
    <div class='slideshow-container'>
    <div class='slideshow '>
    <img class='slideshow-img'src='content/gallery/milkshakeotw.png'>
  </div>     
    <div class='slideshow'>
      <img class='slideshow-img'src='content/gallery/banana_milkshake.jpg'>
    </div>

    <div class='slideshow '>
      <img class='slideshow-img'src='content/gallery/pumpkinmilkshake.jpg'>
    </div>
 
    <div class='slideshow '>
      <img class='slideshow-img'src='content/gallery/oreomilkshake.jpg'>
    </div> 

    <div class='slideshow '>
      <img class='slideshow-img'src='content/gallery/lotusmikshake.jpg'>
    </div>

    <div class='slideshow '>
      <img class='slideshow-img'src='content/gallery/mermaidmilkshake.jpg'>
    </div>  

    <div class='slideshow '>
      <img class='slideshow-img'src='content/gallery/chocolademilkshake.jpg'>
    </div>

      <div class='slideshow '>
        <img class='slideshow-img'src='content/gallery/blackberryblast.jpg'>
   
      </div>
    </div>
    <br>
    <div style=\"text-align:center\">
  <span class=\"dot\"></span> 
  <span class=\"dot\"></span> 
  <span class=\"dot\"></span>
  <span class=\"dot\"></span> 
  <span class=\"dot\"></span> 
  <span class=\"dot\"></span> 
  <span class=\"dot\"></span> 
  <span class=\"dot\"></span> 
</div>
<div class='home-page-body'>
        <div class='home-text'>Taste our love.</div>
        <p class='footer-home-text'>
        Welcome to CreamyBliss, where we blend happiness in every sip!

        Indulge in our creamy, dreamy milkshakes made with love and the finest ingredients.
        
        Why choose CreamyBliss for your milkshake fix?
        
        Irresistible Flavors: From classic chocolate and vanilla to exotic fruit blends, we have a flavor for every craving.<br>
        Quality Ingredients: We use only the freshest milk, premium ice cream, and hand-picked fruits to ensure a delightful experience with every sip.<br>
        Visit us today and experience the joy of sipping on happiness!
    </p>

    </div>
    <footer class='footer'>contact us! phone: 1-800-creamy Email: CreamyBliss@placeholder.com</footer>
</div>
    <script>
    let slideIndex = 0;
    showSlides();
    
    function showSlides() {
      let i;
      let slides = document.getElementsByClassName(\"slideshow\");
      let dots = document.getElementsByClassName(\"dot\");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = \"none\";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(\" active\", \"\");
      }
      slides[slideIndex-1].style.display = \"block\";  
      dots[slideIndex-1].className += \" active\";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>";



}


?>