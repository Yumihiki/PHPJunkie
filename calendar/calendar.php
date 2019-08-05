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

  $date = "";

  $now = new DateTime();

  // 年月があるかチェック
  if (!empty($_GET['YYYYM'])) {
    $date = $_GET['YYYYM'] . "01";
  }
  // 表示する日付取得
  $thisDateTime = new DateTime($date);
  $thisYear  = $thisDateTime->format("Y");
  $thisMonth = $thisDateTime->format("n");
  // 出力する用 いるのか?
  $year  = $thisYear;
  $month = $thisMonth;
  // 今日の日付取得
  $toDay = date('Ymj');

  $lastMonth = date('n',mktime(0,0,0,$thisMonth-1,1,$thisYear));
  $thisMonth = date('n',mktime(0,0,0,$thisMonth,1,$thisYear));
  $nextMonth = date('n',mktime(0,0,0,$thisMonth+1,1,$thisYear));

  // 月の日数
  $lastMonthDays = date('t',mktime(0,0,0,$thisMonth-1,1,$thisYear));
  $thisMonthDays = date('t',mktime(0,0,0,$thisMonth,1,$thisYear));
  $nextMonthDays = date('t',mktime(0,0,0,$thisMonth+1,1,$thisYear));

  // 年月 201907 のように返す
  $lastYearAndMonth = date('Ym',mktime(0,0,0,$thisMonth-1,1,$thisYear));
  $nextYearAndMonth = date('Ym',mktime(0,0,0,$thisMonth+1,1,$thisYear));

  // スクリプト上の月を返す
  $thisYearAndMonthYm = date('Ym',mktime(0,0,0,$thisMonth,1,$thisYear));

  // 1日の曜日番号を数字型で返す
  $firstDayNumber = (int)date('N',mktime(0,0,0,$thisMonth,1,$thisYear));

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
