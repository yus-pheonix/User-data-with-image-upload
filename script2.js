$(document).ready(function(){
    $('.save, .cancel').hide();
    $('input[type="text"]').attr('readonly',true);

    $('.edit').on('click', function(){
       $(this).closest('tr').find('input[type="text"]').attr('readonly',false);
       $(this).hide();
       $(this).closest('tr').find('.delete').hide();
       $(this).closest('tr').find('.save, .cancel').show();
    });

    $('.cancel').on('click', function(){
        $(this).closest('tr').find('input[type="text"]').attr('readonly',true);
        $(this).hide();
        $('.save').hide();
        $(this).closest('tr').find('.edit, .delete').show();
     });

     $('.delete').on('click', function(){
        var id = $(this).closest('tr').attr('id');
        alert(id);
        $.ajax({
            type: "post",
            url: "action.php",
            data: {
                'id':id,
                'delete': 'yes'
            },
            success: function (response) {
                if(response == '1'){
                    window.location.replace("display.php");
                }else{
                    alert(response);
                }
                
            }
        });
     });

});
