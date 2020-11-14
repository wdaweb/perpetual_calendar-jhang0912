<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/calendar.ico" >
    <link href="https://fonts.googleapis.com/css2?family=Rufina&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="calendar.css">
    <title>CALENDAR</title>
  </head>
  <body class="d-flex flex-column" >
<?php
  if(!isset($_GET['nextMonth']) && !isset($_GET['preMonth'])) {
  $thisMonth = date('m');
  } elseif (isset($_GET['nextMonth'])) {
  $thisMonth = $_GET['nextMonth'];
  } elseif (isset($_GET['preMonth'])) {
  $thisMonth = $_GET['preMonth'];
  }
  
  $thisMonthTrue = $thisMonth;
  $Year = strtotime("+0 year");
  $thisYear = date('Y', $Year);

  if(isset($_GET['year']) && isset($_GET['month'])){
  $thisYear=$_GET['year'];
  $thisMonth=$_GET['month'];
  $thisMonthTrue=((12*($thisYear-date("Y")))+$thisMonth);
  }elseif($thisMonth > 11) {
  $thisYear = $thisYear + floor(($thisMonth-1)/12);
  $thisMonth = $thisMonth - 12 * ($thisYear - date("Y"));
  }elseif($thisMonth<1){
  $thisYear=$thisYear - (floor($thisMonth/-12)+1);
  $thisMonth = $thisMonth + 12 * abs(($thisYear - date("Y")));
  }
  
  $firstDate = strtotime(date("$thisYear-$thisMonth-1"));
  
  $startDayWeek = date('w', $firstDate);
  $thisMonthDay = date('t', $firstDate);

?>
<header class="container-fluid  p-0  ">
  <div class="top-header container text-white col-12 border-bottom border-warning p-0 ">
    <div class="head-logo col-md-12 col-lg-7 ">CALENDAR</div>
    <form class="form col-md-12 col-lg-5 d-flex justify-content-center align-items-center" action="index.php" method="$_GET">
      <div class="search font-weight-bold col-6 text-center">─DATE SEARCH─</div>
      <div class="date input col-2 mr-1"><input  type="number" name="year" placeholder="Year" min="1970" required ></div>
      <div class="date input col-2 mr-1" ><input  type="number" name="month" placeholder="Month" min="1" max="12" required></div>
      <div class="date col-2 mr-1"><input type="submit" class="btn btn-outline-warning btn-sm" value="search"></div>
    </form>
  </div>
</header>
<article class="container-fluid  d-flex p-0">
  <div class="left col-4 p-0">
    <div class="date container col-12 bg-warning p-0 d-flex flex-wrap">
      <div class="year col-sm-12 col-md-6 col-lg-6 text-center font-weight-bold ">YEAR</div>
      <div class="year2 col-sm-12 col-md-6 col-lg-6 text-center"><?=date('Y',$firstDate);?></div>
      <div class="month col-sm-12 col-md-6 col-lg-6 text-warning  text-center font-weight-bold"><?=date('F',$firstDate);?></div>
      <div class="month2 col-sm-12 col-md-6 col-lg-6 text-warning  text-center"><?=date('n',$firstDate);?></div>
    </div>
    <div class="under col-12">
    <table class="table text-center text-white table-borderless m-0">
    <?php
        $nextMonth = ($thisMonthTrue + 1);
        $preMonth = ($thisMonthTrue - 1);    
        echo"<tr>";
        echo"<td><a href='index.php?preMonth={$preMonth}' class=' btn btn-lg btn-outline-light text-decoration-none '>LAST</a></td>";
        echo"<td>&ensp;</td>";
        echo"<td>&ensp;</td>";
        echo"<td>&ensp;</td>";
        echo"<td>&ensp;</td>";
        echo"<td>&ensp;</td>";
        echo"<td><a href='index.php?nextMonth={$nextMonth}'class='btn btn-lg btn-outline-light text-decoration-none
        '>NEXT</a></td>";
        echo"</tr>";
    ?>
    </table>
</div>

<div class="calendar col-12">
    <table class="table text-center text-white table-borderless m-0">
        <tr>
            <th class="text-danger border-bottom font-weight-bold  ">SUN</th>
            <th class="border-bottom font-weight-bold  ">MON</th>
            <th class="border-bottom font-weight-bold  ">TUE</th>
            <th class="border-bottom font-weight-bold  ">WED</th>
            <th class="border-bottom font-weight-bold  ">THU</th>
            <th class="border-bottom font-weight-bold  ">FRI</th>
            <th class="text-danger border-bottom font-weight-bold  ">SAT</th>
        </tr>
        <tbody>
        <?php

              for ($i = 0; $i < 6; $i++) {
                  echo "<tr>";
                  for ($j = 1; $j <= 7; $j++) {
                      if ($i == 0 && $j <= $startDayWeek) {
                          echo "<td>";
                          echo "&ensp;";
                          echo "</td>";
                      } elseif (((7 * $i) + ($j - $startDayWeek)) > $thisMonthDay) {
                        echo "<td>";
                        echo "&ensp;";
                        echo "</td>";
                      } elseif ($j == 1 || $j == 7) {
                          echo "<td class='text-danger  font-weight-light' style='padding:2.5rem 0px 0px 0px;'>";
                          echo (7 * $i) + ($j - $startDayWeek);
                          echo "</td>";
                      } else {
                          echo "<td class=' font-weight-light' style='padding:2.5rem 0px 0px 0px;'>";
                          echo (7 * $i) + ($j - $startDayWeek);
                          echo "</td>";
                      }
                  }
                  echo "</tr>";
              }
        ?>
        </tbody>
            </table>
</div>
  </div>
<div class="right col col-sm-12 col-md-8 col-lg-8  p-0">
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
      <img src="images//IMG_0939sm.jpg" class="d-block w-100">
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

</article>
<footer class="footer col-12 border-top border-warning d-flex p-0 ">
  <div class="jhang col-10 text-white d-flex ">2020 DESIGN BY
    <div class="yue text-danger">&ensp;JHANG YUE KAI</div>
  </div>
  <div class="artist col-2 text-white text-center d-flex flex-column align-items-center">
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