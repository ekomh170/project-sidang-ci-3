		 <!-- Bootstrap core JavaScript-->
		 <script src="<?= base_url('assets/layout/'); ?>vendor/jquery/jquery.min.js"></script>
		 <script src="<?= base_url('assets/layout/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		 <!-- Core plugin JavaScript-->
		 <script src="<?= base_url('assets/layout/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

		 <!-- Custom scripts for all pages-->
		 <script src="<?= base_url('assets/layout/'); ?>js/sb-admin-2.min.js"></script>

		 <!-- Sweet Alret 2-->
		 <script src="<?= base_url('assets/layout/'); ?>vendor/sweetalret2/dist/sweetalert2.min.js"></script>
		 <!-- Sweet Alret 2-->

		 <!-- JS -->
		 <script src="<?= base_url('assets/myassets/'); ?>js/loadscreen.js"></script>
		 <script src="<?= base_url('assets/myassets/'); ?>js/halamansebelumnya.js"></script>
		 <!-- JS -->
		 
		 <script type="text/javascript">
		 	const flashData = $('.flash-data').data('flashdata');

		 	if (flashData) {
		 		Swal.fire({
		 			icon: 'success',
		 			title: "<?=$judul?>",
		 			text: "Berhasil " + flashData,
		 			showConfirmButton: true,
		 		});
		 	}
		 </script>
		</body>
		</html>