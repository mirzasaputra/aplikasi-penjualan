$('#cariBarang').submit(function(e){
    e.preventDefault();
    $('.loaderAction').removeClass('d-none');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/administrator/penjualan/findBarang',
        method: 'post',
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (data) {
            $('input[name="barcode"]').val("");
            $('.loaderAction').addClass('d-none');
            $('#id_barang').val(data.id);
            $('#namaBarang').val(data.nama);
            $('#hargaBarang').val(data.harga_jual);
        },
        error: function(xhr, ajaxOptions, thrownError){
            $('input[name="barcode"]').val("");
            $('.loaderAction').addClass('d-none');
            swal.fire({
                title: xhr.status,
                icon: 'warning',
                text: xhr.responseJSON.messages
            });
        }
    })
})

$('.selectBarang').click(function(){
    let barcode = $(this).data('barcode');

    $('.loaderAction').removeClass('d-none');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/administrator/penjualan/findBarang',
        method: 'post',
        data: {barcode: barcode},
        dataType: "json",
        success: function (data) {
            $('input[name="barcode"]').val("");
            $('.loaderAction').addClass('d-none');
            $('#id_barang').val(data.id);
            $('#namaBarang').val(data.nama);
            $('#hargaBarang').val(data.harga_jual);
        },
        error: function(xhr, ajaxOptions, thrownError){
            $('input[name="barcode"]').val("");
            $('.loaderAction').addClass('d-none');
            swal.fire({
                title: xhr.status,
                icon: 'warning',
                text: xhr.responseJSON.messages
            });
        }
    })
})


$('#diskonPersen').change(function(){
    let persen = $(this).val();
    let subtotal = $('#subtotal').val();
    let diskon = subtotal / 100 * persen;
    let total = subtotal - diskon;

    $('#diskonRupiah').val(diskon);
    $('#total').val(total);
    $('input[name="total"]').val(total);
})

$('input[name="tgl_awal"]').change(function(){
    var tgl_awal = $(this).val();
    var tgl_akhir = $('input[name="tgl_akhir"]').val();

    $('#link').attr('href', '/administrator/report-penjualan/'+tgl_awal+'/'+tgl_akhir);
})

$('input[name="tgl_awal"]').keyup(function(){
    var tgl_awal = $(this).val();
    var tgl_akhir = $('input[name="tgl_akhir"]').val();

    $('#link').attr('href', '/administrator/report-penjualan/'+tgl_awal+'/'+tgl_akhir);
})

$('input[name="tgl_akhir"]').change(function(){
    var tgl_awal = $('input[name="tgl_awal"]').val();
    var tgl_akhir = $(this).val();

    $('#link').attr('href', '/administrator/report-penjualan/'+tgl_awal+'/'+tgl_akhir);
})

$('input[name="tgl_akhir"]').keyup(function(){
    var tgl_awal = $('input[name="tgl_awal"]').val();
    var tgl_akhir = $(this).val();

    $('#link').attr('href', '/administrator/report-penjualan/'+tgl_awal+'/'+tgl_akhir);
})

$('#link').click(function(e){
    if($('input[name="tgl_awal"').val() == "" || $('input[name="tgl_akhir"').val() == ""){
        e.preventDefault();
        swal.fire({
            title: 'Warning!!!',
            icon: 'warning',
            text: 'Silahkan pilih tanggal'
        });
    }

})

$('#diskonPersen').keyup(function(){
    let persen = $(this).val();
    let subtotal = $('#subtotal').val();
    let diskon = subtotal / 100 * persen;
    let total = subtotal - diskon;

    $('#diskonRupiah').val(diskon);
    $('#total').val(total);
    $('input[name="total"]').val(total);
})

$('#bayar').keyup(function(){
    let total = $('#total').val();
    let bayar = $(this).val();
    let kembali = bayar - total;

    $('#kembali').val(kembali);
    $('input[name="kembali"]').val(kembali);
})

function tambahBarang(){
    let id = $('#id_barang').val();
    let invoice = $('#noInvoice').val();
    let qty = $('#qty').val();

    console.log(invoice);
    if(id == ""){
        swal.fire({
            title: 'Warning',
            icon: 'warning',
            text: 'Silahkan pilih barang'
        });
    } else {
        $('.loaderAction').removeClass('d-none');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/administrator/penjualan/tambahBarang',
            method: 'post',
            data: {id: id, invoice: invoice, qty: qty},
            dataType: "json",
            success: function (data) {
                $('input[name="barcode"]').val("");
                pushState(data.redirect);
            },
            error: function(xhr, ajaxOptions, thrownError){
                $('input[name="barcode"]').val("");
                $('.loaderAction').addClass('d-none');
                swal.fire({
                    title: xhr.status,
                    icon: 'warning',
                    text: xhr.responseJSON.messages
                });
            }
        })
    }
}