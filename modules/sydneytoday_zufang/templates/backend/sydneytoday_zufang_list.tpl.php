

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?php i18n_echo(array('en' => 'Sydneytoday Zufang','zh' => '今日悉尼 - 租房',)); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array('en' => 'List', 'zh' => '列表')) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<table class="table table-striped table-bordered table-hover dataTable no-footer">
  <thead>
      <tr role="row">
                <th>id</th>
                <th>name</th>
                <th>phone_img</th>
                <th>phone</th>
                <th>mobile_img</th>
                <th>mobile</th>
                <th>qq</th>
                <th>email_img</th>
                <th>email</th>
                <th>wechat</th>
                <th>vendor_type</th>
                <th>rental_type</th>
                <th>price</th>
                <th>property_type</th>
                <th>suburb</th>
                <th>address</th>
                <th>client_comment</th>
                <th>property_images</th>
                <th>post_id</th>
                <th>comment</th>
                <th>cleaned</th>
                <th>Actions</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($objects as $object): ?>
    <tr>
            <td><?php echo $object->getId() ?></td>
            <td><?php echo $object->getName() ?></td>
            <td><?php echo $object->getPhoneImg() ?></td>
            <td><?php echo $object->getPhone() ?></td>
            <td><?php echo $object->getMobileImg() ?></td>
            <td><?php echo $object->getMobile() ?></td>
            <td><?php echo $object->getQq() ?></td>
            <td><?php echo $object->getEmailImg() ?></td>
            <td><?php echo $object->getEmail() ?></td>
            <td><?php echo $object->getWechat() ?></td>
            <td><?php echo $object->getVendorType() ?></td>
            <td><?php echo $object->getRentalType() ?></td>
            <td><?php echo $object->getPrice() ?></td>
            <td><?php echo $object->getPropertyType() ?></td>
            <td><?php echo $object->getSuburb() ?></td>
            <td><?php echo $object->getAddress() ?></td>
            <td><?php echo $object->getClientComment() ?></td>
            <td><?php echo $object->getPropertyImages() ?></td>
            <td><?php echo $object->getPostId() ?></td>
            <td><?php echo $object->getComment() ?></td>
            <td><?php echo $object->getCleaned() ?></td>
            <td>
        <div class="btn-group">
          <a class="btn btn-default btn-sm" href="<?php echo uri('admin/sydneytoday_zufang/edit/' . $object->getId()); ?>"><i class="fa fa-edit"></i></a>
          <a onclick="return confirm('<?php echo i18n(array('en' => 'Are you sure to delete this record ?', 'zh' => '你确定删除这条记录吗 ?')); ?>');" class="btn btn-default btn-sm" href="<?php echo uri('admin/sydneytoday_zufang/delete/' . $object->getId(), false); ?>"><i class="fa fa-remove"></i></a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div class="row">
  <div class="col-sm-12" style="text-align: right;">
  <?php i18n_echo(array(
      'en' => 'Showing ' . $start_entry . ' to ' . $end_entry . ' of ' . $total . ' entries', 
      'zh' => '显示' . $start_entry . '到' . $end_entry . '条记录，共' . $total . '条记录',
  )); ?>
  </div>
  <div class="col-sm-12" style="text-align: right;">
  <?php echo $pager; ?>
  </div>
</div>
          
        </div>
      </div>
    </div>
  </div>
</div>