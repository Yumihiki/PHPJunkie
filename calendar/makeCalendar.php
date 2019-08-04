<?php

  echo '<tr>';

  // 前月の取得　
  if ($firstDayNumber > 1) {
    $loopNumberOfTimes = $firstDayNumber - 2;
    $loopStartDay = $lastMonthDays - $loopNumberOfTimes;
    for ($i=$loopStartDay; $i <= $lastMonthDays; $i++) {
      echo "<td class='lastmonth'>$i</td>";  
    }
  } 

  // 今月の取得
  $todayNumber = $firstDayNumber;

  for ($i=1; $i <= $thisMonthDays ; $i++) { 
    $td = "<td class='today'>$i</td>";
    // TODO: 各曜日のクラスをつける
    if ($todayNumber <= 5 ) {
      // ループ上での日付と今日が一致したら　todayクラスにて返す
      echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td>$i</td>";
      $todayNumber++;
    } elseif ($todayNumber === 6) {
      echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='saturday'>$i</td>";
      $todayNumber++;
    } elseif ($todayNumber === 7) {
      echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='sunday'>$i</td>";

      if ($i !== $thisMonthDays) {
        $todayNumber = 1;
      }
      echo '</tr>';
      echo '<tr>';
    }
  }

  // 次月の取得
  $loopNumberOfTimes = 8 - $todayNumber;
  for ($i = 1; $i <= $loopNumberOfTimes; $i++) {
    echo "<td class='nextmonth'>$i</td>";
  }

  echo '</tr>';
