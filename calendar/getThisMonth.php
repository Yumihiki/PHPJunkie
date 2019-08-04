<?php

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

    
?>
