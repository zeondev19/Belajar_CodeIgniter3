<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Change Password</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<h2>Change Password</h2>
		<?php echo form_open('dashboard/change_password'); ?>

		<?php if (validation_errors()): ?>
			<div class="alert alert-danger">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('error')): ?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php endif; ?>

		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		<?php endif; ?>

		<div class="mb-3">
			<label for="current_password" class="form-label">Current Password</label>
			<input type="password" class="form-control" id="current_password" name="current_password">
		</div>

		<div class="mb-3">
			<label for="new_password" class="form-label">New Password</label>
			<input type="password" class="form-control" id="new_password" name="new_password">
		</div>

		<div class="mb-3">
			<label for="confirm_password" class="form-label">Confirm New Password</label>
			<input type="password" class="form-control" id="confirm_password" name="confirm_password">
		</div>

		<button type="submit" class="btn btn-primary">Change Password</button>

		<?php echo form_close(); ?>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>