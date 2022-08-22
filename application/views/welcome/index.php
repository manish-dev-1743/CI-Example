<!DOCTYPE html>
<html>

<head>
	<title>Admin Login</title>


	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<style>
		body {
			background-color: #eec0c6;
			background-image: linear-gradient(315deg, #eec0c6 0%, #7ee8fa 100%);
			background-repeat: no-repeat;
			background-size: auto;
		}
	</style>
</head>

<body>
	<div class="container mt-5 pt-5 ">
		<section class="mx-auto my-5" style="max-width: 23rem;">

			<div class="card border-primary border-gradient">
				<div class=" card-header bg-secondary bg-gradient bg-opacity-75">
					<h5 class="card-title fw-bold mb-2 text-center">Admin Login</h5>
				</div>
				<div class="card-body mt-2">
					<div class="mssg mb-0"></div>
					<form action="<?= site_url('login') ?>" method="POST">
						<!-- Email input -->
						<div class="form-outline mb-4">
						<span class="text-danger"><?= $this->session->flashdata('login_error'); ?></span>
							<input type="email" id="email" name="email" class="form-control" placeholder="Email Address" />
							<span class="text-danger"><?= form_error('email'); ?></span>

						</div>

						<!-- Password input -->
						<div class="form-outline mb-4">
							<input type="password" id="password" name="password" class="form-control" placeholder="Password" />
							<span class="text-danger"><?= form_error('password'); ?></span>

						</div>

						<!-- 2 column grid layout for inline styling -->
						<div class="row mb-4">
							<div class="col d-flex justify-content-center">
								<!-- Checkbox -->
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="form2Example34" />
									<label class="form-check-label" for="form2Example34"> Remember me </label>
								</div>
							</div>

							<div class="col">
								<!-- Simple link -->
								<a href="<?= site_url('Welcome/retrieve/' . 'forgotpass'); ?>">Forgot password?</a>
							</div>
						</div>

						<!-- Submit button -->
						<button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

						<!-- Register buttons -->
						<div class="text-center">

							<p>Not a member? <a href="<?= site_url('retrieve/' . 'register'); ?>">Register</a></p>
						</div>
					</form>

				</div>
			</div>

		</section>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$(document).ready(function() {
		// $('#test').hide();
		setTimeout(function() {
			$('.text-danger').hide();
		}, 4000);
	});
</script>

</html>