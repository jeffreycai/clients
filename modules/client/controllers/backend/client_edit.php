<?php

$id = isset($vars[1]) ? $vars[1] : null;
$object = Client::findById($id);
if (is_null($object)) {
  HTML::forward('core/404');
}

// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $name
  $name = isset($_POST["name"]) ? strip_tags($_POST["name"]) : null;  
  // validation for $phone
  $phone = isset($_POST["phone"]) ? strip_tags($_POST["phone"]) : null;  
  // validation for $mobile
  $mobile = isset($_POST["mobile"]) ? strip_tags($_POST["mobile"]) : null;  
  // validation for $wechat
  $wechat = isset($_POST["wechat"]) ? strip_tags($_POST["wechat"]) : null;  
  // validation for $qq
  $qq = isset($_POST["qq"]) ? strip_tags($_POST["qq"]) : null;  
  // validation for $email
  $email = isset($_POST["email"]) ? strip_tags($_POST["email"]) : null;
  $retype_email = isset($_POST["retype_email"]) ? strip_tags($_POST["retype_email"]) : null;
  if ($email != $retype_email) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "Retype value does not match for email", "zh" => "再次输入的email与原值不匹配"))));
    $error_flag = true;
  }
  
  // validation for $address
  $address = isset($_POST["address"]) ? $_POST["address"] : null;  
  // validation for $comment
  $comment = isset($_POST["comment"]) ? $_POST["comment"] : null;  
  // validation for $stared
  $stared = isset($_POST["stared"]) ? 1 : 0;  /// proceed submission
  
  // proceed for $name
  $object->setName($name);
  
  // proceed for $phone
  $object->setPhone($phone);
  
  // proceed for $mobile
  $object->setMobile($mobile);
  
  // proceed for $wechat
  $object->setWechat($wechat);
  
  // proceed for $qq
  $object->setQq($qq);
  
  // proceed for $email
  $object->setEmail($email);
  
  // proceed for $address
  $object->setAddress($address);
  
  // proceed for $comment
  $object->setComment($comment);
  
  // proceed for $stared
  $object->setStared($stared);
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
  'en' => 'Edit Client',
  'zh' => 'Edit 客户',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('client/backend/client_edit', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

