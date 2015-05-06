<?php
$id = $vars[1];
$rtn = new stdClass();

$sydneytoday_zufang = SydneytodayZufang::findById($id);

if ($sydneytoday_zufang) {
  $phone = isset($_POST['phone']) ? strip_tags(trim($_POST['phone'])) : null;
  $mobile = isset($_POST['mobile']) ? strip_tags(trim($_POST['mobile'])) : null;
  $email = isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : null;
  $address = isset($_POST['address']) ? strip_tags(trim($_POST['address'])) : null;
  $wechat = isset($_POST['wechat']) ? strip_tags(trim($_POST['wechat'])) : null;
  
  $sydneytoday_zufang->setPhone($phone);
  $sydneytoday_zufang->setMobile($mobile);
  $sydneytoday_zufang->setEmail($email);
  $sydneytoday_zufang->setAddress($address);
  $sydneytoday_zufang->setWechat($wechat);

  if ($sydneytoday_zufang->save()) {
    
    $client = null;
    if (!empty($email)) {
      $client = is_null($client) ? Client::findByEmail($email) : $client;
    }
    if (!empty($mobile)) {
      $client = is_null($client) ? Client::findByPhone($mobile) : $client;
      $client = is_null($client) ? Client::findByMobile($mobile) : $client;
    }
    if (!empty($phone)) {
      $client = is_null($client) ? Client::findByPhone($phone) : $client;
      $client = is_null($client) ? Client::findByMobile($phone) : $client;
    }
    if (!empty($wechat)) {
      $client = is_null($client) ? Client::findByWechat($wechat) : $client;
    }
    $client = is_null($client) ? new Client() : $client;
    
    if (empty($client->getName())) {
      $client->setName($sydneytoday_zufang->getName());
    }
    if (empty($client->getPhone())) {
      $client->setPhone($sydneytoday_zufang->getPhone());
    }
    if (empty($client->getMobile())) {
      $client->setMobile($sydneytoday_zufang->getMobile());
    }
    if (empty($client->getQq())) {
      $client->setQq($sydneytoday_zufang->getQq());
    }
    if (empty($client->getEmail())) {
      $client->setEmail($sydneytoday_zufang->getEmail());
    }
    if (empty($client->getAddress())) {
      $client->setAddress($sydneytoday_zufang->getAddress());
    }
    if (empty($client->getWechat())) {
      $client->setWechat($sydneytoday_zufang->getWechat());
    }
    if (empty($client->getComment())) {
      $images = "";
      if (!empty($sydneytoday_zufang->getPropertyImages())) {
        $tokens = explode("\n", trim($sydneytoday_zufang->getPropertyImages()));
        foreach ($tokens as $img) {
          $images .= "<br /><img src='$img' />";
        }
      }
      $client->setComment($sydneytoday_zufang->getClientComment() .$images);
    }
    if (empty($client->getSourceDate())) {
      $client->setSourceDate($sydneytoday_zufang->getSourceDate());
    }
    
    if ($client->save()) {
      $sydneytoday_zufang->setCleaned(1);
      $sydneytoday_zufang->save();
      
      $rtn->status = 'success';
      $rtn->id = 'sydneytoday_zufang_' . $id;
      $rtn->client_id = $client->getId();
    } else {
      $rtn->status = 'failed';
      $rtn->message = "failed to save object client";
    }
  } else {
    $rtn->status = 'failed';
    $rtn->message = "failed to save object sydneytoday_zufang";
  }
} else {
    $rtn->status = 'failed';
    $rtn->message = "can not find this sydneytoday_zufang object";
}

echo json_encode($rtn);