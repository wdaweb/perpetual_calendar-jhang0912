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
  <body >
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
<header class="container-fluid  p-0">
  <div class="top-header container text-white col-12 border-bottom border-warning p-0 ">
    <div class="head-logo col-md-12 col-lg-7 ">CALENDAR</div>
    <form class="form col-md-12 col-lg-5 d-flex justify-content-center align-items-center flex-wrap-nowrap" action="calendar.php" method="$_GET">
      <div class="search font-weight-bold col-6 text-center">─DATE SEARCH─</div>
      <div class="date input col-2"><input  type="number" name="year" placeholder="Year" min="1970" required ></div>
      <div class="date input col-2" ><input  type="number" name="month" placeholder="Month" min="1" max="12" required></div>
      <div class="date col-2"><input type="submit" class="btn btn-outline-warning btn-sm" value="search"></div>
    </form>
  </div>
</header>
<article class="container-fluid bg-dark d-flex p-0">
  <div class="left container col col-4 p-0 ">
    <div class="date container col-12 bg-warning p-0 d-flex flex-wrap">
      <div class="year col-sm-12 col-md-6 col-lg-6 w-100 text-white text-center font-weight-bold">YEAR</div>
      <div class="year2 col-sm-12 col-md-6 col-lg-6 w-100 text-white text-center"><?=date('Y',$firstDate);?></div>
      <div class="month col-sm-12 col-md-6 col-lg-6 w-100 text-white text-center font-weight-bold"><?=date('F',$firstDate);?></div>
      <div class="month2 col-sm-12 col-md-6 col-lg-6 w-100 text-white text-center"><?=date('n',$firstDate);?></div>
    </div>
    <div class="calendar col-12">
    <table class="table text-center text-white table-borderless m-0">
        <tr>
            <th class="text-danger border-bottom font-weight-bold h3 pb-3">SUN</th>
            <th class="border-bottom font-weight-bold h3 pb-3">MON</th>
            <th class="border-bottom font-weight-bold h3 pb-3">TUE</th>
            <th class="border-bottom font-weight-bold h3 pb-3">WED</th>
            <th class="border-bottom font-weight-bold h3 pb-3">THU</th>
            <th class="border-bottom font-weight-bold h3 pb-3">FRI</th>
            <th class="text-danger border-bottom font-weight-bold h3 pb-3">SAT</th>
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
                          echo "<td class='text-danger h5 font-weight-light pt-4'>";
                          echo (7 * $i) + ($j - $startDayWeek);
                          echo "</td>";
                      } else {
                          echo "<td class='h5 font-weight-light  pt-4'>";
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
    <div class="under col-12">
    <table class="table text-center text-white table-borderless m-0">
    <?php
        $nextMonth = ($thisMonthTrue + 1);
        $preMonth = ($thisMonthTrue - 1);    
        echo"<tr class='border-top'>";
        echo"<td><a href='calendar.php?preMonth={$preMonth}' class='text-decoration-none text-white'>LAST</a></td>";
        echo"<td>&ensp;</td>";
        echo"<td>&ensp;</td>";
        echo"<td>&ensp;</td>";
        echo"<td>&ensp;</td>";
        echo"<td>&ensp;</td>";
        echo"<td><a href='calendar.php?nextMonth={$nextMonth}'class='text-decoration-none text-white'>NEXT</a></td>";
        echo"</tr>";
    ?>
    </table>

    </div>
  </div>
  <div class="right col col-8 bg-danger">
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