<?php

require __DIR__ . "/../../../bootstrap.php";

$reply_to = 'fangchanxiaozhushou@gmail.com';
$from = 'fangchanxiaozhushou@gmail.com';
$from_nickname = '悉尼人';
$subject = '悉尼华盛顿公园？';
$msg = load_email_template('washington-park.php');
//$to = 'jeffreycaizhenyuan@gmail.com';

  $i = 0;
  $counter = 0;
foreach (Client::findAll() as $client) {

  if (preg_match('/(.+)?@(.+)\.(.+)/', $client->getEmail())) {
    $i++;

      if (!preg_match('/(.+)?@qq\.com/', $client->getEmail())) {
        echo $client->getEmail() . ";\n";
        $counter++;
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


