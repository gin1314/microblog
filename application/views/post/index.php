
<a href="<?php echo site_url('post/add') ?>" class="btn btn-primary btn-small">Create Post</a> <br><br>

<?php foreach ($posts as $key => $value): ?>
	<?php if ( empty($value)): ?>
		<span>asdas</span>
	<?php else: ?>
	<div class="well">
	   <div>
	   	<em class="pull-left">Date posted: <?php echo format_date($value['created_at']) ?></em>
	   	<em class="pull-right">Posted by: <?php echo $value['first_name']; ?></em>
	   </div> <br>

	   <div class="post-body" style="margin-top: 5px; margin-bottom: 5px">
	   	<div class="alert"><?php echo $value['message'] ?></div>
	   </div>

<?php if (in_array((int)$value['post_id'], $this->user->get_user_post_ids($this->user_id)) ): ?>
	<i class="icon-trash"></i>
	<a href="<?php echo site_url("post/delete/{$value['post_id']}") ?>">delete this post</a>
<?php endif ?>
	   
    </div>
	<?php endif; ?>

<?php endforeach ?>
