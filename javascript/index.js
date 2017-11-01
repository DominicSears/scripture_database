$(document).ready(function (){
    $('#field').on('change', function (){
        console.log('change triggered');
    });

    $('#searchBtn').on('click', function (){
        $.ajax({
            type: 'POST',
            url: 'localhost/bible_database/server_scripts/search.php',
            data: {
                query: $('#field').val()
            },
            success: function (data){
                let res = JSON.parse(data);

                if (!res.error){
                    // idk
                } else {
                    console.log(res.alert);
                }
            }
        }).fail(function (){
            console.log('AJAX request did not go through');
        })
    })
});