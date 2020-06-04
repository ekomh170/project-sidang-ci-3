// <!-- Sweet Alert -->
      const flashData = $('.flash-data').data('flashdata');

      if (flashData) {
        Swal.fire({
          icon: 'success',
          title: "<?= $judul ?>",
          text: "Berhasil " + flashData,
          showConfirmButton: true,
        });
      }

      const flashDash = $('.flash-dash').data('flashdata');

      if (flashDash) {
        Swal.fire({
          icon: 'success',
          title: "<?= $judul2 ?>",
          text: "Berhasil " + flashDash,
          showConfirmButton: true,
        });
      }

      //Tombol Hapus 
      $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: "<?= $judul ?> Yang di Pilih Akan " + "di Hapus !",
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
