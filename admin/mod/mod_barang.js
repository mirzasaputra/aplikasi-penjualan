var datatableUrl = '/administrator/barang/loadData';
var pathStoreUrl = "/administrator/barang/store";
var displayErrors = [
    {
        display: '#kodeBarangErr',
        inputName: 'kode_barang'
    },
    {
        display: '#namaErr',
        inputName: 'nama'
    },
    {
        display: '#satuanErr',
        inputName: 'satuan'
    },
    {
        display: '#harga_beliErr',
        inputName: 'harga_beli'
    },
    {
        display: '#harga_r2Err',
        inputName: 'harga_r2'
    },
    {
        display: '#harga_eceranErr',
        inputName: 'harga_eceran'
    },
    {
        display: '#isiPerDusErr',
        inputName: 'isi_per_dus'
    },
    {
        display: '#stokErr',
        inputName: 'stok'
    },
];

$('.select2').select2();