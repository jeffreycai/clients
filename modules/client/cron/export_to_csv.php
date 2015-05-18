<?php
require_once __DIR__ . '/../../../bootstrap.php';

$clients = Client::findAllToImportToGoogle();

$f = fopen(__DIR__ . '/clients.csv', 'w');
fputcsv($f, array(
'Name','Given Name','Additional Name','Family Name','Yomi Name','Given Name Yomi','Additional Name Yomi','Family Name Yomi','Name Prefix','Name Suffix','Initials','Nickname','Short Name','Maiden Name','Birthday','Gender','Location','Billing Information','Directory Server','Mileage','Occupation','Hobby','Sensitivity','Priority','Subject','Notes','Group Membership','E-mail 1 - Type','E-mail 1 - Value','Phone 1 - Type','Phone 1 - Value','Phone 2 - Type','Phone 2 - Value','Address 1 - Type','Address 1 - Formatted','Address 1 - Street','Address 1 - City','Address 1 - PO Box','Address 1 - Region','Address 1 - Postal Code','Address 1 - Country','Address 1 - Extended Address','Custom Field 1 - Type','Custom Field 1 - Value','Custom Field 2 - Type','Custom Field 2 - Value','Custom Field 3 - Type','Custom Field 3 - Value','Custom Field 4 - Type','Custom Field 4 - Value'
));
$i = 0;
foreach ($clients as $client) {
//  if ($i++ > 11) {
//    break;
//  }
  fputcsv($f, array(
      empty($client->getName()) ? 'Noname' . get_random_string() : $client->getName(),
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      empty($client->getComment()) ? '' : $client->getComment(),
      '',
      '* Home',
      empty($client->getEmail()) ? '' : $client->getEmail(),
      'Mobile',
      empty($client->getMobile()) ? '' : $client->getMobile(),
      'Work',
      empty($client->getPhone()) ? '' : $client->getPhone(),
      'Home',
      empty($client->getAddress()) ? '' : $client->getAddress(),
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      'Source Date',
      empty($client->getSourceDate()) ? 'N/A' : date('Y-m-d', $client->getSourceDate()),
      'Wechat',
      empty($client->getWechat()) ? '' : $client->getWechat(),
      'QQ',
      empty($client->getQq()) ? '' : $client->getQq(),
      'ID',
      empty($client->getId()) ? '' : $client->getId()
  ));
  
  $client->setImportedToGoogle(1);
  $client->save();
}
fclose($f);