<?php
require_once "BaseSydneytodayZufang.class.php";

class SydneytodayZufang extends BaseSydneytodayZufang {
  static function findByPostId($id, $instance = 'SydneytodayZufang') {
    global $mysqli;
    $query = 'SELECT * FROM sydneytoday_zufang WHERE post_id=' . $id;
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new $instance();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
  
  static function fetchRecordsToClean($num = 20, $has_email = false) {
    global $mysqli;
    $email_condition = $has_email ? " AND (email_img!='' OR email_img IS NOT NULL) " : "";
    $query = 'SELECT * FROM sydneytoday_zufang WHERE cleaned=0 '.$email_condition.' ORDER BY source_date DESC LIMIT ' . $num;
    $result = $mysqli->query($query);
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj = new SydneytodayZufang();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    return $rtn;
  }
}
