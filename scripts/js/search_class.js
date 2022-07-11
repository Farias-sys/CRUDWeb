$(document).ready(function (){
    $('#search-class').click(function(){
        var class_code = $('#search-by-class-code').val();

        $.ajax({
            type: 'POST',
            url: '_scripts/search_class.php',
            data: {
                value: class_code
            },

            success: function (result){
                $('#js-display-search-result').html(result);
            }
        });
    });
});