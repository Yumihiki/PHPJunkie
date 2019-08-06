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
  if (!empty($_GET['Ym'])) {
    $date = $_GET['Ym'] . "01";
  } else {
    $date = $now->format("Ym") . "01";
  }
  // TODO : $thisDateTimeを多用しているためもっと修正できるのでは？
  // 表示する日付取得
  $thisDateTime = new DateTime($date);
  $thisYear     = $thisDateTime->format("Y");
  $thisMonth    = $thisDateTime->format("n");
  // 今日の日付取得
  $toDay = $now->format('Ymj');

  // 先月と先月の日数の取得
  $lastMonth        = $thisDateTime->modify('-1 months')->format('Ym');
  $lastMonthDays    = $thisDateTime->format('t');

  // 今月の日数と月の取得
  // $thisDateTimeは先月の日数を取得するときに-1されているので+1行う
  $thisMonthDays    = $thisDateTime->modify('+1 months')->format('t');
  $thisYearAndMonth = $thisDateTime->format('Ym');

  // 1日の曜日番号を数字型で返す
  $firstDayNumber   = (int)$thisDateTime->format('N');

  // 来月と来月の日数の取得
  $nextMonth        = $thisDateTime->modify('+1 months')->format('Ym');
  $nextMonthDays    = $thisDateTime->format('t');

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
