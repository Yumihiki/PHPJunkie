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

require_once("makeCalendar.php");

?>

<a href="<?= '?YYYYM=' .$m = $lastYearAndMonth ?>">前月</a>
<a href="<?= '?YYYYM=' .$m = $nextYearAndMonth ?>">来月</a>

<?php
  echo $thisYear . '年';
  echo $thisMonth . '月';
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
        echo "<th class='$value'>$key</th>";
      }
      unset($value);
      ?>
    </tr>
    <?php

  if ($firstDayNumber === 1) {
    echo '<tr>';

    // 前月の取得　
    if ($firstDayNumber > 1) {
      $loopNumberOfTimes = $firstDayNumber - 2;
      $loopStartDay = $lastMonthDays - $loopNumberOfTimes;
      for ($i=$loopStartDay; $i <= $lastMonthDays; $i++) {
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
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td>$i</td>";
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        // ここのループ1回目で、当日と判定されて黄色になっています
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='sunday'>$i</td>";

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
    $loopNumberOfTimes = 8 - $todayNumber;
      for ($i = 1; $i <= $loopNumberOfTimes; $i++) {
        echo "<td class='nextmonth'>$i</td>";
      }
      echo '</tr>';
  } elseif ($firstDayNumber === 2) {
    $weekDays = "火";
    echo '<tr>';

    // 前月の取得　
    if ($firstDayNumber > 1) {
      $loopNumberOfTimes = $firstDayNumber - 2;
      $loopStartDay = $lastMonthDays - $loopNumberOfTimes;
      for ($i=$loopStartDay; $i <= $lastMonthDays; $i++) {
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
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='sunday'>$i</td>";

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
    $loopNumberOfTimes = 8 - $todayNumber;
      for ($i = 1; $i <= $loopNumberOfTimes; $i++) {
        echo "<td class='nextmonth'>$i</td>";
      }
      echo '</tr>';
  } elseif ($firstDayNumber === 3) {
    $weekDays = "水";
    echo '<tr>';

    // 前月の取得　
    if ($firstDayNumber > 1) {
      $loopNumberOfTimes = $firstDayNumber - 2;
      $loopStartDay = $lastMonthDays - $loopNumberOfTimes;
      for ($i=$loopStartDay; $i <= $lastMonthDays; $i++) {
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
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='sunday'>$i</td>";

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
    $loopNumberOfTimes = 8 - $todayNumber;
      for ($i = 1; $i <= $loopNumberOfTimes; $i++) {
        echo "<td class='nextmonth'>$i</td>";
      }
      echo '</tr>';
  } elseif ($firstDayNumber === 4) {
    // #############################
    $weekDays = "木";
    // #############################
    echo '<tr>';

    // 前月の取得　
    if ($firstDayNumber > 1) {
      $loopNumberOfTimes = $firstDayNumber - 2;
      $loopStartDay = $lastMonthDays - $loopNumberOfTimes;
      for ($i=$loopStartDay; $i <= $lastMonthDays; $i++) {
        echo "<td class='lastmonth'>$i</td>";  
      }
    }
    
    // 今月の表示
    $todayNumber = $firstDayNumber;
    for ($i=1; $i <= $thisMonthDays ; $i++) { 
      $td = "<td class='today'>$i</td>";
      // TODO: 各曜日のクラスをつける
      if ($todayNumber <= 5 ) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td>$i</td>";
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
      } elseif ($todayNumber === 7) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='sunday'>$i</td>";

        $todayNumber = $i === $thisMonthDays ? '': $todayNumber = 1;
        
        echo '</tr>';
        echo '<tr>';
      }
    }
    // 次月の表示
    $loopNumberOfTimes = 8 - $todayNumber;
      for ($i = 1; $i <= $loopNumberOfTimes; $i++) {
        echo "<td class='nextmonth'>$i</td>";
      }
      echo '</tr>';
  } elseif ($firstDayNumber === 5) {
    $weekDays = "金";
    echo '<tr>';

    // 前月の取得　
    if ($firstDayNumber > 1) {
      $loopNumberOfTimes = $firstDayNumber - 2;
      $loopStartDay = $lastMonthDays - $loopNumberOfTimes;
      for ($i=$loopStartDay; $i <= $lastMonthDays; $i++) {
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
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='sunday'>$i</td>";

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
    $loopNumberOfTimes = 8 - $todayNumber;
      for ($i = 1; $i <= $loopNumberOfTimes; $i++) {
        echo "<td class='nextmonth'>$i</td>";
      }
      echo '</tr>';
  } elseif ($firstDayNumber === 6) {
    $weekDays = "土";
    echo '<tr>';

    // 前月の取得　
    if ($firstDayNumber > 1) {
      $loopNumberOfTimes = $firstDayNumber - 2;
      $loopStartDay = $lastMonthDays - $loopNumberOfTimes;
      for ($i=$loopStartDay; $i <= $lastMonthDays; $i++) {
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
        // echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td>$i</td>";
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td>$i</td>";
        
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='sunday'>$i</td>";

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
    $loopNumberOfTimes = 8 - $todayNumber;
      for ($i = 1; $i <= $loopNumberOfTimes; $i++) {
        echo "<td class='nextmonth'>$i</td>";
      }
      echo '</tr>';
  } elseif ($firstDayNumber === 7) {
    $weekDays = "日";
    echo '<tr>';

    // 前月の取得　
    if ($firstDayNumber > 1) {
      $loopNumberOfTimes = $firstDayNumber - 2;
      $loopStartDay = $lastMonthDays - $loopNumberOfTimes;
      for ($i=$loopStartDay; $i <= $lastMonthDays; $i++) {
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
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $thisYearAndMonthYm . $i === $toDay ? $td : "<td class='sunday'>$i</td>";

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
    $loopNumberOfTimes = 8 - $todayNumber;
      for ($i = 1; $i <= $loopNumberOfTimes; $i++) {
        echo "<td class='nextmonth'>$i</td>";
      }
      echo '</tr>';
  }

  ?>

  </table>
  <?php

echo "今日は";
echo $echoToDay;
echo "です";

?>

</body>
</html>