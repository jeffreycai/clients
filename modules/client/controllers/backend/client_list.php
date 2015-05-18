<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1;
if (!preg_match('/^\d+$/', $page)) {
  dispatch('core/backend/404');
  exit;
}


if (isset($_GET['search']) && ($search = trim($_GET['search']))) {
  $search = DBObject::prepare_val_for_sql($search);
  
  global $mysqli;
  $query = "SELECT * FROM client WHERE email=$search OR name=$search OR phone=$search OR mobile=$search OR wechat=$search OR qq=$search";
  $result = $mysqli->query($query);

  $rtn = array();
  while ($result && $b = $result->fetch_object()) {
    $obj = new Client();
    DBObject::importQueryResultToDbObject($b, $obj);
    $rtn[] = $obj;
  }
  $html = new HTML();

  $html->renderOut('core/backend/html_header', array('title' => i18n(array(
    'en' => 'Client',
    'zh' => '客户',
    ))), true);
  $html->output('<div id="wrapper">');
  $html->renderOut('core/backend/header');

  $perpage = 50;
  $total = 0;
  $total_page = ceil($total / $perpage);
  $html->renderOut('client/backend/client_list', array(
      'objects' => $rtn,
      'current_page' => 1,
      'total_page' => 1,
      'total' => 1,
      'pager' => '',
      'start_entry' => (1 - 1)*1 + 1,
      'end_entry' => min(array(1, 1*1))
  ), true);

  $html->output('</div>');

  $html->renderOut('core/backend/html_footer');

  exit;
  
}


$html = new HTML();

$html->renderOut('core/backend/html_header', array('title' => i18n(array(
  'en' => 'Client',
  'zh' => '客户',
  ))), true);
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');

$perpage = 50;
$total = Client::countAll();
$total_page = ceil($total / $perpage);
$html->renderOut('client/backend/client_list', array(
    'objects' => Client::findAllWithPage($page, $perpage),
    'current_page' => $page,
    'total_page' => $total_page,
    'total' => $total,
    'pager' => $html->render('core/components/pagination', array('total' => $total_page, 'page' => $page)),
    'start_entry' => ($page - 1)*$perpage + 1,
    'end_entry' => min(array($total, $page*$perpage))
), true);

$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

