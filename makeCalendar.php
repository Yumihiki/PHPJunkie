echo '<tr>';

    // TODO: もう少しわかりやすい記述　
    if ($firstDayNumber > 1) {
      $loopCount = $firstDayNumber - 1;
      $loopStartNum = $lastMonthDays - $loopCount;
      for ($i=$loopStartNum; $i < $lastMonthDays; $i++) {
        echo "<td class='lastmonth'>$i</td>";  
      }
    }
    
    // 今月の表示
    $todayNumber = $firstDayNumber;
    for ($i=1; $i <= $thisMonthDays ; $i++) { 
      $td = "<td class='today'>$i</td>";
      // TODO: 各曜日のクラスをつける
      if ($todayNumber <= 5 ) {
        // ループ上での日付と今日が一致したら　todayクラスにて返す
        echo $i === $toDay ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $i === $toDay ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $i === $toDay ? $td : "<td class='sunday'>$i</td>";

        if ($i === $thisMonthDays) {
          "";
        } else {
          $todayNumber = 1;
        }
        
        echo '</tr>';
        echo '<tr>';
      }
    }
    // 次月の表示
    // 8をマイナスさせるのもわかりにくいのでは？ 7でマイナスとしたい
    $loopCount = 8 - $todayNumber;
      for ($i = 1; $i <= $loopCount; $i++) {
        echo "<td class='nextmonth'>$i</td>";
      }
      echo '</tr>';