$(document).ready(function (){
    $('#search-student').click(function(){
        var num_register = $('#search-by-register').val();
        console.log("Chegou aqui");
        $.ajax({
            type: 'POST',
            url: '_scripts/search_student.php',
            data: {
                value: num_register
            },   
            success: function (result){
                $('#js-display-search-result').html(result);
            }
        });

    });
});