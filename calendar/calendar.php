<?php

  // 変数など基本的な内容はここに
  // 曜日の定数
  define('MONDAY', 1);
  define('TUESDAY', 2);
  define('WEDNESDAY', 3);
  define('THURSDAY', 4);
  define('FRIDAY', 5);
  define('SATURDAY', 6);
  define('SUNDAY', 7);

  $now = new DateTime();

  $date = "";
  // 年月があるかチェック
  if (!empty($_GET['YYYYMM'])) {
    $date = $_GET['YYYYMM'] . "01";
  }
  // 表示する日付取得
  $thisDateTime = new DateTime($date);
  $thisYear  = $thisDateTime->format("Y");
  $thisMonth = $thisDateTime->format("n");
  // 今日の日付取得
  $toDay = $now->format('Ymj');

  // 先月の日数と月の取得
  $lastMonthDays    = $thisDateTime->modify('-1 months')->format('t');
  $lastMonth        = $thisDateTime->format('Ym');

  // 今月の日数と月の取得
  $thisMonthDays    = $thisDateTime->modify('+1 months')->format('t');
  $thisYearAndMonth = $thisDateTime->format('Ym');

  // 1日の曜日番号を数字型で返す
  $firstDayNumber   = (int)$thisDateTime->format('N');

  // 来月の日数と月の取得  
  $nextMonthDays    = $thisDateTime->modify('+1 months')->format('t');
  $nextMonth        = $thisDateTime->format('Ym');

  $weeks = [
    '月' => 'monday',
    '火' => 'tuesday',
    '水' => 'wednesday',
    '木' => 'thursday',
    '金' => 'friday',
    '土' => 'saturday',
    '日' => 'sunday'
  ];

  function e(string $str, string $charset = 'UTF-8'): string {
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charset);
  // 独習PHP 第3版 P307より
  }
