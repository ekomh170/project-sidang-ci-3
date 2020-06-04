<div class="container-fluid mb-2">
	<h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h1>Fungsi - Fungsi Sub Menu : </h1>
			<?php foreach ($sub_menu as $value) : ?>
			<ul>
				<li><span class="font-weight-bold"><?= $value->title; ?></span>, Berfungsi : <?= $value->keterangan; ?></li>
			</ul>
			<?php endforeach ?>
			<h1>Fungsi - Fungi Role</h1>
			<?php foreach ($role as $value) : ?>
			<ul>
				<li><span class="font-weight-bold"><?= $value->role; ?></span>, Berfungsi : </li>
			</ul>
			<?php endforeach ?>
	 	</div>
	</div>

</div>