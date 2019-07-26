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
  $currentYear  = date(Y);
  $currentMonth = date(n);
  $currentDay   = date(j);
  $currentDay   = (int)$currentDay;

  // 今月の日数
  $currentMonthDays = date('t');

  echo $currentYear . '年';
  echo $currentMonth . '月';

?>
  <table>
    <tr>
      <?php
      $weeks = [
        '月' => 'monday',
        '火' => 'tuesday',
        '水' => 'wednesday',
        '木' => 'thursday',
        '金' => 'friday',
        '土' => 'saturday',
        '日' => 'sunday'
      ];
      foreach ($weeks as $key => $value) {
        echo "<th class" . "=$value>" .$key . "</th>";
      }
      unset($value);
      ?>
    </tr>
    <?php

  $firstDayNumber = date('w',mktime(0,0,0,$currentMonth,1,$currentYear));
  $firstDayNumber = (int)$firstDayNumber;
  if ($firstDayNumber === 1) {
    // TODO:前月の表示

    // 今月の表示
    echo '<tr>';
    $todayNumber = $firstDayNumber;
    for ($i=1; $i <= $currentMonthDays ; $i++) { 
      if ($todayNumber <= 5 ) {
        if ($i === $currentDay) {
          echo "<th class='currentday'>$i</th>";  
        } else {
          echo "<th>$i</th>";
        }
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        if ($i === $currentDay) {
          echo "<th class='currentday'>$i</th>";  
        } else {
          echo "<th class='saturday'>$i</th>";
        }
        $todayNumber++;
      } elseif ($todayNumber === 7) {
          if ($i === $currentDay) {
            echo "<th class='currentday'>$i</th>";  
          } else {
            echo "<th class='sunday'>$i</th>";
          }
        echo '</tr>';
        echo '<tr>';
        $todayNumber = 1;  
      }
    }
    // 次月の表示
    for ($i=1; $i<=$todayNumber; $i++) {
      echo "<th class='nextmonth'>$i</th>";
    }
    echo '</tr>';

  } elseif ($firstDayNumber === "2") {
    $weekDays = "火";
  } elseif ($firstDayNumber === "3") {
    $weekDays = "水";
  } elseif ($firstDayNumber === "4") {
    $weekDays = "木";
  } elseif ($firstDayNumber === "5") {
    $weekDays = "金";
  } elseif ($firstDayNumber === "6") {
    $weekDays = "土";
  } elseif ($firstDayNumber === "7") {
    $weekDays = "日";
  }

s  ?>

  </table>
  <?php

echo "今日は";
echo $currentMonth . '月';
echo $currentDay . '日';
echo "です";

?>
</body>
</html>