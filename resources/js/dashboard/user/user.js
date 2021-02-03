
require('datatables');
require('datatables.net-bs4');
require('datatables.net-select-bs4');

"use strict";

const dataTable = $('#data-table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    order: [[0, "desc"]],
    ajax: {
        url: "/dashboard/user/data_table_server_side",
    },
    columns: [
        {
            className: "text-center",
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            searchable: false,
            sortable : false,
            data: 'action',
            name: 'action'
        }
    ]
});

window.deleteData = function (id, name) {
    Swal.fire({
        allowEnterKey:true,
        title: 'Are you sure want to delete ?',
        text: "Will delete data "+name+" ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        showLoaderOnConfirm: true,
        preConfirm: async () => {
            try {
                const response = await window.axios.delete('user/delete/', { data: { id: id }});
                if (response.statusText!="OK") {
                    throw new Error(response.statusText);
                }
                return await response;
            } catch (error) {
                Swal.showValidationMessage(
                    `Error: ${error}`
                );
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Success!',
                'Data '+name+' has been deleted!',
                'success'
            );
            dataTable.ajax.reload(null, false);
        }
    })
}
