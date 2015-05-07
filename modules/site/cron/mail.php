<?php

require __DIR__ . "/../../../bootstrap.php";

$reply_to = 'sally.cheng051@gmail.com';
$from = 'sally.cheng051@gmail.com';
$from_nickname = '悉尼房产小助手';
$subject = 'Wentworth Point新楼王Jewel，绝佳投资良机！';
$msg = load_email_template('jewel.php');
//$to = 'jeffreycaizhenyuan@gmail.com';


foreach (Client::findAll() as $client) {
  if (preg_match('/(.+)?@(.+)\.(.+)/', $client->getEmail())) {
    Queue::addToQueque('Marketing email', 'Jewel marketing email', 'sendMarketingEmail', array(
        'reply_to' => $reply_to,
        'from' => $from,
        'from_nickname' => $from_nickname,
        'subject' => $subject,
        'msg' => $msg,
        'to' => $client->getEmail()
    ), Queue::PRIORITY_HIGH);
  }
}


//for ($i = 0; $i < 501; $i++) {
//  Queue::fetchAndProceed();
//}


