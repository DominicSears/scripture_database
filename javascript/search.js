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
                url: location.origin + '/scripture_database/server_script/search.php',
                success: function (data){
                    var res = JSON.parse(data);
                    console.log(data);
        
                    if (!res.error){
                        var results = document.getElementById('results');
                        
                        for (let val of res.result){
                            var temp = document.createElement('div');
                            var temp2 = document.createElement('p');
                            temp2.className = "verse";
                            temp2.append(val.book + ' ' + val.chapter + ':' + val.verse)
                            temp.appendChild(temp2);
                            results.appendChild(temp);
                        }

                        results.appendChild(document.createElement('br'));
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