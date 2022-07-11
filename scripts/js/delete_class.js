$(document).ready(function (){
    $('#btn-confirm-class-delete').click(function(){
        var num_register = $('#search-by-class-code').val();
        console.log("Chegou aqui");
        $.ajax({
            type: 'POST',
            url: '_scripts/delete_class.php',
            data: {
                value: num_register
            },   
            success: function (result){
                $('#js-display-affected-result').html(result);
                window.location.reload();
            }
        });

    });
});