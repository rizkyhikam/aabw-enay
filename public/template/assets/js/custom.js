/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

function hapus(id){
    $('#del-'+id).submit();
}

// menu dinamis
var path = location.pathname.split('/')
var url = location.origin + '/' + path[1]
$('ul.sidebar-menu li a').each(function(){
if ($(this).attr('href').indexOf(url) !== -1) {
$(this).parent().addClass('active').parent().parent('li').addClass('active')
}
});

// pagination
$(document).ready( function () {
    $('#myTable').DataTable();
} );

// Form Dinamis Transaksi
$(document).ready(function() {
    var baseUrl = location.origin + (location.pathname.indexOf('/aabw-enay') !== -1 ? '/aabw-enay/public' : '');

    var count = 0;

    function formSelectAkun(index) {
        $.ajax({
            url: baseUrl + '/transaksi/akun3',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = '<option value="">- Pilih Akun -</option>';
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].kode_akun3 + '">' + data[i].kode_akun3 + ' - ' + data[i].nama_akun3 + '</option>';
                }
                $('#kode_akun3_' + index).html(html);
            }
        });
    }

    function formSelectStatus(index) {
        $.ajax({
            url: baseUrl + '/transaksi/status',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = '<option value="">- Pilih Status -</option>';
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].id_status + '">' + data[i].status + '</option>';
                }
                $('#id_status_' + index).html(html);
            }
        });
    }

    function addRow() {
        count++;
        var html = '<tr id="row_' + count + '">';
        html += '<td class="text-center">' + count + '</td>';
        html += '<td><select class="form-control" name="kode_akun3[]" id="kode_akun3_' + count + '" required><option value="">- Pilih Akun -</option></select></td>';
        html += '<td><input type="text" class="form-control" name="debit[]" value="0" required></td>';
        html += '<td><input type="text" class="form-control" name="kredit[]" value="0" required></td>';
        html += '<td><select class="form-control" name="id_status[]" id="id_status_' + count + '" required><option value="">- Pilih Status -</option></select></td>';
        html += '<td class="text-center"><button type="button" class="btn btn-danger btn-sm hapusBaris" data-id="' + count + '"><i class="fas fa-trash"></i></button></td>';
        html += '</tr>';

        $('#tableLoop tbody').append(html);
        formSelectAkun(count);
        formSelectStatus(count);
    }

    $(document).on('click', '#BarisBaru, #barisBaru', function(e) {
        e.preventDefault();
        addRow();
    });

    $(document).on('click', '.hapusBaris', function(e) {
        e.preventDefault();
        var rowId = $(this).data('id');
        if (rowId) {
            $('#row_' + rowId).remove();
        } else {
            $(this).closest('tr').remove();
        }
        // Re-number rows
        $('#tableLoop tbody tr').each(function(idx) {
            $(this).find('td:first').text(idx + 1);
        });
        count = $('#tableLoop tbody tr').length;
    });
});

// Video 13: Function hitung penyesuaian otomatis
function hitung() {
    var nilai = $('input[name="nilai"]').val() || 0;
    var waktu = $('input[name="waktu"]').val() || 0;
    var jumlah = 0;
    if (parseFloat(waktu) > 0) {
        jumlah = parseFloat(nilai) / parseFloat(waktu);
    }
    $('input[name="jumlah"]').val(jumlah);
}

