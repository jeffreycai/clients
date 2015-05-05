<?php
require __DIR__ . "/../../../bootstrap.php";

// get total page number
$html = file_get_contents("http://www.sydneytoday.com/list.php?fid=12&page=1");
$matches = array();
preg_match('/page=(\d\d\d\d)/', $html, $matches);
$total_page = $matches[1];

// queue tasks to craw list pages
for ($page = 1; $page <= ceil($total_page / 20); $page++) {
//  echo "$page\n";
  Queue::addToQueque('sydneytoday_zufang_post_list', 'craw a zufang post list', 'sydneytoday_post_list_craw', array('page' => $page), Queue::PRIORITY_HIGH);
}



//for ($i = 1; $i < min(array(20, $total)); $i++) {
//  $url = "http://www.sydneytoday.com/list.php?fid=12&page=$i";
//  $html = file_get_contents($url);
//  $matches = array();
//  preg_match_all('/(http:\/\/www\.sydneytoday\.com\/bencandy\.php\?fid=\d+&id=\d+)"> <font color=/', $html, $matches);
//  $urls = $matches[1];
//  foreach ($urls as $url) {
//    Queue::addToQueque('sydneytoday_zufang_post', 'craw a zufang post', 'sydneytoday_post_craw', array('url' => $url));
//  }
//}