<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.min-1.8.2.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap.min.css">
	<title></title>
</head>
<body>
	<div class="container">
		<?php if ($this->session->userdata('user_id')): ?>
			<div class="clearfix">
				<a href="<?php echo site_url('authenticate/logout') ?>" class="btn btn-primary btn-small pull-right" style="margin-top: 10px; margin-bottom: 10px">Logout</a>
			</div>
			<br>
		<?php endif ?>
		
		<?php echo $template['body']; ?>
	</div>
</body>
</html>