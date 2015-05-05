<?php
  //-- SydneytodayZufang:Clear cache
  if ($command == "cc") {
    if ($arg1 == "all" || $arg1 == "sydneytoday_zufang") {
      echo " - Drop table 'sydneytoday_zufang' ";
      echo SydneytodayZufang::dropTable() ? "success\n" : "fail\n";
    }
  }

  //-- SydneytodayZufang:Import DB
  if ($command == "import" && $arg1 == "db" && (is_null($arg2) || $arg2 == "sydneytoday_zufang") ) {
  //- create tables if not exits
  echo " - Create table 'sydneytoday_zufang' ";
  echo SydneytodayZufang::createTableIfNotExist() ? "success\n" : "fail\n";
  }
  