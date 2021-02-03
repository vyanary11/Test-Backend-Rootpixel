require('datatables');
require('datatables.net-bs4');
require('datatables.net-select-bs4');
require('selectric');

"use strict";

window.count_data = function () {
    window.axios.get('blog/count_data/').then(function (response) {
        const data = response.data;
        document.getElementById("all").innerHTML = data.all;
        document.getElementById("draft").innerHTML = data.draft;
        document.getElementById("published").innerHTML = data.published;
        document.getElementById("archived").innerHTML =data.archived;
    })
    .catch(function (error) {
        console.log(error);
    })
}


count_data();

$("[data-checkboxes]").each(function() {
    var me = $(this),
        group = me.data('checkboxes'),
        role = me.data('checkbox-role');

    me.change(function() {
        var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
        checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
        dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
        total = all.length,
        checked_length = checked.length;

        if(role == 'dad') {
            if(me.is(':checked')) {
                all.prop('checked', true);
            }else{
                all.prop('checked', false);
            }
        }else{
            if(checked_length >= total) {
                dad.prop('checked', true);
            }else{
                dad.prop('checked', false);
            }
        }
    });
});

const dataTable = $('#data-table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: {
        url: "/dashboard/blog/data_table_server_side",
        data: function ( d ) {
            d.status = $('#status').val();
        }
    },
    columns: [
        {
            className: "text-center",
            data: 'id',
            orderable: false,
            searchable: false
        },
        {
            data: 'title',
            name: 'title'
        },
        {
            data: 'author',
            name: 'author'
        },
        {
            data: 'created_at',
            name: 'created_at'
        },
        {
            data: 'updated_at',
            name: 'updated_at'
        },
        {
            data: 'status',
            name: 'status'
        },
        {
            searchable: false,
            sortable : false,
            data: 'action',
            name: 'action'
        }
    ]
});

window.filterDataTable = function (a) {
    var element = document.getElementById('filter_active');
    element.id = "";
    element.classList.remove('active');
    element.children[0].classList.remove('badge-white');
    element.children[0].classList.add('badge-primary');
    a.id = "filter_active";
    a.classList.add("active");
    a.children[0].classList.remove('badge-primary');
    a.children[0].classList.add('badge-white');
    $('#status').val($("#filter_active").attr("data-filter"));
    dataTable.draw();
}

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
                const response = await window.axios.delete('blog/delete/', { data: { id: id }});
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
            count_data();
            dataTable.ajax.reload(null, false);
        }
    })
}

$('#action-selected').on('change', function() {
    const value = this.value;
    if(this.value!=""){
        var id = [];
        $.each($("input[name='id']:checked"), function(){
            id.push($(this).val());
        });
        if (id.length==0) {
            Swal.fire(
                'Error!',
                'Select one data!',
                'error'
            );
        } else {
            deleteOrUpdateSelected(id.join(","), this.value);
        }
    }
    $(this).prop('selectedIndex', 0).selectric('refresh');
    $("#checkbox-all").prop('checked', false);
});

window.deleteOrUpdateSelected = function(id, value){
    Swal.fire({
        allowEnterKey:true,
        title: 'Are you sure ?',
        text: "Selected data will be change to "+value+" ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        showLoaderOnConfirm: true,
        preConfirm: async () => {
            try {
                var response = null;
                if(value=="delete"){
                    response = await window.axios.delete('blog/delete_selected/', {
                        data: {
                            id: id
                        }
                    });
                }else{
                    response = await window.axios.post('blog/update_selected/', {
                        id: id,
                        status : value
                    });
                }
                if (response.statusText!="OK") {
                    throw new Error(response.statusText);
                }
                return await response;
            } catch (error) {
                Swal.showValidationMessage(
                    `Gagal: ${error}`
                );
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            if(value=="delete"){
                Swal.fire(
                    'Success!',
                    'Data has been deleted!',
                    'success'
                );
            }else{
                Swal.fire(
                    'Success!',
                    'Data has been changed!',
                    'success'
                );
            }
            count_data();
            dataTable.ajax.reload(null, false);
        }
    })
}
