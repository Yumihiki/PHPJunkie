<?php

$date = '';

if (!empty($_GET['YYYYM'])) {
  // $date      = $_GET["date"] . "01";
  // $thisMonth = $_GET["date"] . "01";
  $explode   = explode("_", $_GET["YYYYM"]);
  $thisYear  = $explode[0];
  $thisMonth = $explode[1];
} else {
  $thisYear    = (int)date("Y");
  $thisMonth   = (int)date(n);
  $toDayCheck  = date('Ymj');
}

  // $t = date("t", $date);
  // $y = date("Y", $date);
  // $m = date("m", $date);

  $lastMonth = date('n',mktime(0,0,0,$thisMonth-1,1,$thisYear)); 
  $thisMonth = date('n',mktime(0,0,0,$thisMonth,1,$thisYear)); 
  $nextMonth = date('n',mktime(0,0,0,$thisMonth+1,1,$thisYear)); 
  $toDay   = date('Ymj');
  $echoToDay   = date('Y年n月j日');

  $toDayj = date('j');

  $toYearToMonth = date('Ym');

  // 月の日数
  $lastMonthDays = date('t',mktime(0,0,0,$thisMonth-1,1,$thisYear));
  $thisMonthDays = date('t',mktime(0,0,0,$thisMonth,1,$thisYear));
  $nextMonthDays = date('t',mktime(0,0,0,$thisMonth+1,1,$thisYear));
    
  // 年月 2019_7 のように返す
  $lastYearAndMonth = date('Y_n',mktime(0,0,0,$thisMonth-1,1,$thisYear));
  $thisYearAndMonth = date('Y_n',mktime(0,0,0,$thisMonth,1,$thisYear));
  $nextYearAndMonth = date('Y_n',mktime(0,0,0,$thisMonth+1,1,$thisYear));

  // スクリプト上の月を返す
  $nextYearAndMonth = date('Y_n',mktime(0,0,0,$thisMonth+1,1,$thisYear));
  $thisYearAndMonthYm = date('Ym',mktime(0,0,0,$thisMonth,1,$thisYear));

  // 1日の曜日番号を返す
  $firstDayNumber = date('N',mktime(0,0,0,$thisMonth,1,$thisYear));
  $firstDayNumber = (int)$firstDayNumber;

  $weeks = [
    '月' => 'monday',
    '火' => 'tuesday',
    '水' => 'wednesday',
    '木' => 'thursday',
    '金' => 'friday',
    '土' => 'saturday',
    '日' => 'sunday'
  ];

  ?>