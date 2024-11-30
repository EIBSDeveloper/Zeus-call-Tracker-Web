<?php $this->load->view("common.php"); ?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled success_animation">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid pt-0" id="kt_wrapper">
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid py-0" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<div class="row g-5 g-xl-10 mb-0 mb-xl-0">
								<!--begin::Col-->
								<div class="col-xxl-12">
									<div class="card bg-transparent border-0 shadow-none">
										<div class="card-body px-6">
											<div class="d-flex flex-center mb-3">
												<a href="javascript:;" class="text-center">
									                <img alt="Logo" src="<?php echo base_url();?>assets/Images/logo_bg.png" class="w-lg-300px h-lg-90px w-200px h-lg-90px">
									            </a>
											</div>
											<!-- <div class="d-flex align-items-center justify-content-center flex-center mb-0">
												<h1 class="fw-bold text-black fs-2hx text-center pb-4 pt-4">Your Package's</h1>
											</div> -->
											<div class="d-grid flex-center">
												<div class="card bg-success h-100 w-lg-350px shadow">
													<div class="card-body pt-2">
														<div class="text-center">
															<svg width="100px" height="100px" viewBox="0 0 1024 1024" class="icon fw-bold" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
																<g id="SVGRepo_bgCarrier" stroke-width="0"/>
																<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
																<g id="SVGRepo_iconCarrier">
																<path d="M511.891456 928.549888c229.548032 0 415.634432-186.0864 415.634432-415.634432C927.525888 283.3664 741.439488 97.28 511.890432 97.28 282.343424 97.28 96.258048 283.3664 96.258048 512.915456c0 229.548032 186.084352 415.634432 415.634432 415.634432" fill="#17C653"/>
																<path d="M436.571136 707.376128l330.3936-330.3936c5.506048-5.507072 8.571904-12.803072 8.633344-20.544512 0.060416-7.85408-2.961408-15.235072-8.511488-20.784128 0.001024-0.012288-0.001024-0.002048-0.001024-0.002048l-0.001024-0.001024c-5.410816-5.409792-12.978176-8.489984-20.687872-8.460288-7.810048 0.032768-15.13984 3.081216-20.640768 8.58112l-309.11488 309.116928-94.99648-94.998528c-5.501952-5.501952-12.833792-8.5504-20.642816-8.58112h-0.115712c-7.69536 0-15.186944 3.08224-20.569088 8.465408-11.360256 11.36128-11.307008 29.899776 0.118784 41.325568l109.924352 109.924352a29.017088 29.017088 0 0 0 4.883456 6.474752c5.658624 5.6576 13.095936 8.482816 20.550656 8.481792a29.31712 29.31712 0 0 0 20.77696-8.604672M511.891456 97.28C282.3424 97.28 96.256 283.3664 96.256 512.915456s186.0864 415.634432 415.635456 415.634432c229.548032 0 415.634432-186.085376 415.634432-415.634432C927.525888 283.365376 741.439488 97.28 511.891456 97.28m0 40.96c50.597888 0 99.661824 9.901056 145.82784 29.427712 44.61056 18.868224 84.683776 45.889536 119.10656 80.31232 34.422784 34.422784 61.444096 74.496 80.313344 119.107584 19.525632 46.164992 29.426688 95.228928 29.426688 145.82784s-9.901056 99.662848-29.426688 145.82784c-18.869248 44.61056-45.89056 84.6848-80.313344 119.107584s-74.496 61.443072-119.10656 80.31232c-46.166016 19.526656-95.229952 29.426688-145.82784 29.426688-50.598912 0-99.662848-9.900032-145.828864-29.426688-44.61056-18.869248-84.683776-45.889536-119.10656-80.31232-34.422784-34.422784-61.444096-74.497024-80.313344-119.107584C147.117056 612.57728 137.216 563.514368 137.216 512.915456s9.901056-99.662848 29.426688-145.82784c18.869248-44.611584 45.89056-84.6848 80.313344-119.107584s74.496-61.444096 119.10656-80.31232C412.228608 148.140032 461.292544 138.24 511.891456 138.24" fill="#ffffff"/>
																</g>
															</svg>
														</div>
														<h1 class="fw-bold text-white text-center mb-0 pb-2 pt-4">Payment Successfull !</h1>
														<div class="fs-6 fw-bold mb-2 text-center text-white">Hooray! You have completed your payment.</div>
														<div class="fs-7 fw-bold mb-2 text-center text-white">
															<label>Transaction Id</label>
															<label class="me-1 ms-1">-</label>
															<label><?php echo $transaction_id; ?></label>
														</div>
														<hr class="text-gray-100">
														<h1 class="fw-bold text-white fs-2hx text-center mb-3">Your Package's</h1>
														<div class="d-flex justify-content-center align-items-center mb-2">
															<div class="badge badge-light-secondary flex-lg-row flex-column">
																<label class="fs-3 fw-bold mb-1"><?php echo $package_name; ?></label>
																<label class="fs-3 fw-bold mb-1 me-lg-1 ms-lg-1">/</label>
																<label class="fs-4 fw-bold mb-1"><?php echo $period; ?> <?php echo $duration == "1" ? "Month" :($duration == "2" ? "Year" :""); ?></label>
																<label class="fs-4 fw-bold mb-1 ms-lg-2 me-lg-2">(<?php echo sprintf("%02d", $no_of_callers); ?> Callers)</label>
															</div>
														</div>
														<hr class="text-gray-100">
														<div class="row">
															<div class="col-12 text-center mb-1">
																<label class="fs-6 fw-semibold text-gray-200">Amount Paid</label>
															</div>
															<div class="col-12 text-center mb-1">
																<label class="fw-bold">
																	<i class="fa-solid fa-indian-rupee-sign fs-1 text-white me-1"></i>
																</label>
																<label class="fs-2hx text-white fw-bold"><?php echo IND_money_format($paid_amount);  ?></label>
															</div>
															<div class="col-12 text-center mb-1">
																<div class="fs-6 fw-semibold text-gray-200">Your admin panel is ready to go 
																	<a href="<?php echo base_url(); ?>Login" class="badge badge-light-secondary ms-1 fs-6 fw-semibold"><u> Click Here</u></a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-black order-2 order-md-1">
								<span class="text-black fw-semibold me-1"><?php echo date("Y");?> &copy;</span>
								<a href="javascript:;" class="text-black text-hover-primary fw-semibold me-2 fs-6">Zeus Call Tracker Powered By EiBS</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->

		<?php $this->load->view("script.php"); ?>
		<script src="<?php echo base_url();?>assets/custom_js/animation.js"></script>
		<script>
			window.onload = function() {
			    confetti({
			        particleCount: 500,
			        spread: 180,
			        origin: { y: 0.6 }
			    });
			    
			    setTimeout(() => {
			    }, 10000); // Wait for 10 seconds
			}
		</script>

		<!-- <script>
		    //-----------Var Inits--------------
		    const confettiContainer = document.querySelector('.success_animation');
		    const canvas = document.createElement('canvas');
		    confettiContainer.appendChild(canvas);
		    const ctx = canvas.getContext('2d');
		    canvas.width = confettiContainer.clientWidth;
		    canvas.height = confettiContainer.clientHeight;

		    let confetti = [];
		    const confettiCount = 300;
		    const gravity = 0.5;
		    const terminalVelocity = 5;
		    const drag = 0.075;
		    const colors = [
		        { front: 'red', back: 'darkred' },
		        { front: 'green', back: 'darkgreen' },
		        { front: 'blue', back: 'darkblue' },
		        { front: 'yellow', back: 'darkyellow' },
		        { front: 'orange', back: 'darkorange' },
		        { front: 'pink', back: 'darkpink' },
		        { front: 'purple', back: 'darkpurple' },
		        { front: 'turquoise', back: 'darkturquoise' }
		    ];

		    // Random timer duration between 5 to 15 seconds
		    let timerDuration = 5; // Random number between 5 and 15
		    let timerId;
		    let isAnimating = false; // Flag to control animation
		    let fadeOutDuration = 2000; // Duration for fade-out effect in milliseconds
		    let canvasOpacity = 1; // Initial canvas opacity

		    //-----------Functions--------------
		    const resizeCanvas = () => {
		        canvas.width = confettiContainer.clientWidth;
		        canvas.height = confettiContainer.clientHeight;
		    };

		    const randomRange = (min, max) => Math.random() * (max - min) + min;

		    const initConfetti = () => {
		        for (let i = 0; i < confettiCount; i++) {
		            confetti.push({
		                color: colors[Math.floor(randomRange(0, colors.length))],
		                dimensions: {
		                    x: randomRange(10, 20),
		                    y: randomRange(10, 30)
		                },
		                position: {
		                    x: randomRange(0, canvas.width),
		                    y: canvas.height - 1
		                },
		                rotation: randomRange(0, 2 * Math.PI),
		                scale: {
		                    x: 1,
		                    y: 1
		                },
		                velocity: {
		                    x: randomRange(-25, 25),
		                    y: randomRange(0, -50)
		                },
		                opacity: 1 // Start fully opaque
		            });
		        }
		    };

		    const startTimer = () => {
		        let timeRemaining = timerDuration;
		        isAnimating = true; // Start animation

		        timerId = setInterval(() => {
		            timeRemaining--;
		            timerElement.innerText = timeRemaining;

		            if (timeRemaining <= 0) {
		                clearInterval(timerId);
		                fadeOutConfetti();
		            }
		        }, 1000);
		    };

		    const fadeOutConfetti = () => {
		        const fadeOutInterval = setInterval(() => {
		            // Gradually reduce the canvas opacity
		            canvasOpacity -= 1 / (fadeOutDuration / 16); // Adjust opacity
		            canvasOpacity = Math.max(canvasOpacity, 0); // Ensure opacity doesn't go below 0

		            // Remove any confetti that has fully faded out
		            confetti.forEach(confetto => {
		                confetto.opacity -= 1 / (fadeOutDuration / 16); // Adjust opacity
		                confetto.opacity = Math.max(confetto.opacity, 0); // Ensure opacity doesn't go below 0
		            });

		            confetti = confetti.filter(confetto => confetto.opacity > 0);

		            if (canvasOpacity <= 0 && confetti.length === 0) {
		                clearInterval(fadeOutInterval); // Stop the fade-out interval
		            }
		        }, 16); // ~60 FPS
		    };

		    //---------Render-----------
		    const render = () => {
		        ctx.clearRect(0, 0, canvas.width, canvas.height);

		        // Set the canvas global alpha for fade-out effect
		        ctx.globalAlpha = canvasOpacity;

		        confetti.forEach(confetto => {
		            let width = confetto.dimensions.x * confetto.scale.x;
		            let height = confetto.dimensions.y * confetto.scale.y;

		            ctx.save(); // Save the current context state
		            ctx.translate(confetto.position.x, confetto.position.y);
		            ctx.rotate(confetto.rotation);

		            confetto.velocity.x -= confetto.velocity.x * drag;
		            confetto.velocity.y = Math.min(confetto.velocity.y + gravity, terminalVelocity);
		            confetto.velocity.x += Math.random() > 0.5 ? Math.random() : -Math.random();

		            confetto.position.x += confetto.velocity.x;
		            confetto.position.y += confetto.velocity.y;

		            if (confetto.position.y >= canvas.height) confetti.splice(confetti.indexOf(confetto), 1);

		            if (confetto.position.x > canvas.width) confetto.position.x = 0;
		            if (confetto.position.x < 0) confetto.position.x = canvas.width;

		            confetto.scale.y = Math.cos(confetto.position.y * 0.1);
		            ctx.fillStyle = confetto.scale.y > 0 ? confetto.color.front : confetto.color.back;
		            ctx.globalAlpha = confetto.opacity; // Set opacity for individual confetti

		            ctx.fillRect(-width / 2, -height / 2, width, height);
		            ctx.restore(); // Restore the context state
		        });

		        if (isAnimating) {
		            window.requestAnimationFrame(render);
		        }
		    };

		    //---------Execution--------
		    initConfetti();
		    startTimer();
		    render();

		    //----------Resize----------
		    window.addEventListener('resize', function () {
		        resizeCanvas();
		    });
		</script> -->
		<script>
			// //-----------Var Inits--------------
			// canvas = document.getElementById("canvas");
			// ctx = canvas.getContext("2d");
			// canvas.width = window.innerWidth;
			// canvas.height = window.innerHeight;
			// cx = ctx.canvas.width / 2;
			// cy = ctx.canvas.height / 2;

			// let confetti = [];
			// const confettiCount = 300;
			// const gravity = 0.5;
			// const terminalVelocity = 5;
			// const drag = 0.075;
			// const colors = [
			// { front: 'red', back: 'darkred' },
			// { front: 'green', back: 'darkgreen' },
			// { front: 'blue', back: 'darkblue' },
			// { front: 'yellow', back: 'darkyellow' },
			// { front: 'orange', back: 'darkorange' },
			// { front: 'pink', back: 'darkpink' },
			// { front: 'purple', back: 'darkpurple' },
			// { front: 'turquoise', back: 'darkturquoise' }];


			// //-----------Functions--------------
			// resizeCanvas = () => {
			//   canvas.width = window.innerWidth;
			//   canvas.height = window.innerHeight;
			//   cx = ctx.canvas.width / 2;
			//   cy = ctx.canvas.height / 2;
			// };

			// randomRange = (min, max) => Math.random() * (max - min) + min;

			// initConfetti = () => {
			//   for (let i = 0; i < confettiCount; i++) {
			//     confetti.push({
			//       color: colors[Math.floor(randomRange(0, colors.length))],
			//       dimensions: {
			//         x: randomRange(10, 20),
			//         y: randomRange(10, 30) },

			//       position: {
			//         x: randomRange(0, canvas.width),
			//         y: canvas.height - 1 },

			//       rotation: randomRange(0, 2 * Math.PI),
			//       scale: {
			//         x: 1,
			//         y: 1 },

			//       velocity: {
			//         x: randomRange(-25, 25),
			//         y: randomRange(0, -50) } });


			//   }
			// };

			// //---------Render-----------
			// render = () => {
			//   ctx.clearRect(0, 0, canvas.width, canvas.height);

			//   confetti.forEach((confetto, index) => {
			//     let width = confetto.dimensions.x * confetto.scale.x;
			//     let height = confetto.dimensions.y * confetto.scale.y;

			//     // Move canvas to position and rotate
			//     ctx.translate(confetto.position.x, confetto.position.y);
			//     ctx.rotate(confetto.rotation);

			//     // Apply forces to velocity
			//     confetto.velocity.x -= confetto.velocity.x * drag;
			//     confetto.velocity.y = Math.min(confetto.velocity.y + gravity, terminalVelocity);
			//     confetto.velocity.x += Math.random() > 0.5 ? Math.random() : -Math.random();

			//     // Set position
			//     confetto.position.x += confetto.velocity.x;
			//     confetto.position.y += confetto.velocity.y;

			//     // Delete confetti when out of frame
			//     if (confetto.position.y >= canvas.height) confetti.splice(index, 1);

			//     // Loop confetto x position
			//     if (confetto.position.x > canvas.width) confetto.position.x = 0;
			//     if (confetto.position.x < 0) confetto.position.x = canvas.width;

			//     // Spin confetto by scaling y
			//     confetto.scale.y = Math.cos(confetto.position.y * 0.1);
			//     ctx.fillStyle = confetto.scale.y > 0 ? confetto.color.front : confetto.color.back;

			//     // Draw confetti
			//     ctx.fillRect(-width / 2, -height / 2, width, height);

			//     // Reset transform matrix
			//     ctx.setTransform(1, 0, 0, 1, 0, 0);
			//   });

			//   // Fire off another round of confetti
			//   if (confetti.length <= 10) initConfetti();

			//   window.requestAnimationFrame(render);
			// };

			// //---------Execution--------
			// initConfetti();
			// render();

			// //----------Resize----------
			// window.addEventListener('resize', function () {
			//   resizeCanvas();
			// });

			// //------------Click------------
			// window.addEventListener('click', function () {
			//   initConfetti();
			// });
		</script>
	</body>
	<!--end::Body-->
</html>
