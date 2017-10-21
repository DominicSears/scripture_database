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
                        // for (var i = 0; i < res.result.size; i++){
                            
                        // }
                        console.log('finished');
                    } else {
                        console.log(res.alert);
                    }
                }
            }).fail(function () { console.log('ajax request did not complete'); })
        } else {
            alert('Enter tags into the field');
        }
    })
})