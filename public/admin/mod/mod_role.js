var datatableUrl = '/administrator/roles/loadData';
var pathStoreUrl = "/administrator/roles/store";
var displayErrors = [
    {
        display: '#roleErr',
        inputName: 'role'
    }
];

$('.edit').click(function() {
    let id = $(this).data('id');
    $('#myModal form').attr('action', '/administrator/roles/'+ id +'/update');
    $.ajax({
        url: url + '/administrator/roles/'+ id +'/show',
        dataType: 'json',
        success:function(res){
            $('#role').val(res.response.name);
        } 
    });
})
