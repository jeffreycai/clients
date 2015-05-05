<?php

$html = new HTML();

$html->renderOut('core/backend/html_header', array('title' => i18n(array(
  'en' => 'Sydneytoday Zufang',
  'zh' => '今日悉尼 - 租房',
  ))), true);
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('sydneytoday_zufang/backend/import_list', array(
    'clients' => SydneytodayZufang::fetchRecordsToClean(20, true),
), true);

$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;