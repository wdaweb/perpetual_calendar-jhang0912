<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table style="text-align:center;" cellpadding="10" cellspacing="0">
        <tr>
            <td style='color:red;'>日</td>
            <td>一</td>
            <td>二</td>
            <td>三</td>
            <td>四</td>
            <td>五</td>
            <td style='color:red;'>六</td>
        </tr>

        <?php
        if (!isset($_GET['nextMonth']) && !isset($_GET['preMonth'])) {
            $thisMonth = date('m');
        } elseif (isset($_GET['nextMonth'])) {
            $thisMonth = $_GET['nextMonth'];
        } elseif (isset($_GET['preMonth'])) {
            $thisMonth = $_GET['preMonth'];
        }

        $thisMonthTrue = $thisMonth;
        $Year = strtotime("+0 year");
        $thisYear = date('Y', $Year);

    // 以下判斷式為將超過11或小於1的月份變數定位至正確的年份與月份
    // 例如當月份變數$thisMouth=13時，將年份轉變成2021，月份從13轉變成1
        if($thisMonth > 11) {
            $thisYear = $thisYear + floor(($thisMonth-1)/12);
            $thisMonth = $thisMonth - 12 * ($thisYear - date("Y"));
        }elseif($thisMonth<1){
            $thisYear=$thisYear - (floor($thisMonth/-12)+1);
            $thisMonth = $thisMonth + 12 * abs(($thisYear - date("Y")));
        }
        
        $firstDate = strtotime(date("$thisYear-$thisMonth-1"));
        echo $thisYear, "年", $thisMonth, "月1日是星期", $startDayWeek = date('w', $firstDate), "<br>";
        echo $thisYear, "年", $thisMonth, "月有", $thisMonthDay = date('t', $firstDate), "天";

        for ($i = 0; $i < 6; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 7; $j++) {
                if ($i == 0 && $j <= $startDayWeek) {
                    echo "<td>";
                    echo "&ensp;";
                    echo "</td>";
                } elseif (((7 * $i) + ($j - $startDayWeek)) > $thisMonthDay) {
                    break;
                } elseif ($j == 1 || $j == 7) {
                    echo "<td style='color:red;'>";
                    echo (7 * $i) + ($j - $startDayWeek);
                    echo "</td>";
                } else {
                    echo "<td>";
                    echo (7 * $i) + ($j - $startDayWeek);
                    echo "</td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    
    $nextMonth = ($thisMonthTrue + 1);
    $preMonth = ($thisMonthTrue - 1);
    echo "<a href='calendar.php?preMonth={$preMonth}''>上一個月</a>";
    echo "&emsp;";
    echo "<a href='calendar.php?nextMonth={$nextMonth}''>下一個月</a>"
    ?>
</body>

</html>

