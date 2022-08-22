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
        <section class="mx-auto my-5" style="max-width: 28rem;">

            <div class="card border-primary border-gradient">
                <div class=" card-header bg-secondary bg-gradient bg-opacity-75">
                    <h5 class="card-title fw-bold mb-2 text-center">Admin Register</h5>
                </div>
                <div class="card-body mt-2">
                    <div class="mssg mb-0"></div>
                    <form method="POST" action="<?= site_url('reg'); ?>">

                        <div class="form-outline mb-4">
                            <div class="row align-items-center">
                                <div class="col">
                                    <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" />
                                    <span class="text-danger"><?php echo form_error('fname'); ?></span>
                                </div>
                                <div class="col">
                                    <input type="text" id="mname" name="mname" class="form-control" placeholder="Middle Name" />
                                    <span class="text-danger"><?php echo form_error('mname'); ?></span>

                                </div>
                                <div class="col">
                                    <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" />
                                    <span class="text-danger"><?php echo form_error('lname'); ?></span>

                                </div>
                            </div>

                        </div>



                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" />
                            <span class="text-danger"><?php echo form_error('email'); ?></span>

                        </div>


                        <div class="form-outline mb-4">
                            <input type="text" id="phone" name="phone" class="form-control" pattern="[0-9]{10}" placeholder="Phone Number" />
                            <div id="pno" class="form-text">The phone number should be valid 10 digits. eg 1234567890</div>
                            <span class="text-danger"><?php echo form_error('phone'); ?></span>

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                            <span class="text-danger"><?php echo form_error('password'); ?></span>

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="repass" name="repass" class="form-control" placeholder="Re-type Password" />
                            <span class="text-danger"><?php echo form_error('repass'); ?></span>

                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-left">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form2Example34" required />
                                    <label class="form-check-label" for="form2Example34"> I accept all the rules and regulations </label>
                                </div>
                            </div>


                        </div>

                        <!-- Submit button -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-block mb-4 ">Sign Up</button>

                            </div>
                        </div>
                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Already a member? <a href="<?= site_url('/'); ?>">Login</a></p>
                        </div>
                    </form>

                </div>
            </div>

        </section>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
    // $('#test').hide();
setTimeout(function(){
    $('.text-danger').hide();
},4000);
});
</script>

</html>