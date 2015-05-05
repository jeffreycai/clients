<?php

$id = isset($vars[1]) ? $vars[1] : null;
$object = SydneytodayZufang::findById($id);
if (is_null($object)) {
  HTML::forward('core/404');
}

// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $name
  $name = isset($_POST["name"]) ? strip_tags($_POST["name"]) : null;  
  // validation for $phone_img
  $phone_img = isset($_POST["phone_img"]) ? strip_tags($_POST["phone_img"]) : null;  
  // validation for $phone
  $phone = isset($_POST["phone"]) ? strip_tags($_POST["phone"]) : null;  
  // validation for $mobile_img
  $mobile_img = isset($_POST["mobile_img"]) ? strip_tags($_POST["mobile_img"]) : null;  
  // validation for $mobile
  $mobile = isset($_POST["mobile"]) ? strip_tags($_POST["mobile"]) : null;  
  // validation for $qq
  $qq = isset($_POST["qq"]) ? strip_tags($_POST["qq"]) : null;  
  // validation for $email_img
  $email_img = isset($_POST["email_img"]) ? strip_tags($_POST["email_img"]) : null;  
  // validation for $email
  $email = isset($_POST["email"]) ? strip_tags($_POST["email"]) : null;
  $retype_email = isset($_POST["retype_email"]) ? strip_tags($_POST["retype_email"]) : null;
  if ($email != $retype_email) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "Retype value does not match for email", "zh" => "再次输入的email与原值不匹配"))));
    $error_flag = true;
  }
  
  // validation for $wechat
  $wechat = isset($_POST["wechat"]) ? strip_tags($_POST["wechat"]) : null;  
  // validation for $post_id
  $post_id = isset($_POST["post_id"]) ? strip_tags($_POST["post_id"]) : null;
  if (empty($post_id)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "post_id is required.", "zh" => "请填写post_id"))));
    $error_flag = true;
  }
  
  // validation for $vendor_type
  $vendor_type = isset($_POST["vendor_type"]) ? strip_tags($_POST["vendor_type"]) : null;  
  // validation for $rental_type
  $rental_type = isset($_POST["rental_type"]) ? strip_tags($_POST["rental_type"]) : null;  
  // validation for $price
  $price = isset($_POST["price"]) ? strip_tags($_POST["price"]) : null;  
  // validation for $property_type
  $property_type = isset($_POST["property_type"]) ? strip_tags($_POST["property_type"]) : null;  
  // validation for $suburb
  $suburb = isset($_POST["suburb"]) ? strip_tags($_POST["suburb"]) : null;  
  // validation for $address
  $address = isset($_POST["address"]) ? strip_tags($_POST["address"]) : null;  
  // validation for $client_comment
  $client_comment = isset($_POST["client_comment"]) ? $_POST["client_comment"] : null;  
  // validation for $property_images
  $property_images = isset($_POST["property_images"]) ? $_POST["property_images"] : null;  
  // validation for $comment
  $comment = isset($_POST["comment"]) ? $_POST["comment"] : null;  
  // validation for $cleaned
  $cleaned = isset($_POST["cleaned"]) ? 1 : 0;  /// proceed submission
  
  // proceed for $name
  $object->setName($name);
  
  // proceed for $phone_img
  $object->setPhoneImg($phone_img);
  
  // proceed for $phone
  $object->setPhone($phone);
  
  // proceed for $mobile_img
  $object->setMobileImg($mobile_img);
  
  // proceed for $mobile
  $object->setMobile($mobile);
  
  // proceed for $qq
  $object->setQq($qq);
  
  // proceed for $email_img
  $object->setEmailImg($email_img);
  
  // proceed for $email
  $object->setEmail($email);
  
  // proceed for $wechat
  $object->setWechat($wechat);
  
  // proceed for $post_id
  $object->setPostId($post_id);
  
  // proceed for $vendor_type
  $object->setVendorType($vendor_type);
  
  // proceed for $rental_type
  $object->setRentalType($rental_type);
  
  // proceed for $price
  $object->setPrice($price);
  
  // proceed for $property_type
  $object->setPropertyType($property_type);
  
  // proceed for $suburb
  $object->setSuburb($suburb);
  
  // proceed for $address
  $object->setAddress($address);
  
  // proceed for $client_comment
  $object->setClientComment($client_comment);
  
  // proceed for $property_images
  $object->setPropertyImages($property_images);
  
  // proceed for $comment
  $object->setComment($comment);
  
  // proceed for $cleaned
  $object->setCleaned($cleaned);
  if ($error_flag == false) {
    if ($object->save()) {
      Message::register(new Message(Message::SUCCESS, i18n(array("en" => "Record saved", "zh" => "记录保存成功"))));
      HTML::forwardBackToReferer();
    } else {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Record failed to save", "zh" => "记录保存失败"))));
    }
  }
}



$html = new HTML();

$html->renderOut('core/backend/html_header', array(
  'title' => i18n(array(
  'en' => 'Edit Sydneytoday Zufang',
  'zh' => 'Edit 今日悉尼 - 租房',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('sydneytoday_zufang/backend/sydneytoday_zufang_edit', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

