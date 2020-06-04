// <!-- Reload -->
    function reloadpage()
    {
      location.reload()
    }
// <!-- Reload -->    

// <!-- Change Role Akses -->    
  $('.form-check-input').on('click', function() {
    const roleId = $(this).data('role');
    const menuId = $(this).data('menu');

    $.ajax({
      url: "<?= base_url('role/changeAccess'); ?>",
      type: "post",
      data: {
        roleId: roleId,
        menuId: menuId
      },
      success: function(){
      document.location.href = "<?= base_url('Role/roleAccess/'); ?>" + roleId;
      }
    });

  });
// <!-- Change Role Akses -->  

// <!-- Sweet Alert -->
  <script type="text/javascript">
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
      Swal.fire({
        icon: 'success',
        title: "<?= $judul?>",
        text:  "Berhasil " + flashData,
        // timer: 1500,
        showConfirmButton: true,
        type: 'success',
      });
    }

    //Tombol Hapus 
    $('.tombol-hapus').on('click', function (e) {

      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "<?= $judul?> Yang di Pilih Akan " + "di Hapus !",
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
// <!-- Sweet Alert -->

// <!-- Waktu -->
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
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
        document.getElementById("clock").innerHTML = (pl) + (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
      }
// <!-- Waktu -->
    
// <!-- Harap Tunggu Loader -->
    $(window).on('load', function() { $("#haraptunggu").fadeOut("slow"); })
// <!-- Harap Tunggu Loader -->

// <!-- Datatables -->
      $(document).ready(function() {
        $('#table1').DataTable( {
          "paging":   false,  
          "info":     false
        } );
      } );
// <!-- Datatables -->    
