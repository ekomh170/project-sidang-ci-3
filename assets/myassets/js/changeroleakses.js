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
