$(document).ready(function(){
    $('.addImage').click(function(e){
        var im = $(this).attr('nomIm');
        waitingDialog.show('Add ' + im + ' in Zone box', {dialogSize: 'sm'});
        $.ajax({
            method: "POST",
            url: "index.php?controller=Home&action=saveImg",
            data: { Img: im },

            success: function(data){
                location.reload(); 
            }

            })
    });

    $('.delete').click(function(){
        var im = $(this).attr('nomIm');
        waitingDialog.show('Delete ' + im + ' from Zone box', {dialogSize: 'sm'});
        $.ajax({
            method: "POST",
            url: "index.php?controller=Home&action=deleteImg",
            data: { Img: im },
            success: function(data){
                location.reload(); 
            }

            })

    });

});