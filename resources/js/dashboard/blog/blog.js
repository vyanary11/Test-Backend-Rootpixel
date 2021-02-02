import Cleave from 'cleave.js';
require('datatables');
require('datatables.net-bs4');
require('datatables.net-select-bs4');
require('summernote')

"use strict";

const formModal = $('#form-modal');
const formModalTittle = $('#form-modalLabel');
const form = $('#form');
const buttonSubmit = $('button[type="submit"]');
const benefitContainer = $('#benefit-container');

const dataTable = $('#data-table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: "/admin/paket-harga/data_table_server_side",
    columns: [
        {
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'price',
            name: 'price'
        },
        {
            data: 'discount',
            name: 'discount'
        },
        {
            data: 'price_after_discount',
            name: 'price_after_discount'
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
        title: 'Yakin Ingin Menghapus ?',
        text: "Akan menghapus data "+name+" ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya',
        cancelButtonText: 'Tidak',
        showLoaderOnConfirm: true,
        preConfirm: async () => {
            try {
                const response = await window.axios.delete('paket-harga/delete/', { data: { id: id }});
                console.log(response);
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
            dataTable.ajax.reload(null, false);
            Swal.fire(
                'Berhasil!',
                'Data berhasil dihapus!',
                'success'
            );
        }
    })
}

formModal.on('hidden.bs.modal', function (event) {
    clearFormModal();
    formModalTittle.html('Tambah Paket Harga');
    form.attr('action','/admin/paket-harga/store');
    buttonSubmit.text('Simpan');
})

window.clearFormModal = function () {
    form.trigger('reset');
    form.removeClass('was-validated');
    $('#persen').attr('checked', true);
    $('#nominal').attr('checked', false);
    $('.benefit-plus').remove();
}

window.editFormModal = function (id) {
    form.attr('action','/admin/paket-harga/update/'+id);
    formModalTittle.html('Edit Paket Harga');
    buttonSubmit.text('Update');
    window.axios.get('paket-harga/update/'+id).then(function (response) {
        const data = response.data;

        $('input[name="name"]').val(data.name);
        $('input[name="price"]').val(new Intl.NumberFormat(['id']).format(data.price));
        $('input[name="discount"]').val(new Intl.NumberFormat(['id']).format(data.discount));
        if (data.type_discount=="persen") {
            $('#persen').attr('checked', true);
            $('#nominal').attr('checked', false);
        }else{
            $('#persen').attr('checked', false);
            $('#nominal').attr('checked', true);
        }

        for (let index = 0; index < data.details.length; index++) {
            if(index==0){
                $('.note-editable').html(data.details[index].detail);
            }else{
                const html = '<div class="benefit-plus mt-2">'+
                                '<button type="button" onClick="removeBenefit(this)" class="btn btn-sm btn-danger text-white">'+
                                    '<i class="fas fa-minus"></i> Hapus Benefit'+
                                '</button>'+
                                '<textarea name="benefit[]" rows="1" placeholder="Masukkan benefit" class="form-control summernote-simple" required>'+data.details[index].detail+'</textarea>'+
                                '<div class="invalid-feedback">Wajib diisi !!</div>'+
                            '</div>'
                benefitContainer.append(html);
                $(".summernote-simple").summernote({
                    focus:true,
                    dialogsInBody: true,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                    ]
                });
            }
        }

        formModal.modal('show');
    }).catch(function (error) {
        console.log(error);
    });
}

window.addBenefit = function () {
    const html = '<div class="mt-2">'+
                    '<button type="button" onClick="removeBenefit(this)" class="btn btn-sm btn-danger text-white">'+
                        '<i class="fas fa-minus"></i> Hapus Benefit'+
                    '</button>'+
                    '<textarea name="benefit[]" rows="1" placeholder="Masukkan benefit" class="form-control summernote-simple" required></textarea>'+
                    '<div class="invalid-feedback">Wajib diisi !!</div>'+
                '</div>'
    benefitContainer.append(html);
    $(".summernote-simple").summernote({
        focus:true,
        dialogsInBody: true,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
        ]
    });
}

window.removeBenefit = function (element) {
    element.parentElement.remove();
}

new Cleave('.price', {
    numeral: true,
    numeralDecimalMark: ',',
    delimiter: '.'
});

new Cleave('.discount', {
    numeral: true,
    numeralDecimalMark: ',',
    delimiter: '.'
});

$(".summernote-simple").summernote({
    dialogsInBody: true,
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
    ]
});
