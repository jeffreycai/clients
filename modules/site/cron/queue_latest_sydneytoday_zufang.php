<?php
require __DIR__ . "/../../../bootstrap.php";

// queue tasks to craw list pages
for ($page = 1; $page <= 20; $page++) {
  Queue::addToQueque('sydneytoday_zufang_post_list', 'craw a zufang post list', 'sydneytoday_post_list_craw', array('page' => $page, 'priority' => Queue::PRIORITY_MEDIUM), Queue::PRIORITY_HIGH);
}
echo 'done';