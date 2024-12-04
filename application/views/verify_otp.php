<?php $this->load->view("common.php"); ?>
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
			<?php $mobile_no = $this->session->userdata('phone_no');  ?>
			<?php $otp = $this->session->userdata('otp');  ?>

			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column justify-content-center">
				<div class="d-flex flex-wrap">
					<div class="d-flex flex-lg-row-auto w-100 top-25 position-relative justify-content-center p-12 pt-0">
				        <!--begin::Card-->
				        <div class="d-flex flex-column align-items-stretch flex-center rounded-4 w-md-500px p-10 login_own">
				            <!--begin::Wrapper-->
				            <div class="d-flex flex-center flex-column flex-column-fluid">
								<!--begin::Form-->
								<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" id="kt_sing_in_two_factor_form" autocomplete="off">
								    <!--begin::Heading-->
								    <div class="text-center">
								        <!--begin::Title-->
								        <h1 class="text-black fw-bold fs-2hx mb-6">Subscriber</h1>
								        <!--end::Title-->
								    </div>
								    <!--begin::Heading-->

								    <!--begin::Input group--->
								    <div class="fv-row mb-2 fv-plugins-icon-container">
								        <label class="mb-1 fw-bold fs-3 text-black">We Sent a Verification Code to Your Mobile No.</label>
								        <div class="d-block text-center">
								        	<label class="badge badge-success text-center fw-bold text-white fs-3"><?php echo $mobile_no; ?></label>
											<input type="hidden" id="user_mobile" name="mobile_no" value="<?php echo $mobile_no; ?>" />	
											<label for="" class = "text-black"><?php echo $otp; ?> </label>
								        </div>
								    </div>
								    <!--begin::Wrapper-->
								    <div class="mb-4 mt-4 d-flex justify-content-between">
							          <div class="float-start">
							          	<label class="fw-semibold text-black fs-6">Enter your 6 digit security code</label>
							          </div>
							          <div class="float-end mb-1">
							          	<label class="badge badge-warning text-black w-38px text-center rounded fs-6 fw-bold" id="otp_timer"></label>
							          </div>
							        </div>
								    <div class="mb-4">
										<div class="d-flex flex-wrap flex-stack">
											<input type="text" id="code_1" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center text-black mx-1 my-2" oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');" value="" autofocus/>
											<input type="text" id="code_2" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center text-black mx-1 my-2" oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');" value="" />
											<input type="text" id="code_3" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center text-black mx-1 my-2" oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');" value="" />
											<input type="text" id="code_4" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center text-black mx-1 my-2" oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');" value="" />
											<input type="text" id="code_5" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center text-black mx-1 my-2" oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');" value="" />
											<input type="text" id="code_6" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center text-black mx-1 my-2" oninput="this.value = this.value.replace(/[^0-9. ]/g, '').replace(/(\..*)\./g, '$1');" value="" />
										</div>
										<div class="text-danger mt-2" id="code_trans_err"></div>
									</div>
							        <div class="text-center mb-3 fw-semibold text-dark" id="resd_otp_link" style="display: none !important;"><span class="text-black fs-5">Didn't get the code?</span>
							        	<a href="javascript:;" class="badge badge-secondary text-black fw-bold fs-5" id="resend_link" onclick="resend_otp_func();">Resend</a>
							        </div>
								    <!--end::Wrapper-->    
								    <!--begin::Submit button-->
								    <div class="d-flex align-items-center flex-lg-row flex-column mb-4 pt-4 gap-3">
								    	<a href="<?php echo base_url(); ?>Login" class="btn btn-primary w-lg-50 w-100">Change Mobile No</a>
								    	<button type="button" class="btn btn-primary w-lg-50 w-100" id="verify_otp" onclick="otp_password_validation()">Verify</button>
										<!-- <a href="< ?php echo base_url(); ?>Dashboard" class="btn btn-primary" id="verify_otp" onclick="verify_otp_func();">Verify</a> -->
								    </div>
									<div class="row d-flex justify-content-center align-items-center mt-6 text-dark fw-bolder mb-3 fs-5">
										<div id="err" class="help-block" style="color:red;   text-align: center;"></div>
										<div id="success" class="help-block " style="color:green; text-align: center;"></div>
									</div>
								    <!-- <div class="text-center pt-4">
									    <div class="badge badge-success fs-6 fw-semibold px-6" style="display:none">Login Successfully...</div>
									</div> -->
									 <!-- <div class="text-center pt-4">
									    <div class="badge badge-danger fs-6 fw-semibold px-6" style="background-color:red !important;">Username & Password Wrong</div>
									</div> -->
								    <!--end::Submit button-->
								</form>
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
        <script>
		  function resend_otp_func() {
		    document.getElementById("resd_otp_link").setAttribute('style', 'display:none !important');
		    document.getElementById("otp_timer").setAttribute('style', 'display:inline !important');
		    start_timer();
		  }
		  // function resend_otp_func()
		  // {
		  // 	document.getElementById("otp_timer").setAttribute('style', 'display:inline !important');
		  // 	start_timer();
		  // }
		</script>
        <script>
		  var refreshIntervalId;

		  function startTimer(duration, display) {
		    var start = Date.now(),
		      diff, hours, minutes, seconds;

		    function timer() {
		      diff = duration - (((Date.now() - start) / 1000) | 0);
		      hours = (diff / 3600) | 0;
		      minutes = ((diff % 3600) / 60) | 0;
		      seconds = (diff % 60) | 0;

		      hours = hours < 10 ? "0" + hours : hours;
		      minutes = minutes < 10 ? "0" + minutes : minutes;
		      seconds = seconds < 10 ? "0" + seconds : seconds;

		      // display.textContent = hours + ":" + minutes + ":" + seconds;
		      // display.textContent = minutes + ":" + seconds;
		      display.textContent = seconds + " s";

		      if (diff <= 0) {
		        start = Date.now() + 1000;
		        clearInterval(refreshIntervalId);
		        setTimeout(function() {
		          $("#otp_timer").fadeOut("slow");
		          document.getElementById("resd_otp_link").setAttribute('style', 'display:block !important');
		        }, 1000);

		      }
		    };
		    timer();
		    refreshIntervalId = setInterval(timer, 1000);
		    // clearInterval(refreshIntervalId);
		  }

		  function start_timer() {
		    // window.onload = function() {
		    // var timing = 60 * 60 * 5, // ( 60 seconds * 60 minutes * 5 hours )in seconds
		    var timing = 5 * 1, // ( 60 seconds * 60 minutes * 5 hours )in seconds
		      display = document.querySelector('#otp_timer');
		    startTimer(timing, display);
		  };
		  window.onload = function() {
		    // var timing = 60 * 60 * 5, // ( 60 seconds * 60 minutes * 5 hours )in seconds
		    var timing = 5 * 1, // ( 60 seconds * 60 minutes * 5 hours )in seconds
		      display = document.querySelector('#otp_timer');
		    startTimer(timing, display);
		  };
		</script>
		<script>
        	"use strict";
			var KTSigninTwoFactor = function() {
				var t, e;
				return {
					init: function() {
						var n, i, o, u, r, c;
						t = document.querySelector("#kt_sing_in_two_factor_form");
						n = t.querySelector("[name=code_1]"), i = t.querySelector("[name=code_2]"), o = t.querySelector("[name=code_3]"), u = t.querySelector("[name=code_4]"), r = t.querySelector("[name=code_5]"), c = t.querySelector("[name=code_6]"), n.focus(), n.addEventListener("keyup", (function() {
							1 === this.value.length && i.focus()
						})), i.addEventListener("keyup", (function() {
							1 === this.value.length && o.focus()
						})), o.addEventListener("keyup", (function() {
							1 === this.value.length && u.focus()
						})), u.addEventListener("keyup", (function() {
							1 === this.value.length && r.focus()
						})), r.addEventListener("keyup", (function() {
							1 === this.value.length && c.focus()
						})), c.addEventListener("keyup", (function() {
							1 === this.value.length && c.blur()
						}))
					}
				}
			}();
			KTUtil.onDOMContentLoaded((function() {
				KTSigninTwoFactor.init()
			}));
        </script>

		<script>
			function otp_password_validation() {

				var baseurl = '<?php echo base_url(); ?>';
				var user_mobile = $("#user_mobile").val();
				var err = 0;
				var codes = [
					$('#code_1').val(),
					$('#code_2').val(),
					$('#code_3').val(),
					$('#code_4').val(),
					$('#code_5').val(),
					$('#code_6').val()
				];
				var errorMessage = '';

				// Clear previous error message
				$('#code_trans_err').html('');

				// Check if any of the fields are empty and build the error message
				codes.forEach((code, index) => {
					if (code === '') {
						if(err==0){
						errorMessage += 'Code ' + (index + 1) + ' is required.<br>';
						$('#code_' + (index + 1)).focus();
						err++;
						}
					}
				});

				var verify = codes.join('');

				if (err > 0) {
					$('#code_trans_err').html(errorMessage);
				}else if(err==0){
					$.ajax({
						type: "POST",
						url: baseurl + 'Login/verify_otp_check',
						data: {
							mobile: user_mobile,
							otp: verify,
						},
						async: false,
						cache: false,
						beforeSend: function() {
							$('div#err').text('');
						},
						success: function(res) {
							var res = JSON.parse(res);
							console.log(res)
							if (res.response == 0) {
								$('div#err').show().text('The Entered OTP is incorrect.!');
								$('#code_6').focus();
								return false;
							}else if (res.response == 1) {
								$('div#err').text('');
								$('div#success').text('Login Successfully...');
								window.location = baseurl + 'Dashboard';
							}
						} 
					});

				}
			}
		</script>
		<!--end::Javascript-->
    
    
		<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg>
	</body>
	<!--end::Body-->
</html>
