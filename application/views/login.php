<?php $this->load->view("common.php");
 $usr_mob_no = get_cookie('phone_no') ?? '';
?>
	<!--begin::Body-->
	<body id="kt_body" class="auth-bg bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
        <!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!--End::Google Tag Manager (noscript) -->
        
        <!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page bg image-->
			<style>
			    body {
			        background-image: url('<?php echo base_url()?>assets/Images/login_bg.png');
			    }
			    .txt_shadow{
			    	text-shadow: 2px 2px 4px #000000;
			    }
			    .login_own {
				    background: rgba(255, 255, 255, 0.2);
				    border-radius: 16px;
				    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
				    backdrop-filter: blur(12px);
				    -webkit-backdrop-filter: blur(2.5px);
				    border: 1px solid rgba(255, 255, 255, 0.3);
				  }
			    @media (max-width: 991.98px) {
			    	.logo-default {
				        display: none;
				    }
			    }
			</style>
			<!--end::Page bg image-->

			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column justify-content-center">
				<div class="d-flex flex-wrap">
					<div class="d-flex flex-lg-row-auto w-100 top-50 position-relative justify-content-center p-12 pt-0">
				        <!--begin::Card-->
				        <div class="d-flex flex-column align-items-stretch flex-center rounded-4 w-md-500px p-10 login_own">
				            <!--begin::Wrapper-->
				            <div class="d-flex flex-center flex-column flex-column-fluid">
								<!--begin::Form-->
								<div class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework">
								    <!--begin::Heading-->
								    <div class="text-center">
								        <!--begin::Title-->
								        <h1 class="text-black fw-bold fs-2hx mb-6">Subscriber</h1>
								        <!--end::Title-->
								    </div>
								    <!--begin::Heading-->

								    <!--begin::Input group--->
								    <div class="fv-row mb-6 fv-plugins-icon-container">
								        <label class="col-form-label fw-bold fs-5 text-black">Mobile No</label>
								        <input type="text" placeholder="Enter Mobile No" tabIndex="1" name="user_mobile" id="user_mobile" autocomplete="off" class="form-control" maxlength="10" value="<?php echo $usr_mob_no ?? ''?>" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> 
								    	<div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
								    </div>  
								    <!--begin::Submit button-->
								    <div class="d-grid mb-4 pt-4">
								    	<button type="button" id="sign_in" onclick="login_validation()" class="btn btn-primary">Verify</button>
								    </div>
									<div class="row d-flex justify-content-center align-items-center mt-6 text-dark fw-bolder mb-3 fs-5">
										<div id="err" class="help-block" style="color:red;   text-align: center;"></div>
										<div id="success" class="help-block" style="color:green; text-align: center;"></div>
									</div>
								    <!-- <div class="text-center pt-4">
									    <div class="badge badge-success fs-6 fw-semibold px-6">Mobile No Verified Successfully...</div>
									</div>
									<div class="text-center pt-4">
									    <div class="badge badge-danger fs-6 fw-semibold px-6" style="background-color:red !important;">Mobile No Wrong</div>
									</div> -->
								    <!--end::Submit button-->
								</div>
								<!--end::Form-->     

				            </div>
				            <!--end::Wrapper-->
				        </div>
				        <!--end::Card-->
				    </div>
			    </div>
			    <!--begin::Body-->
			    
			    <!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->	
		</div>
		<!--end::Root-->
		<!--end::Main-->

        
        <!--begin::Javascript-->
        <?php $this->load->view("script.php"); ?>
		<!--end::Javascript-->

		<script>
			function login_validation() {
				// alert("hi");
				var baseurl = '<?php echo base_url(); ?>';
				var user_mobile = $("#user_mobile").val();
				

				$.ajax({
					type: "POST",
					url: baseurl + 'Login/login_check',
					data: {
						mobile: user_mobile,
					},
					async: false,
					cache: false,
					beforeSend: function() {
						$('div#err').text('');
					},
					success: function(res) {
						var res = JSON.parse(res);
						if (res.response == 1) {
							$('div#err').show().text('Please Enter Mobile No!');
							$('#user_mobile').addClass('shakeing').focus();
							return false;
						}  else if (res.response == 4) {
							$('div#err').show().text('User Role Inactive');
							$('#user_mobile').focus();
							return false;
						} else if (res.response == 0) {
							$('div#err').show().text('Invalid Mobile No ');
							$('#user_mobile').addClass('shakeing');
							return false;
						} else if (res.response == 9) {
							$('#err').html(
								'<span>Your account is inactive please contact<div class="px-16 ms-16"> administrator </div></span>'
							);
							$('#user_mobile').focus();
							return false;
						} else if (res.response == 10) {
							$('#err').html(
								'<span>Your account is already in use.. Try again</span>'
							);
							Swal.fire({
								title: 'Warning!',
								text:  'Your account is already in use.. Try again!',
								icon: 'warning',
								confirmButtonText: 'Okay'
							});
					
							$('#user_mobile').val('');
							$('#user_mobile').focus();
							return false;
						} else if (res.response == 8) {
							$('div#err').text('');
							$('div#success').text('Mobile No Verified Successfully...');
							window.location = baseurl + 'Login/verify_otp';
						} else {
							$('div#err').show().text('Invalid Username / Password');
							$('#user_mobile').focus();
							return false;
						}
					}
				});
				setTimeout(function() {
					$('#user_mobile').removeClass('shakeing');
				}, 1000);
			}
		</script>

	<script type="text/javascript">
		$(document).on('keydown', 'input,select', function(e) {
			if (event.which == 13) {
					event.preventDefault();
					var $this = $(e.target);

					var index = parseFloat($this.attr('tabIndex'));

					$('[tabIndex="' + (index + 1).toString() + '"]').focus();
				   if(index == 1){
							login_validation();
					}
			   }

		});
	</script>
    
    
		<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg>
	</body>
	<!--end::Body-->
</html>
