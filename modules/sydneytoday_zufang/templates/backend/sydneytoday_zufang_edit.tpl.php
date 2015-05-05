<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Sydneytoday Zufang',
        'zh' => '今日悉尼 - 租房',
      )); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array(
            'en' => 'Edit', 
            'zh' => '编辑'
        )) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<form role="form" method="POST" action="<?php echo uri('admin/sydneytoday_zufang/edit/' . $object->getId()) ?>">
  
<div class='form-group'>
  <label for='name'>name</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['name']) ? strip_tags($_POST['name']) : '') : $object->getName()))) ?>' type='text' class='form-control' id='name' name='name' />
</div>
  
<div class='form-group'>
  <label for='phone_img'>phone_img</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['phone_img']) ? strip_tags($_POST['phone_img']) : '') : $object->getPhoneImg()))) ?>' type='text' class='form-control' id='phone_img' name='phone_img' />
</div>
  
<div class='form-group'>
  <label for='phone'>phone</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['phone']) ? strip_tags($_POST['phone']) : '') : $object->getPhone()))) ?>' type='text' class='form-control' id='phone' name='phone' />
</div>
  
<div class='form-group'>
  <label for='mobile_img'>mobile_img</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['mobile_img']) ? strip_tags($_POST['mobile_img']) : '') : $object->getMobileImg()))) ?>' type='text' class='form-control' id='mobile_img' name='mobile_img' />
</div>
  
<div class='form-group'>
  <label for='mobile'>mobile</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['mobile']) ? strip_tags($_POST['mobile']) : '') : $object->getMobile()))) ?>' type='text' class='form-control' id='mobile' name='mobile' />
</div>
  
<div class='form-group'>
  <label for='qq'>qq</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['qq']) ? strip_tags($_POST['qq']) : '') : $object->getQq()))) ?>' type='text' class='form-control' id='qq' name='qq' />
</div>
  
<div class='form-group'>
  <label for='email_img'>email_img</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['email_img']) ? strip_tags($_POST['email_img']) : '') : $object->getEmailImg()))) ?>' type='text' class='form-control' id='email_img' name='email_img' />
</div>
  
<div class='form-group'>
  <label for='email'>email</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['email']) ? strip_tags($_POST['email']) : '') : $object->getEmail()))) ?>' type='email' class='form-control' id='email' name='email' />
</div>
<div class='form-group'>
  <label for='retype_email'><?php echo i18n(array('en' => 'Retype', 'zh' => '再输一次')) ?> email</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', (isset($_POST['retype_email']) ? strip_tags($_POST['retype_email']) : ''))) ?>' type='email' class='form-control' id='retype_email' name='retype_email' />
</div>
  
<div class='form-group'>
  <label for='wechat'>wechat</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['wechat']) ? strip_tags($_POST['wechat']) : '') : $object->getWechat()))) ?>' type='text' class='form-control' id='wechat' name='wechat' />
</div>
  
<div class='form-group'>
  <label for='post_id'>post_id</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['post_id']) ? strip_tags($_POST['post_id']) : '') : $object->getPostId()))) ?>' type='text' class='form-control' id='post_id' name='post_id' required />
</div>
  
<div class='form-group'>
  <label for='vendor_type'>vendor_type</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['vendor_type']) ? strip_tags($_POST['vendor_type']) : '') : $object->getVendorType()))) ?>' type='text' class='form-control' id='vendor_type' name='vendor_type' />
</div>
  
<div class='form-group'>
  <label for='rental_type'>rental_type</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['rental_type']) ? strip_tags($_POST['rental_type']) : '') : $object->getRentalType()))) ?>' type='text' class='form-control' id='rental_type' name='rental_type' />
</div>
  
<div class='form-group'>
  <label for='price'>price</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['price']) ? strip_tags($_POST['price']) : '') : $object->getPrice()))) ?>' type='text' class='form-control' id='price' name='price' />
</div>
  
<div class='form-group'>
  <label for='property_type'>property_type</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['property_type']) ? strip_tags($_POST['property_type']) : '') : $object->getPropertyType()))) ?>' type='text' class='form-control' id='property_type' name='property_type' />
</div>
  
<div class='form-group'>
  <label for='suburb'>suburb</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['suburb']) ? strip_tags($_POST['suburb']) : '') : $object->getSuburb()))) ?>' type='text' class='form-control' id='suburb' name='suburb' />
</div>
  
<div class='form-group'>
  <label for='address'>address</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['address']) ? strip_tags($_POST['address']) : '') : $object->getAddress()))) ?>' type='text' class='form-control' id='address' name='address' />
</div>
  
<div class='form-group'>
  <label for='client_comment'>client_comment</label>
  <textarea class='form-control' rows='5' id='client_comment' name='client_comment'><?php echo ($object->isNew() ? (isset($_POST['client_comment']) ? htmlentities($_POST['client_comment']) : '') : htmlentities($object->getClientComment())) ?></textarea>
</div>
  
<div class='form-group'>
  <label for='property_images'>property_images</label>
  <textarea class='form-control' rows='5' id='property_images' name='property_images'><?php echo ($object->isNew() ? (isset($_POST['property_images']) ? htmlentities($_POST['property_images']) : '') : htmlentities($object->getPropertyImages())) ?></textarea>
</div>
  
<div class='form-group'>
  <label for='comment'>comment</label>
  <textarea class='form-control' rows='5' id='comment' name='comment'><?php echo ($object->isNew() ? (isset($_POST['comment']) ? htmlentities($_POST['comment']) : '') : htmlentities($object->getComment())) ?></textarea>
</div>
  
<div class='checkbox'>
  <label>
    <input type='checkbox' <?php echo ($object->isNew() ? (isset($_POST['cleaned']) ? ($_POST['cleaned'] ? 'checked="checked"' : '') : '') : ($object->getCleaned() ? "checked='checked'" : "")) ?> id='cleaned' name='cleaned' value='1' /> cleaned
  </label>
</div>

  <input type="submit" name="submit" value="<?php i18n_echo(array(
      'en' => 'Edit', 
      'zh' => '编辑'
  )) ?>" class="btn btn-default">
</form>
          
        </div>
      </div>
    </div>
  </div>
</div>

