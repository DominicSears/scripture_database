$(document).ready(function (){
    $('#menuBtn').on('click', function (){
        location.href = window.location.origin + '/scripture_database/index.php';
    });

    $('#entryBtn').on('click', function (){
        location.href = window.location.origin + '/scripture_database/newEntry.php';
    });
});