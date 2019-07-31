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

$date = '';

if (!empty($_GET['m'])) {
  $date = $_GET["date"] . "01";
  $thisMonth = $_GET["date"] . "01";
  $explode = explode("_", $_GET["m"]);
  $thisYear = $explode[0];
  $thisMonth = $explode[1];
} else {
  $thisYear  = (int)date("Y");
  $thisMonth = (int)date(n);
  $toDayCheck   = date('Ymj');
}

$t = date("t", $date);
$y = date("Y", $date);
$m = date("m", $date);

// date
// d 二桁の数字 0有り
// j 日数 0無し
// 

  // $thisYear  = (int)date("Y");
  // $thisYear  = 2019;
  // $thisMonth = (int)date(n);
  // $thisMonth = 5;
  $lastMonth = date('n',mktime(0,0,0,$thisMonth-1,1,$thisYear)); 
  $thisMonth = date('n',mktime(0,0,0,$thisMonth,1,$thisYear)); 
  $nextMonth = date('n',mktime(0,0,0,$thisMonth+1,1,$thisYear)); 
  $toDay   = date('Ymj');
  $echoToDay   = date('Y年n月j日');
  $toDay   = (int)$toDay;
  $toDayj = date('j');

  $toYearToMonth = date('Ym');

  // 今月の日数 可変にする必要あり
  // $thisMonthDays = date('t');
  $lastMonthDays = date('t',mktime(0,0,0,$thisMonth-1,1,$thisYear));
  $thisMonthDays = date('t',mktime(0,0,0,$thisMonth,1,$thisYear));
  $nextMonthDays = date('t',mktime(0,0,0,$thisMonth+1,1,$thisYear));
    
  // 年月を可変にする
  // 例えば2019年1月を与えた場合、前年前月、つまり2018年1月を取得するような
  $lastYearAndMonth = date('Y_n',mktime(0,0,0,$thisMonth-1,1,$thisYear));
  $thisYearAndMonth = date('Y_n',mktime(0,0,0,$thisMonth,1,$thisYear));
  $thisYearAndMonthYmj = date('Ymj',mktime(0,0,0,$thisMonth,$toDayj,$thisYear));
  $nextYearAndMonth = date('Y_n',mktime(0,0,0,$thisMonth+1,1,$thisYear));


  echo $toYearToMonth;
  echo ' ';
  echo $thisYearAndMonthYmj;

?>

<a href="<?= '?m=' .$m = $lastYearAndMonth ?>">前月</a>
<a href="<?= '?m=' .$m = $nextYearAndMonth ?>">来月</a>

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
        echo "<th class" . "=$value>" .$key . "</th>";
      }
      unset($value);
      ?>
    </tr>
    <?php

  $firstDayNumber = date('N',mktime(0,0,0,$thisMonth,1,$thisYear));
  $firstDayNumber = (int)$firstDayNumber;
  if ($firstDayNumber === 1) {
    echo '<tr>';

    // TODO: もう少しわかりやすい記述　
    if ($firstDayNumber > 1) {
      $loopCount = $firstDayNumber - 2;
      $loopStartNum = $lastMonthDays - $loopCount;
      for ($i=$loopStartNum; $i <= $lastMonthDays; $i++) {
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
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td>$i</td>";
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='sunday'>$i</td>";

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
  } elseif ($firstDayNumber === 2) {
    $weekDays = "火";
    echo '<tr>';

    // TODO: もう少しわかりやすい記述　
    if ($firstDayNumber > 1) {
      $loopCount = $firstDayNumber - 2;
      $loopStartNum = $lastMonthDays - $loopCount;
      for ($i=$loopStartNum; $i <= $lastMonthDays; $i++) {
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
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='sunday'>$i</td>";

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
  } elseif ($firstDayNumber === 3) {
    $weekDays = "水";
    echo '<tr>';

    // TODO: もう少しわかりやすい記述　
    if ($firstDayNumber > 1) {
      $loopCount = $firstDayNumber - 2;
      $loopStartNum = $lastMonthDays - $loopCount;
      for ($i=$loopStartNum; $i <= $lastMonthDays; $i++) {
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
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='sunday'>$i</td>";

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
  } elseif ($firstDayNumber === 4) {
    $weekDays = "木";
    echo '<tr>';

    // TODO: もう少しわかりやすい記述　
    if ($firstDayNumber > 1) {
      $loopCount = $firstDayNumber - 2;
      $loopStartNum = $lastMonthDays - $loopCount;
      for ($i=$loopStartNum; $i <= $lastMonthDays; $i++) {
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
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='sunday'>$i</td>";

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
  } elseif ($firstDayNumber === 5) {
    $weekDays = "金";
    echo '<tr>';

    // TODO: もう少しわかりやすい記述　
    if ($firstDayNumber > 1) {
      $loopCount = $firstDayNumber - 2;
      $loopStartNum = $lastMonthDays - $loopCount;
      for ($i=$loopStartNum; $i <= $lastMonthDays; $i++) {
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
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='sunday'>$i</td>";

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
  } elseif ($firstDayNumber === 6) {
    $weekDays = "土";
    echo '<tr>';

    // TODO: もう少しわかりやすい記述　
    if ($firstDayNumber > 1) {
      $loopCount = $firstDayNumber - 2;
      $loopStartNum = $lastMonthDays - $loopCount;
      for ($i=$loopStartNum; $i <= $lastMonthDays; $i++) {
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
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='sunday'>$i</td>";

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
  } elseif ($firstDayNumber === 7) {
    $weekDays = "日";
    echo '<tr>';

    // TODO: もう少しわかりやすい記述　
    if ($firstDayNumber > 1) {
      $loopCount = $firstDayNumber - 2;
      $loopStartNum = $lastMonthDays - $loopCount;
      for ($i=$loopStartNum; $i <= $lastMonthDays; $i++) {
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
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td>$i</td>";
        // 今日が今月の日数（最終日）と合致したら数字を返さない、合致しなければ曜日番号を追加
        // $toDay === $thisMonthDays ? $todayNumber = 0 :  $todayNumber++;;
        $todayNumber++;
      } elseif ($todayNumber === 6) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='saturday'>$i</td>";
        $todayNumber++;
        // $toDay === $thisMonthDays ? $todayNumber = 7 - $todayNumber :  $todayNumber++;;
      } elseif ($todayNumber === 7) {
        echo $toYearToMonth . $i === $thisYearAndMonthYmj ? $td : "<td class='sunday'>$i</td>";

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