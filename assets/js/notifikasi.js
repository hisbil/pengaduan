function chek(){
     $.ajax({
            type: "POST",
            url: "<?php echo base_url().'administrator/notifikasi'; ?>",
            dataType:'json',
            success: function(response){
                $("#notifikasi").text(""+response+"");
                timer = setTimeout("chek()",3000);
            }
     });  
}

$(document).ready(function(){
    chek();
});