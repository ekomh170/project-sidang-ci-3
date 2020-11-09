<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $judul; ?></title>
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?= base_url('assets/layout/'); ?>css/styleeror.css" />

</head>

<body>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
				<h2>Halaman Tidak Ditemukan</h2>
			</div>
			<br>
			<a onclick="backpageror()">Kembali</a>
		</div>
	</div>
</body>
<script>
    function backpageror() {
      window.history.go(-1);
    }
  </script>

</html>