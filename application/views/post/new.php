<form action="<?php echo site_url('post/add') ?>" class="form-horizontal" method="post" id="add-car-form">
  <fieldset>
   <legend style="float:left">New Post</legend>
    <div class="clearfix">
      <?php if ( validation_errors() != ""): ?>
        <div class="alert">
            <?php echo validation_errors(); ?>
        </div>
      <?php endif ?>
      <div class="control-group">
        <label class="control-label" for="addtl_specs">Comment</label>
        <div class="controls">
           <textarea name="message" cols="50" rows="5" class="span3"></textarea>
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
        $('#add-car-form').submit();
     });
  })
</script>