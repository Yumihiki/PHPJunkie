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

<a href="<?= e('?YYYYM='.$lastYearAndMonth) ?>">前月</a>
<a href="<?= e('?YYYYM='.$nextYearAndMonth) ?>">来月</a>

<?= "<p>" . $year . "年" . $month . "月" . "</p>"?>
  <table>
    <tr>
      <?php
      foreach ($weeks as $jaDayOfWeek => $enDayOfWeek) {
          echo "<th class='$enDayOfWeek'>$jaDayOfWeek</th>";
      }
      ?>
    </tr>
  
    <?php
    require_once 'makeCalendar.php';
    ?>

  </table>
  <?= $now->format('今日はY年n月j日です');  ?>

</body>
</html>