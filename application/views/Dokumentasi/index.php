<h1 class="text-center font-weight-bold"><?= $judul; ?></h1>
<hr class="sidebar-divider">
<div class="container">
	<center>
		<div class="col-xl-6 col-lg-8 col-md-6">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<div class="card">
						<h4 class="card-header text-center font-weight-bold"><?= $judul2; ?></h4>
						<?php
						foreach ($role as $rl) :
							?>
							<div class="card-body">
								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Role : <?= $rl['role']; ?></span>, Keterangan <?= $rl['keterangan']; ?></h6>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="card-footer">
						<?php if (!$this->uri->segment(2) == 'index'): ?> 				
							<a href="<?=base_url('Dokumentasi/index');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Role Hak Akses Menu</span></button></li></a>
						<?php endif ?>
						<a href="<?=base_url('Dokumentasi/index2');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Menu</span></button></li></a>
					</div>
				</div>
			</div>
		</div>
	</center>
</div>