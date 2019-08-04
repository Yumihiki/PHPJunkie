<?php

  // 変数など基本的な内容はここに

  $date = '';

  $now = new DateTime();

  if (!empty($_GET['YYYYM'])) {
    $explode   = explode("_", $_GET["YYYYM"]);
    $thisYear  = $explode[0];
    $thisMonth = $explode[1];
    unset($explode);
  } else {
    $thisYear  = date("Y");
    $thisMonth = date("n");
  }

  $toDay = date('Ymj');

  $lastMonth = date('n',mktime(0,0,0,$thisMonth-1,1,$thisYear)); 
  $thisMonth = date('n',mktime(0,0,0,$thisMonth,1,$thisYear)); 
  $nextMonth = date('n',mktime(0,0,0,$thisMonth+1,1,$thisYear)); 

  // 月の日数
  $lastMonthDays = date('t',mktime(0,0,0,$thisMonth-1,1,$thisYear));
  $thisMonthDays = date('t',mktime(0,0,0,$thisMonth,1,$thisYear));
  $nextMonthDays = date('t',mktime(0,0,0,$thisMonth+1,1,$thisYear));
    
  // 年月 2019_7 のように返す
  $lastYearAndMonth = date('Y_n',mktime(0,0,0,$thisMonth-1,1,$thisYear));
  $thisYearAndMonth = date('Y_n',mktime(0,0,0,$thisMonth,1,$thisYear));
  $nextYearAndMonth = date('Y_n',mktime(0,0,0,$thisMonth+1,1,$thisYear));

  // スクリプト上の月を返す
  $thisYearAndMonthYm = date('Ym',mktime(0,0,0,$thisMonth,1,$thisYear));

  $explode = explode("_", $thisYearAndMonth);
  $year  = $explode[0];
  $month = $explode[1];
  unset($explode);

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

  
?>