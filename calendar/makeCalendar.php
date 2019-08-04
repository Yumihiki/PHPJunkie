<?php

echo '<tr>';

  // 前月の表示
  require_once("getLastMonth.php");
  
  // 今月の表示
  require_once("getThisMonth.php");
  
  // 次月の表示
  require_once("getNextMonth.php");

echo '</tr>';

