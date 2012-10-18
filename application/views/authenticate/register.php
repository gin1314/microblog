<style type="text/css">
  .help-block { font-size: 11px}
</style>
<form action="<?php echo site_url('authenticate/register') ?>" class="form-horizontal" method="post" id="add-post-form">
  <fieldset>
   <legend style="float:left">Register</legend>
    <div class="clearfix">
      <?php //if ( validation_errors() != "" ): ?>
        <div class="alert" id="validation-errors" style="display:none">

        </div>
      <?php //endif ?>
      
      <div class="control-group">
        <label class="control-label" for="name">Email*</label>
        <div class="controls">
          <input class="input-xlarge focused" name="email" type="text" value="<?php echo set_value('email') ?>">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="name">Password*</label>
        <div class="controls">
          <input class="input-xlarge focused" name="password" type="password" value="<?php echo set_value('password') ?>">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="name">Confirm Password*</label>
        <div class="controls">
          <input class="input-xlarge focused" name="conf_password" type="password" value="<?php echo set_value('conf_password') ?>">
        </div>
      </div>          

      <div class="control-group">
        <label class="control-label" for="name">First Name*</label>
        <div class="controls">
          <input class="input-xlarge focused" name="first_name" type="text" value="<?php echo set_value('first_name') ?>">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="name">Last Name*</label>
        <div class="controls">
          <input class="input-xlarge focused" name="last_name" type="text" value="<?php echo set_value('last_name') ?>">
        </div>
      </div>

    </div>
  </fieldset>
  <a class="btn btn-primary btn-small" id="submit-form">Submit</a>
</form>

<script type="text/javascript">
  $(function () {
     $('#submit-form').on('click', function (e) {
        e.preventDefault();
        
        $('.control-group').removeClass('error');
        $('.control-group').find('.help-block').remove();

        $.ajax({
            url: '<?php echo site_url('authenticate/register') ?>',
            data: $('#add-post-form').serialize(),
            type: 'post',
            dataType: 'json',
            success: function (data) {
                  console.log(data);
                  if (data && data.status === true) {
                      window.location = '<?php echo site_url('post') ?>';
                  };
                  
                  for (var i = 0; i < data.msg.length; i++) {
                     console.log(data.msg[i]);
                     if (data.msg[i].error !== "") {
                          var $ctrl_grp = $("input[name=" + data.msg[i].id + "]").parent().parent();

                          $ctrl_grp.addClass('error');
                          var $span_err = $("<span class='help-block'>");
                          $span_err.append(data.msg[i].error);
                          $ctrl_grp.find('.controls').append( $span_err );

                     };
                  };

                  if (data && data.error === true) {
                      $("#validation-errors").html(data.message).fadeIn('slow');
                  } else {

                  }
            }
        });
     });
  })  
</script>