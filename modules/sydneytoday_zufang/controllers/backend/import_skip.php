<?php
$id = $vars[1];
$rtn = new stdClass();

$sydneytoday_zufang = SydneytodayZufang::findById($id);

if ($sydneytoday_zufang) {
  $sydneytoday_zufang->setCleaned(1);
  if ($sydneytoday_zufang->save()) {
    $rtn->status = 'success';
    $rtn->id = 'sydneytoday_zufang_' . $id;
  } else {
    $rtn->status = 'failed';
    $rtn->message = "failed to save object sydneytoday_zufang";
  }
} else {
    $rtn->status = 'failed';
    $rtn->message = "can not find this sydneytoday_zufang object";
}

echo json_encode($rtn);