$(function(){

    $('.tombolTambahData').on('click', function(){
   
        $('#formModalLabel').html('Tambah data mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah data');
        
        });


$('.tampilModalUbah').on('click', function(){
   
    $('#formModalLabel').html('ubah data mahasiswa');
    $('.modal-footer button[type=submit]').html('Ubah data ');


    const id = $(this).data('id');
    console.log(id);
   
    $.ajax ({
        url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
        data: {id : id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
            console.log(data);
        }

    });
    
    });

});