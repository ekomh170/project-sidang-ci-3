		 <!-- Bootstrap core JavaScript -->
		 <script src="<?= base_url('assets/templates/'); ?>vendor/jquery/jquery.min.js"></script>
		 <script src="<?= base_url('assets/templates/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		 <!-- Plugin JavaScript -->
		 <script src="<?= base_url('assets/templates/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
		 <script src="<?= base_url('assets/templates/'); ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

		 <!-- Sweet Alert 2-->
		 <script src="<?= base_url('assets/templates/'); ?>vendor/sweetalret2/dist/sweetalert2.min.js"></script>
		 <!-- Sweet Alert 2-->

		 <script src="<?= base_url('assets/myassets/'); ?>js/loadscreen.js"></script>

		 <!-- Sweet Alert 2-->
		 <script type="text/javascript">
		 	const flashData = $('.flash-data').data('flashdata');

		 	if (flashData) {
		 		Swal.fire({
		 			icon: 'success',
		 			title: "Logout Berhasil",
		 			text: "Anda Berhasil " + flashData,
				    // timer: 1500,
				    showConfirmButton: true,
				    type: 'success',
				});
		 	}

		 </script>
		 <!-- Sweet Alert 2-->

		 <?php if ($this->uri->segment('4') == "loginhome") { ?>
		 	<script src="<?= base_url('assets/'); ?>home/js/creative.min.js"></script>
		 <?php } ?>
	</body>
</html>