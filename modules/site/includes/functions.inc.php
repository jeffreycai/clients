<?php

function sydneytoday_post_craw($arg) {
  $url = $arg['url']; // http://www.sydneytoday.com/bencandy.php?fid=12&id=277752
  $crawler = new Crawler();
  $html = $crawler->read($url);

  if ($html == false) {
    throw new Exception("Fail to get content from url: $url");
  } else {
    // get post_id
    $matches = array();
    preg_match('/&id=(\d+)/', $url, $matches);
    $post_id = $matches[1];
    
    // see if we've crawed this already
    $client = SydneytodayZufang::findByPostId($post_id);
    if ($client) {
      return true;
    } else {
      $client = new SydneytodayZufang();
    }
    
    // get other info
    $name = get_value_form_post_page($html, "联 系 人");
    $phone_img = get_value_form_post_page($html, "电话号码");
    $mobile_img = get_value_form_post_page($html, "手机号码");
    $qq = get_value_form_post_page($html, "Q Q 号码");
    $email_img = get_value_form_post_page($html, "电子邮箱");
    $vendor_type = get_value_form_post_page($html, "交易性质");
    $rental_type = get_value_form_post_page($html, "出租方式");
    $price = get_value_form_post_page($html, "出租租金");
    $property_type = get_value_form_post_page($html, "房屋户型");
    $suburb = get_suburb_from_post_page($html);
    $address = get_value_form_post_page($html, "具体地址");
    $client_comment = get_client_comment_from_post_page($html);
    $property_images = get_images_from_post_page($html);

//      echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head>";
//      echo($mobile);
//      die("</html>");
    

    $client->setName($name);
    $client->setPhoneImg($phone_img);
    $client->setMobileImg($mobile_img);
    $client->setQq($qq);
    $client->setEmailImg($email_img);
    $client->setVendorType($vendor_type);
    $client->setRentalType($rental_type);
    $client->setPrice($price);
    $client->setPropertyType($property_type);
    $client->setSuburb($suburb);
    $client->setAddress($address);
    $client->setClientComment($client_comment);
    $client->setPropertyImages($property_images);
    $client->setPostId($post_id);
    if ($client->save()) {
      return true;
    } else {
      new Exception("Failed to save client");
    }
    
    

  }
}

function get_value_form_post_page($html, $title) {
  $matches = array();
  $pattern = iconv('utf-8', 'gb2312', $title);
  $pattern = '>'.$pattern.'<\/td><td(.*?)<\/td';
  preg_match("/$pattern/", $html, $matches);

  if (isset($matches[1])) {
    // strip tags if not img 
    if (strpos($matches[1], 'src=') == false || strpos($matches[1], 'site=qq')) {
      $matches[1] = strip_tags($matches[1]);
    }
    $tokens = explode(">", $matches[1]);
    if (is_array($tokens)) {
      array_shift($tokens);
      $rtn = implode(">", $tokens);
      return iconv('gb2312', 'utf-8', $rtn);
    }
    return null;
  }
}

function get_suburb_from_post_page($html) {
  $matches = array();
  preg_match('/<A id=\'zone_tag\' HREF=\'.*?\'>(.*?)<\/A>/', $html, $matches);
  return isset($matches[1]) ? $matches[1] : null;
}

function get_client_comment_from_post_page($html) {
  $matches = array();
  preg_match('/<div style="padding:5px 32px 10px 32px;color:#555;">(.*?)<\/div>/', $html, $matches);
  if (isset($matches[1])) {
    $rtn = trim($matches[1]);
    return iconv('gb2312', 'utf-8', $rtn);
  }
  return null;
}

function get_images_from_post_page($html) {
  $matches = array();
  preg_match_all('/<a href="(http:\/\/www\.sydneytoday\.com\/upload_files\/fenlei.*?)" rel="shadowbox/', $html, $matches);
  if (isset($matches[1])) {
    return implode("\n", $matches[1]);
  }
  return null;
}


function sydneytoday_post_list_craw($args) {
  $page = $args['page'];
  $priority = isset($args['priority']) ? $args['priority'] : Queue::PRIORITY_LOWEST;
  for ($i = $page; $i < $page+20; $i++) {
    $url = "http://www.sydneytoday.com/list.php?fid=12&page=$i";
    $html = file_get_contents($url);
    $matches = array();
    preg_match_all('/(http:\/\/www\.sydneytoday\.com\/bencandy\.php\?fid=\d+&id=\d+)"> <font color=/', $html, $matches);
    $urls = isset($matches[1]) ? $matches[1] : array();
    foreach ($urls as $url) {
      Queue::addToQueque('sydneytoday_zufang_post', 'craw a zufang post', 'sydneytoday_post_craw', array('url' => $url), $priority);
    }
  }
  return true;
}