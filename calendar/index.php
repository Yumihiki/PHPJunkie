<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Calendar</title>
  <link rel="stylesheet" href="calendar.css">
</head>
<body>

<?php

require_once 'calendar.php';

?>

<a href="<?= e('?YYYYM='.$m = $lastYearAndMonth) ?>">前月</a>
<a href="<?= e('?YYYYM='.$m = $nextYearAndMonth) ?>">来月</a>

<?= "<p>$dispThisYearAndMonth</p>"?>
  <table>
    <tr>
      <?php

      foreach ($weeks as $key => $value) {
          echo "<th class='$value'>$key</th>";
      }
      unset($value);

      ?>
    </tr>
  
    <?php

    if ($firstDayNumber === 1) {
      $weekDays = "月";
      require_once("makeCalendar.php");
    } elseif ($firstDayNumber === 2) {
      $weekDays = "火";
      require_once("makeCalendar.php");
    } elseif ($firstDayNumber === 3) {
      $weekDays = "水";
      require_once("makeCalendar.php");
    } elseif ($firstDayNumber === 4) {
      $weekDays = "木";
      require_once("makeCalendar.php");
    } elseif ($firstDayNumber === 5) {
      $weekDays = "金";
      require_once("makeCalendar.php");
    } elseif ($firstDayNumber === 6) {
      $weekDays = "土";
      require_once("makeCalendar.php");
    } elseif ($firstDayNumber === 7) {
      $weekDays = "日";
      require_once("makeCalendar.php");
    } 

    ?>

  </table>
  <?= "今日は" . "$echoToDay" . "です";  ?>

</body>
</html>