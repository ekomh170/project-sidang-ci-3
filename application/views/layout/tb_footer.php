  </div>
  <footer class="bg-white sticky-footer">
    <div class="container my-auto">
      <center>
        <div class="text-center my-auto copyright"><span><b>Hubungi Pengembang : Eko Muchamad Haryono</b></span></div><br>   
        <div class="mb-4">
          <a href="https://web.facebook.com/eko.m.haryono/" target="_BLANK"><button class="btn btn-primary"><i class="fab fa-facebook-f" aria-hidden="true"></i></button></a>
          <a href="https://api.whatsapp.com/send?phone=6282246105463" target="_BLANK"><button class="btn btn-success"><i class="fab fa-whatsapp" aria-hidden="true"></i></button></a>
          <a href="https://github.com/ekomh170" target="_BLANK"><button class="btn btn-dark"><i class="fab fa-github" aria-hidden="true"></i></button></a>
          <a href="https://www.instagram.com/ekomh_29/?hl=id" target="_BLANK"><button class="btn btn-warning"><i class="fab fa-instagram" aria-hidden="true"></i></button></a>
        </div>
      </center>
    </div>
  </footer>
</div>

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Apakah Anda Ingin Keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body text-danger"><b>Anda Ingin Keluar?? Tekan Yes</b></div>
      <div class="modal-footer">
        <a class="btn btn-danger" href="<?=base_url('Auth/logout');?>">Yes</a>
        <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">No</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?=base_url('assets/layout/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/layout/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url('assets/layout/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url('assets/layout/');?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?=base_url('assets/layout/');?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/layout/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/layout/');?>js/demo/datatables-demo.js"></script>

<!-- Sweet Alret 2-->
<script src="<?=base_url('assets/layout/');?>vendor/sweetalret2/dist/sweetalert2.min.js"></script>
<!-- Sweet Alert 2-->

<!-- Js-->
<script src="<?=base_url('assets/myassets/');?>js/realodpage.js"></script>
<script src="<?=base_url('assets/myassets/');?>js/loadscreen.js"></script>
<!-- Js-->

<!-- Sweet Alert -->
<script type="text/javascript">
  <?php if ($this->uri->segment('1') != "Dashboard") {?>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
      Swal.fire({
        icon: 'success',
        title: "<?=$judul?>",
        text: "Berhasil " + flashData,
        showConfirmButton: true,
      });
    }
  <?php }?>

  <?php if ($this->uri->segment('1') == "Dashboard") {?>
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
      Swal.fire({
        icon: 'success',
        title: "<?=$judul2?>",
        text: "Berhasil " + flashData,
        showConfirmButton: true,
      });
    }
  <?php }?>

      //Tombol Hapus
      $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: "<?=$judul?> Yang di Pilih Akan " + "di Hapus !",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya',
          cancelButtonText: 'Tidak'
        }).then((result) => {
          if (result.value == true) {
            document.location.href = href;
          }
        })
      });
    </script>
    <!-- Sweet Alert -->

    <!-- Waktu -->
    <script type="text/javascript">
      //set timezone
      <?php date_default_timezone_set('Asia/Jakarta');?>
      //buat object date berdasarkan waktu di server
      var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0');?>);
      //buat object date berdasarkan waktu di client
      var clientTime = new Date();
      //hitung selisih
      var Diff = serverTime.getTime() - clientTime.getTime();
      //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
      function displayServerTime() {
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //Menunjukan nama
        var pl = "<b>Pukul : </b>";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (pl) + (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
      }
    </script>
    <!-- Waktu -->
  </body>
  </html>