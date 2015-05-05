

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?php i18n_echo(array('en' => 'Sydneytoday Zufang','zh' => '今日悉尼 - 租房',)); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array('en' => 'Import to Client', 'zh' => '导入成客户')) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
        <?php foreach ($clients as $client): ?>
          <div class="col-sm-6 col-md-4 col-lg-3" id="sydneytoday_zufang_<?php echo $client->getId() ?>">
            <div class="thumbnail">
              <form action="<?php echo uri('admin/sydneytoday_zufang/import/update/'.$client->getId()) ?>" method="POST">
                <?php if (!empty($client->getPhoneImg())): ?>
                  <label>&nbsp;&nbsp;&nbsp;<?php echo $client->getPhoneImg(); ?></label>
                  <input class="form-control" type="text" name="phone" placeholder="phone" value="<?php echo $client->getPhone() ?>" required="required" />
                <?php endif; ?>
                <?php if (!empty($client->getMobileImg())): ?>
                  <label>&nbsp;&nbsp;&nbsp;<?php echo $client->getMobileImg(); ?></label>
                  <input class="form-control" type="text" name="mobile" placeholder="mobile" value="<?php echo $client->getMobile() ?>" required="required" />
                <?php endif; ?>
                <?php if (!empty($client->getEmailImg())): ?>
                  <label>&nbsp;&nbsp;&nbsp;<?php echo $client->getEmailImg(); ?></label>
                  <input class="form-control" type="email" name="email" placeholder="email" value="<?php echo $client->getEmail() ?>" required="required" />
                <?php endif; ?>
                <label>地址</label>
                <input class="form-control" type="text" name="address" placeholder="address" value="<?php echo htmlentities(str_replace('"', '\"', $client->getAddress())) ?>" />
                <label>微信</label>
                <input class="form-control" type="text" name="wechat" placeholder="wechat" value="<?php echo html_entity_decode(str_replace('"', '\"', $client->getWechat())) ?>" />
                <br />
                <button class="btn btn-primary client-import">Import</button>
                <button class="skip btn btn-default" class="btn btn-default" data-url="<?php echo uri('admin/sydneytoday_zufang/import/skip/'.$client->getId()) ?>">Skip</button>
              </form>
              <br />
              <p style="font-size: 1em; background-color: #EEE; padding:2px;"><?php echo $client->getClientComment() ?></p>
            </div>
          </div>
        <?php endforeach; ?>
          
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(".client-import").click(function(event){
    event.preventDefault();
    $(this).html("<i class='fa fa-spin fa-spinner'></i>").prop("disabled", true);
    
    var form = $(this).parents("form").first();
    var url = form.attr('action');
    $.post(
      url, 
      form.serialize(),
      function(data){
        if (data.status == 'success') {
          $("#" + data.id).fadeOut();
        } else {
          alert(data.message);
          $("#" + data.id + " .client-import").html("Import").prop("disabled", false);
        }
    }, 'json');
  });
  $(".skip").click(function(event){
    event.preventDefault();
    $(this).html("<i class='fa fa-spin fa-spinner'></i>").prop("disabled", true);
    var url = $(this).data('url');

    $.get(
      url, 
      function(data){
        if (data.status == 'success') {
          $("#" + data.id).fadeOut();
        } else {
          alert(data.message);
          $("#" + data.id + " .skip").html("Skip").prop("disabled", false);
        }
    }, 'json');
  });
</script>