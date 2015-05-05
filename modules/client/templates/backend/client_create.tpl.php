<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Client',
        'zh' => '客户',
      )); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array(
            'en' => 'Create', 
            'zh' => '创建'
        )) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<form role="form" method="POST" action="<?php echo uri('admin/client/create') ?>">
  
<div class='form-group'>
  <label for='name'>name</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['name']) ? strip_tags($_POST['name']) : '') : $object->getName()))) ?>' type='text' class='form-control' id='name' name='name' />
</div>
  
<div class='form-group'>
  <label for='phone'>phone</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['phone']) ? strip_tags($_POST['phone']) : '') : $object->getPhone()))) ?>' type='text' class='form-control' id='phone' name='phone' />
</div>
  
<div class='form-group'>
  <label for='mobile'>mobile</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['mobile']) ? strip_tags($_POST['mobile']) : '') : $object->getMobile()))) ?>' type='text' class='form-control' id='mobile' name='mobile' />
</div>
  
<div class='form-group'>
  <label for='wechat'>wechat</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['wechat']) ? strip_tags($_POST['wechat']) : '') : $object->getWechat()))) ?>' type='text' class='form-control' id='wechat' name='wechat' />
</div>
  
<div class='form-group'>
  <label for='qq'>qq</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['qq']) ? strip_tags($_POST['qq']) : '') : $object->getQq()))) ?>' type='text' class='form-control' id='qq' name='qq' />
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
  <label for='address'>address</label>
  <textarea class='form-control' rows='5' id='address' name='address'><?php echo ($object->isNew() ? (isset($_POST['address']) ? htmlentities($_POST['address']) : '') : htmlentities($object->getAddress())) ?></textarea>
</div>
  
<div class='form-group'>
  <label for='comment'>comment</label>
  <textarea class='form-control' rows='5' id='comment' name='comment'><?php echo ($object->isNew() ? (isset($_POST['comment']) ? htmlentities($_POST['comment']) : '') : htmlentities($object->getComment())) ?></textarea>
</div>

<script type='text/javascript' src='/libraries/ckeditor/ckeditor.js'></script>
<script type='text/javascript'>CKEDITOR.replace('comment');</script>  
<div class='checkbox'>
  <label>
    <input type='checkbox' <?php echo ($object->isNew() ? (isset($_POST['stared']) ? ($_POST['stared'] ? 'checked="checked"' : '') : '') : ($object->getStared() ? "checked='checked'" : "")) ?> id='stared' name='stared' value='1' /> stared
  </label>
</div>

  <input type="submit" name="submit" value="<?php i18n_echo(array(
      'en' => 'Create', 
      'zh' => '创建'
  )) ?>" class="btn btn-default">
</form>
          
        </div>
      </div>
    </div>
  </div>
</div>

