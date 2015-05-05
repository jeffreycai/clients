<?php
require_once "BaseClient.class.php";

class Client extends BaseClient {
  static function findByPhone($phone, $instance = 'Client') {
    global $mysqli;
    $query = 'SELECT * FROM client WHERE phone=' . DBObject::prepare_val_for_sql($phone);
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new $instance();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
  static function findByMobile($mobile, $instance = 'Client') {
    global $mysqli;
    $query = 'SELECT * FROM client WHERE mobile=' . DBObject::prepare_val_for_sql($mobile);
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new $instance();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
  static function findByEmail($email, $instance = 'Client') {
    global $mysqli;
    $query = 'SELECT * FROM client WHERE email=' . DBObject::prepare_val_for_sql($email);
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new $instance();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
  static function findByWechat($wechat, $instance = 'Client') {
    global $mysqli;
    $query = 'SELECT * FROM client WHERE wechat=' . DBObject::prepare_val_for_sql($wechat);
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new $instance();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
}
