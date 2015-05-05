<?php
include_once MODULESROOT . DS . 'core' . DS . 'includes' . DS . 'classes' . DS . 'DBObject.class.php';

/**
 * DB fields
 * - id
 * - name
 * - phone_img
 * - phone
 * - mobile_img
 * - mobile
 * - qq
 * - email_img
 * - email
 * - wechat
 * - vendor_type
 * - rental_type
 * - price
 * - property_type
 * - suburb
 * - address
 * - client_comment
 * - property_images
 * - post_id
 * - comment
 * - cleaned
 */
class BaseSydneytodayZufang extends DBObject {
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
    $this->table_name = 'sydneytoday_zufang';
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
   public function setPhoneImg($var) {
     $this->setDbFieldPhone_img($var);
   }
   public function getPhoneImg() {
     return $this->getDbFieldPhone_img();
   }
   public function setPhone($var) {
     $this->setDbFieldPhone($var);
   }
   public function getPhone() {
     return $this->getDbFieldPhone();
   }
   public function setMobileImg($var) {
     $this->setDbFieldMobile_img($var);
   }
   public function getMobileImg() {
     return $this->getDbFieldMobile_img();
   }
   public function setMobile($var) {
     $this->setDbFieldMobile($var);
   }
   public function getMobile() {
     return $this->getDbFieldMobile();
   }
   public function setQq($var) {
     $this->setDbFieldQq($var);
   }
   public function getQq() {
     return $this->getDbFieldQq();
   }
   public function setEmailImg($var) {
     $this->setDbFieldEmail_img($var);
   }
   public function getEmailImg() {
     return $this->getDbFieldEmail_img();
   }
   public function setEmail($var) {
     $this->setDbFieldEmail($var);
   }
   public function getEmail() {
     return $this->getDbFieldEmail();
   }
   public function setWechat($var) {
     $this->setDbFieldWechat($var);
   }
   public function getWechat() {
     return $this->getDbFieldWechat();
   }
   public function setVendorType($var) {
     $this->setDbFieldVendor_type($var);
   }
   public function getVendorType() {
     return $this->getDbFieldVendor_type();
   }
   public function setRentalType($var) {
     $this->setDbFieldRental_type($var);
   }
   public function getRentalType() {
     return $this->getDbFieldRental_type();
   }
   public function setPrice($var) {
     $this->setDbFieldPrice($var);
   }
   public function getPrice() {
     return $this->getDbFieldPrice();
   }
   public function setPropertyType($var) {
     $this->setDbFieldProperty_type($var);
   }
   public function getPropertyType() {
     return $this->getDbFieldProperty_type();
   }
   public function setSuburb($var) {
     $this->setDbFieldSuburb($var);
   }
   public function getSuburb() {
     return $this->getDbFieldSuburb();
   }
   public function setAddress($var) {
     $this->setDbFieldAddress($var);
   }
   public function getAddress() {
     return $this->getDbFieldAddress();
   }
   public function setClientComment($var) {
     $this->setDbFieldClient_comment($var);
   }
   public function getClientComment() {
     return $this->getDbFieldClient_comment();
   }
   public function setPropertyImages($var) {
     $this->setDbFieldProperty_images($var);
   }
   public function getPropertyImages() {
     return $this->getDbFieldProperty_images();
   }
   public function setPostId($var) {
     $this->setDbFieldPost_id($var);
   }
   public function getPostId() {
     return $this->getDbFieldPost_id();
   }
   public function setComment($var) {
     $this->setDbFieldComment($var);
   }
   public function getComment() {
     return $this->getDbFieldComment();
   }
   public function setCleaned($var) {
     $this->setDbFieldCleaned($var);
   }
   public function getCleaned() {
     return $this->getDbFieldCleaned();
   }

  
  
  /**
   * self functions
   */
  static function dropTable() {
    return parent::dropTableByName('sydneytoday_zufang');
  }
  
  static function tableExist() {
    return parent::tableExistByName('sydneytoday_zufang');
  }
  
  static function createTableIfNotExist() {
    global $mysqli;

    if (!self::tableExist()) {
      return $mysqli->query('
CREATE TABLE IF NOT EXISTS `sydneytoday_zufang` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(32) ,
  `phone_img` VARCHAR(100) ,
  `phone` VARCHAR(12) ,
  `mobile_img` VARCHAR(100) ,
  `mobile` VARCHAR(12) ,
  `qq` VARCHAR(20) ,
  `email_img` VARCHAR(100) ,
  `email` VARCHAR(50) ,
  `wechat` VARCHAR(30) ,
  `vendor_type` VARCHAR(10) ,
  `rental_type` VARCHAR(10) ,
  `price` VARCHAR(10) ,
  `property_type` VARCHAR(10) ,
  `suburb` VARCHAR(20) ,
  `address` VARCHAR(512) ,
  `client_comment` VARCHAR(1024) ,
  `property_images` VARCHAR(1024) ,
  `post_id` INT NOT NULL ,
  `comment` TEXT ,
  `cleaned` TINYINT(1) DEFAULT 0 ,
  PRIMARY KEY (`id`)
 ,
INDEX `sydneytoday_zufang_post_id` (`post_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
      ');
    }
    
    return true;
  }
  
  static function findById($id, $instance = 'SydneytodayZufang') {
    global $mysqli;
    $query = 'SELECT * FROM sydneytoday_zufang WHERE id=' . $id;
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
    $query = "SELECT * FROM sydneytoday_zufang";
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new SydneytodayZufang();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function findAllWithPage($page, $entries_per_page) {
    global $mysqli;
    $query = "SELECT * FROM sydneytoday_zufang LIMIT " . ($page - 1) * $entries_per_page . ", " . $entries_per_page;
    $result = $mysqli->query($query);
    
    $rtn = array();
    while ($result && $b = $result->fetch_object()) {
      $obj= new SydneytodayZufang();
      DBObject::importQueryResultToDbObject($b, $obj);
      $rtn[] = $obj;
    }
    
    return $rtn;
  }
  
  static function countAll() {
    global $mysqli;
    $query = "SELECT COUNT(*) as 'count' FROM sydneytoday_zufang";
    if ($result = $mysqli->query($query)) {
      return $result->fetch_object()->count;
    }
  }
  
  static function truncate() {
    global $mysqli;
    $query = "TRUNCATE TABLE sydneytoday_zufang";
    return $mysqli->query($query);
  }
}