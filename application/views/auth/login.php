<?php $this->load->view('head.inc');?>

<style>

	.main-footer {
    background-color: #fff0 !important; 
    border-top: 1px solid #dee2e6;
    color: #000 !important;
    padding: 1rem;
    margin-left: 5px !important;
    }

	.login-page, .register-page {
   
    background-color: #fd7e14;
    
	}

	.main-footer a{
    color: #ffffff !important;
    text-decoration: none;
    background-color: transparent;
	}


</style>

<!--



<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>



<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>

-->

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src ="<?php echo base_url('assets/images/logo_black.png'); ?>" ?>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Welcome to Tenent</p>

				<div style="color: #ff0000; id="infoMessage"><?php echo $message;?></div>

				<?php echo form_open("auth/login");?>
                    <div class="input-group mb-3">
                        <input type="email" name="identity" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-mobile"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
				<?php echo form_close();?>
               

                <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="#" class="text-center">New Tenant??</a>
                </p>
            </div>

        </div>
    </div>





<?php $this->load->view('footer.inc');?>