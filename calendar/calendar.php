<?php

  // 曜日の定数
  define('MONDAY', 1);
  define('TUESDAY', 2);
  define('WEDNESDAY', 3);
  define('THURSDAY', 4);
  define('FRIDAY', 5);
  define('SATURDAY', 6);
  define('SUNDAY', 7);

  // 実行日の日付を取得
  $now = new DateTime();  
  $nowYnjMessage  = $now->format('今日はY年n月j日です');
  $nowYmj         = $now->format('Ymj');

  // 年月があるかチェック
  if (!empty($_GET['Ym'])) {
    $date = $_GET['Ym'] . "01";
  } else {
    $date = $now->format("Ym") . "01";
  }

  // 先月と先月の日数の取得
  $lastMonths    = new DateTime($date);
  $lastMonths    = $lastMonths->modify('-1 months');
  $lastMonth     = $lastMonths->format('Ym');
  $lastMonthDays = $lastMonths->format('t');

  // 今月の日数と月の取得
  $thisMonths    = new DateTime($date);
  $thisMonth     = $thisMonths->format('Ym');
  $thisMonthYn   = $thisMonths->format('Y年n月');
  $thisMonthDays = $thisMonths->format('t');

  // 1日(月初めの日)の曜日番号を数字型で返す
  $firstDayNumber = (int)$thisMonths->format('N');

  // 来月と来月の日数の取得
  $nextMonths    = new Datetime($date);
  $nextMonths    = $nextMonths->modify('+1 months');
  $nextMonth     = $nextMonths->format('Ym');
  $nextMonthDays = $nextMonths->format('t');

  /**
   * カレンダーの曜日部分をthにて出力
   */
  function dispWeek()
  {
    $weeks = [
      '月' => 'monday',
      '火' => 'tuesday',
      '水' => 'wednesday',
      '木' => 'thursday',
      '金' => 'friday',
      '土' => 'saturday',
      '日' => 'sunday'
    ];
    
    foreach ($weeks as $jaDayOfWeek => $enDayOfWeek) {
      echo "<th class='$enDayOfWeek text-center'>$jaDayOfWeek</th>";
    }
  
  }

  /**
   * htmlspecialcharsを使用する
   * @param string $str 表示する予定の文字列
   * @return       htmlspecialchars関数
   */
  function e(string $str, string $charset = 'UTF-8'): string 
  {
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charset);
  // 独習PHP 第3版 P307より
  }
