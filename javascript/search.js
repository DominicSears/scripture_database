$(document).ready(function (){
    let search = document.getElementById('searchBtn');
    let field = document.getElementById('field');
    
    search.addEventListener('click', function (){
        if (field.value != ""){
            $.ajax({
                type: 'POST',
                data: {
                    query: field.value
                },
                url: '/scripture_database/server_script/search.php',
                success: function (data){
                    var res = JSON.parse(data);
                    console.log(data);
        
                    if (!res.error){
                        $(res.result).each(function (index, value){
                            console.log(value.book + ' ' + value.chapter + ':' + value.verse + '\n\n');
                        });
                        // var results = document.getElementById('results');

                        // for (var val of res.result){
                        //     temp = document.createAttribute('div');
                        //     temp.appendChild('<p>' + val.book + ' ' + val.chapter + ':' + val.verse + '</p><br>');
                        //     results.appendChild(temp);
                        // }
                    } else {
                        console.log(res.alert);
                    }
                }
            }).fail(function () { console.log('AJAX request did not complete'); })
        } else {
            alert('Enter tags into the field');
        }
    })
})