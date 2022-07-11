$(document).ready(function (){
    $('#btn-confirm-student-delete').click(function(){
        var num_register = $('#search-by-register').val();
        $.ajax({
            type: 'POST',
            url: '_scripts/delete_student.php',
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