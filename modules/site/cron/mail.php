<?php

require __DIR__ . "/../../../bootstrap.php";

$reply_to = 'sally.cheng051@gmail.com';
$from = 'sally.cheng051@gmail.com';
$from_nickname = '悉尼房产小助手';
$subject = 'Wentworth Point新楼王Jewel，绝佳投资良机！';
$msg = load_email_template('jewel.php');
//$to = 'jeffreycaizhenyuan@gmail.com';

  $i = 0;
  $counter = 0;
foreach (Client::findAll() as $client) {

  if (preg_match('/(.+)?@(.+)\.(.+)/', $client->getEmail())) {
    $i++;
    if ($i > 58) {
      if (!preg_match('/(.+)?@qq\.com/', $client->getEmail())) {
        echo $client->getEmail() . "; ";
        $counter++;
      }
    }
//    Queue::addToQueque('Marketing email', 'Jewel marketing email', 'sendMarketingEmail', array(
//        'reply_to' => $reply_to,
//        'from' => $from,
//        'from_nickname' => $from_nickname,
//        'subject' => $subject,
//        'msg' => $msg,
//        'to' => $client->getEmail()
//    ), Queue::PRIORITY_HIGH);
  }
}
echo "\ncounter=$counter\n";


//for ($i = 0; $i < 501; $i++) {
//  Queue::fetchAndProceed();
//}


