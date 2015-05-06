<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - name
 * - phone
 * - mobile
 * - wechat
 * - qq
 * - email
 * - address
 * - comment
 * - source_date
 * - stared
 */
class BaseClient extends DBObject {
  /**
   * Implement parent abstract functions
   */
  protected function setPrimaryKeyName() {
    $this->primary_key = array(
      'id'
    );
  }
  protected function setPrimaryKeyAutoIncreased() {
    $this->pk_auto_increased = TRUE;
  }
  protected function setTableName() {
    $this->table_name = 'client';
  }
  
  /**
   * Setters and getters
   */
   public function setId($var) {
     $this->setDbFieldId($var);
   }
   public function getId() {
     return $this->getDbFieldId();
   }
   public function setName($var) {
     $this->setDbFieldName($var);
   }
   public function getName() {
     return $this->getDbFieldName();
   }
   public function setPhone($var) {
     $this->setDbFieldPhone($var);
   }
   public function getPhone() {
     return $this->getDbFieldPhone();
   }
   public function setMobile($var) {
     $this->setDbFieldMobile($var);
   }
   public function getMobile() {
     return $this->getDbFieldMobile();
   }
   public function setWechat($var) {
     $this->setDbFieldWechat($var);
   }
   public function getWechat() {
     return $this->getDbFieldWechat();
   }
   public function setQq($var) {
     $this->setDbFieldQq($var);
   }
   public function getQq() {
     return $this->getDbFieldQq();
   }
   public function setEmail($var) {
     $this->setDbFieldEmail($var);
   }
   public function getEmail() {
     return $this->getDbFieldEmail();
   }
   public function setAddress($var) {
     $this->setDbFieldAddress($var);
   }
   public function getAddress() {
     return $this->getDbFieldAddress();
   }
   public function setComment($var) {
     $this->setDbFieldComment($var);
   }
   public function getComment() {
     return $this->getDbFieldComment();
   }
   public function setSourceDate($var) {
     $this->setDbFieldSource_date($var);
   }
   public function getSourceDate() {
     return $this->getDbFieldSource_date();
   }
   public function setStared($var) {
     $this->setDbFieldStared($var);
   }
   public function getStared() {
     return $this->getDbFieldStared();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('client');
  }
  
  static function tableExist() {
    return parent::tableExistByName('client');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `client` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(32) ,
  `phone` VARCHAR(100) ,
  `mobile` VARCHAR(100) ,
  `wechat` VARCHAR(30) ,
  `qq` VARCHAR(20) ,
  `email` VARCHAR(100) ,
  `address` VARCHAR(512) ,
  `comment` TEXT ,
  `source_date` INT ,
  `stared` TINYINT(1) DEFAULT 0 ,
  PRIMARY KEY (`id`)
 ,
INDEX `client_phone` (`phone` ASC) ,
INDEX `client_mobile` (`mobile` ASC) ,
INDEX `client_email` (`email` ASC) ,
INDEX `client_stared` (`stared` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'Client') {
    global $mysqli;
    $query = 'SELECT * FROM client WHERE id=' . $id;
    $result = $mysqli->query($query);
    if ($result && $b = $result->fetch_object()) {
      $obj = new $instance();
      DBObject::importQueryResultToDbObject($b, $obj);
      return $obj;
    }
    return null;
  }
  
  static function findAll() {
    global $mysqli;
    $query = "SELECT * FROM client";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Client();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM client LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new Client();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM client";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE client";
    return $mysqli->query($query);
  }
}