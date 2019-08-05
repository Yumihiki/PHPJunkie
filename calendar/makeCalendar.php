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
    $class = "";
    if ($thisYearAndMonthYm . $i === $toDay) {
      // 当日
      $class = "today";
    } else {
      // 曜日のclassを取得
      $class = get_week_class($todayNumber);
    }
    // 出力
    echo "<td class='{$class}'>{$i}</td>";
    // 日曜日なら
    if ($todayNumber === SUNDAY) {
      echo '</tr><tr>';
      // この後++されるので0で初期化
      $todayNumber = 0;
    }
    $todayNumber++;
  }

  // 次月の取得
  $loopNumberOfTimes = 8 - $todayNumber;
  for ($i = 1; $i <= $loopNumberOfTimes; $i++) {
    echo "<td class='nextmonth'>$i</td>";
  }

  echo '</tr>';

  /**
   * 曜日番号からclass名を取得
   * @param  int $weekNumber 1～７の曜日番号
   * @return str             class名
   */
  function get_week_class($weekNumber)
  {
    $class = '';
    // TODO: 各曜日のクラスをつける
    switch ($weekNumber) {
      case MONDAY:
        $class = "";
        break;
      case TUESDAY:
        $class = "";
        break;
      case WEDNESDAY:
        $class = "";
        break;
      case THURSDAY:
        $class = "";
        break;
      case FRIDAY:
        $class = "";
        break;
      case SATURDAY:
        $class = "saturday";
        break;
      case SUNDAY:
        $class = "sunday";
        break;
      default:
        break;
    }
    return $class;
  }
