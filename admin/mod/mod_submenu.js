var datatableUrl = "/administrator/submenus/loadDatatable";
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
        display: "#groupErr",
        inputName: "group",
    },
];

$('.deleteIt').click(function (e) {
    e.preventDefault();
    let dataUrl = $(this).attr('href');
    swal.fire({
        title: 'Delete?',
        icon: 'warning',
        text: 'Are you sure delete?',
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it',
        cancelButtonText: 'No',
    }).then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url + dataUrl,
                method: 'post',
                dataType: 'json',
                success: function (data) {
                    swal.fire({
                        title: 'Success',
                        icon: 'success',
                        text: data.message
                    }).then(() => {
                        window.location.reload();
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal.fire({
                        title: xhr.status,
                        icon: 'error',
                        text: xhr.responseJSON.message
                    });
                }
            })
        }
    })
});