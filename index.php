<?php include "include/header.php" ?>
    <style>  
    footer{
      margin-top: 10px;
      margin-bottom: 100px;
    }
    footer h2 {
    text-align: center;
    font-weight: bolder;    
    font-size: xx-large;
    margin-bottom: -50px;
    }
  </style>
<!--ndpis-->
    <main>
      <div class="cmb row pt-5">
        <div class="col-lg-5 text-center">
          <img src="img/image2.png" class="img-fluid">
        </div>
        <div class="col-lg-2 nadpis1">
          <h1>Mačky</h1>
          <h3>A informácie o nich</h3>
        </div>
        <div class="col-lg-5 text-center">
          <img src="img/image1.png" class="img-fluid">
        </div>
      </div>
    </main>
<!--Slide show obrazkov-->
      <footer>
        <h2>Na tejto stránke sa dozviete:</h2>
        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/banner1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner4.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner5.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/banner6.png" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </footer>
<!--tlacidlo na navrat-->
<br>
<div class="home" id="home">
  <a href="#" id="scrollToTopBtn">
    <button class="btn btn-primary" style="position: fixed; bottom: 20px; left: 20px;">
      <i class="fa fa-arrow-up"></i> 
    </button>
  </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/style.js"></script>

  </body>
</html>
