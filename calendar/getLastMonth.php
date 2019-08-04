<?php

// 前月の取得　
if ($firstDayNumber > 1) {
  $loopNumberOfTimes = $firstDayNumber - 2;
  $loopStartDay = $lastMonthDays - $loopNumberOfTimes;
  for ($i=$loopStartDay; $i <= $lastMonthDays; $i++) {
    echo "<td class='lastmonth'>$i</td>";  
  }
}

?>