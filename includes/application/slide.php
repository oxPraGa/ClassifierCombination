<!----------------------------------->
<div class="slideshow-container">

<div class="myS f">
  <div class="nt">1 / 3</div>
  <img src="bdd/bdd1/1.bmp" class="img-responsive" style="width:auto">
  <div class="t">Caption Text</div>
</div>

<div class="myS f">
  <div class="nt">2 / 3</div>
  <img src="bdd/bdd1/2.bmp" style="width:auto;">
  <div class="t">Caption Two</div>
</div>

<div class="myS f">
  <div class="nt">3 / 3</div>
  <img src="bdd/bdd1/3.bmp" style="width:auto">
  <div class="t">Caption Three</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("myS");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length} ;
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>