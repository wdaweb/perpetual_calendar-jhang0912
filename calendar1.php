<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="calendar.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/calendar.ico" >
    <link href="https://fonts.googleapis.com/css2?family=Rufina&display=swap" rel="stylesheet">
    <title>CALENDAR</title>
  </head>
  <body >
<header>
  <div class="top-header container-fluid  text-white col-12 border-bottom border-warning">
    <div class="head-logo col col-7 pt-1">CALENDAR</div>
    <form class="form col col-5 " action="calendar1.php" method="$_POST">
      <div class="nav active font-weight-bold" href="#">─DATE SEARCH─</div>
      <div class="date input "><input  type="number" name="year" placeholder="Year" min="1970" ></div>
      <div class="date input " ><input  type="number" name="month" placeholder="Month" min="1" max="12"></div>
      <div class="date"><input type="submit" class="btn btn-outline-warning btn-sm" value="search"></div>
    </form>
  </div>
</header>
<article>
  <div class="article bg-dark d-flex">
    <div class="calendar col-4 p-0">
    <div class="warning-month bg-warning text-white text-center font-weight-bold">
        <h4>JANUARY</h4>
        <h1 class="months">01</h1>
      </div>
      <div class="years container-fluid text-white bg-warning">
        <h1 class="m-0">2020</h1>
      </div>
    </div>
    <div class="images col-8 ">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/236b16f4-a16a-4fa2-9a5a-cc4eda1481b3sm.jpg" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
      <h1>The Roses of Heliogabalus</h1>
    <p>132.1 x 213.9 cms | 52 x 84 ins<br>Oil on canvas</p>
  </div>
    </div>
    <div class="carousel-item">
      <img src="images/IMG_0939sm.jpg" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
      <h1>Hylas and the Nymphs</h1>
    <p>98 x 163 cms | 38 1/2 x 64 ins<br>Oil on canvas</p>
  </div>
    </div>
    <div class="carousel-item">
      <img src="images/Waterhouse,_John_William_-_Saint_Cecilia_-_1895sm.jpg" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
      <h1>Saint Cecilia</h1>
    <p>123.2 x 200.7 cms | 48 1/2 x 79 ins<br>Oil on canvas</p>
  </div>
    </div>
    <div class="carousel-item">
      <img src="images/John William Waterhouse - Ulysses and the Sirenssm.jpg" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
      <h1>Ulysses and the Sirens</h1>
    <p>100.6 cm × 202 cms | 39.6 in × 79.5 ins<br>Oil on canvas</p>
  </div>
    </div>
    <div class="carousel-item">
      <img src="images/John William Waterhousesm.jpg" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
      <h1>Flora and the Zephyrs</h1>
    <p>104.1 x 203.8 cms | 41 x 80 1/4 ins<br>Oil on canvas</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
    </div>
  </div>
</article>
<footer class="footer col-12 border-top border-warning d-flex pr-0 ">
  <div class="jhang col-10 text-white d-flex">2020 DESIGN BY
    <div class="yue text-danger">&ensp;JHANG YUE KAI</div>
  </div>
 <div class="artist col-2 text-white text-center">
    <h6 class="john text-center">ARTIST</h6>
    <p><img src="images/5e34470404fdef781ff2635db3cae05c.jpg"></p>
    <h5>John William Waterhouse</h5>
    <p class="william text-center">(April 6, 1849 - February 10, 1917) Painter of classical, historical, and literary subjects. John William Waterhouse was born in 1849 in Rome, where his father worked as a painter. He was referred to as "Nino" throughout his life. In the 1850s the family returned to England.</p>
  </div>
</footer>
<div class="jquery package">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</div>
  </body>
</html>