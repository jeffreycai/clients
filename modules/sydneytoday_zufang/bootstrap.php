<?php



// register admin
$user = User::getInstance();
if (is_backend() && $user->isLogin()) {
  Backend::registerSideNav(
  '
  <li>
    <a href="#"><i class="fa fa-folder-open"></i> '.i18n(array('en' => 'Sydneytoday Zufang','zh' => '今日悉尼 - 租房',)).'<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
      <li><a href="'.uri('admin/sydneytoday_zufang/list').'">'.i18n(array(
          'en' => 'List',
          'zh' => '列表'
      )).'</a></li>
      <li><a href="'.uri('admin/sydneytoday_zufang/create').'">'.i18n(array(
          'en' => 'Create',
          'zh' => '创建'
      )).'</a></li>
      <li><a href="'.uri('admin/sydneytoday_zufang/import/list').'">'.i18n(array(
          'en' => 'Import to client',
          'zh' => '导入到客户'
      )).'</a></li>
    </ul>
  </li>
  '        
  );
}