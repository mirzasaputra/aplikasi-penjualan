var datatableUrl = "/administrator/menus/loadDatatable";
var displayErrors = [
    {
        display: "#titleErr",
        inputName: "title",
    },
    {
        display: "#urlErr",
        inputName: "url",
    },
    {
        display: "#positionErr",
        inputName: "position",
    },
    {
        display: "#targetErr",
        inputName: "target",
    },
    {
        display: "#typeErr",
        inputName: "type",
    },
    {
        display: "#groupErr",
        inputName: "group",
    },
];

$('#type_menu').on('change', function(){
    menuHide();
})

menuHide();
function menuHide() {
    let val = $("#type_menu").val();
    if(val == 'Frontend'){
        $('#menu_group_select').append($("<option></option>").attr("value", "null").text("None")); 
        // $('#menu_group_select').html('<input type="text" class="form-control" name="group" autocomplete="off" value="None" readonly>');
        $('#menu_group_select').val('null');
        $('.menu-type').hide('fade');
        
    } else {
        $('.menu-type').show('fade');
        $('#menu_group_select option[value="null"]').remove();
    }
}