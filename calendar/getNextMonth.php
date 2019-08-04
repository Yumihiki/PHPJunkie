<?php

/// 8をマイナスさせるのもわかりにくいのでは？ 7でマイナスとしたい
$loopNumberOfTimes = 8 - $todayNumber;
for ($i = 1; $i <= $loopNumberOfTimes; $i++) {
  echo "<td class='nextmonth'>$i</td>";
}

?>