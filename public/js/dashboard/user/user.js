(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/dashboard/user/user"],{

/***/ "./resources/js/dashboard/user/user.js":
/*!*********************************************!*\
  !*** ./resources/js/dashboard/user/user.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var cleave_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! cleave.js */ "./node_modules/cleave.js/dist/cleave-esm.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }



__webpack_require__(/*! datatables */ "./node_modules/datatables/media/js/jquery.dataTables.js");

__webpack_require__(/*! datatables.net-bs4 */ "./node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js");

__webpack_require__(/*! datatables.net-select-bs4 */ "./node_modules/datatables.net-select-bs4/js/select.bootstrap4.js");

__webpack_require__(/*! summernote */ "./node_modules/summernote/dist/summernote.js");

"use strict";

var formModal = $('#form-modal');
var formModalTittle = $('#form-modalLabel');
var form = $('#form');
var buttonSubmit = $('button[type="submit"]');
var benefitContainer = $('#benefit-container');
var dataTable = $('#data-table').DataTable({
  processing: true,
  serverSide: true,
  responsive: true,
  ajax: "/admin/paket-harga/data_table_server_side",
  columns: [{
    data: 'DT_RowIndex',
    orderable: false,
    searchable: false
  }, {
    data: 'name',
    name: 'name'
  }, {
    data: 'price',
    name: 'price'
  }, {
    data: 'discount',
    name: 'discount'
  }, {
    data: 'price_after_discount',
    name: 'price_after_discount'
  }, {
    searchable: false,
    sortable: false,
    data: 'action',
    name: 'action'
  }]
});

window.deleteData = function (id, name) {
  Swal.fire({
    allowEnterKey: true,
    title: 'Yakin Ingin Menghapus ?',
    text: "Akan menghapus data " + name + " ",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya',
    cancelButtonText: 'Tidak',
    showLoaderOnConfirm: true,
    preConfirm: function () {
      var _preConfirm = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.prev = 0;
                _context.next = 3;
                return window.axios["delete"]('paket-harga/delete/', {
                  data: {
                    id: id
                  }
                });

              case 3:
                response = _context.sent;
                console.log(response);

                if (!(response.statusText != "OK")) {
                  _context.next = 7;
                  break;
                }

                throw new Error(response.statusText);

              case 7:
                _context.next = 9;
                return response;

              case 9:
                return _context.abrupt("return", _context.sent);

              case 12:
                _context.prev = 12;
                _context.t0 = _context["catch"](0);
                Swal.showValidationMessage("Gagal: ".concat(_context.t0));

              case 15:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, null, [[0, 12]]);
      }));

      function preConfirm() {
        return _preConfirm.apply(this, arguments);
      }

      return preConfirm;
    }(),
    allowOutsideClick: function allowOutsideClick() {
      return !Swal.isLoading();
    }
  }).then(function (result) {
    if (result.isConfirmed) {
      dataTable.ajax.reload(null, false);
      Swal.fire('Berhasil!', 'Data berhasil dihapus!', 'success');
    }
  });
};

formModal.on('hidden.bs.modal', function (event) {
  clearFormModal();
  formModalTittle.html('Tambah Paket Harga');
  form.attr('action', '/admin/paket-harga/store');
  buttonSubmit.text('Simpan');
});

window.clearFormModal = function () {
  form.trigger('reset');
  form.removeClass('was-validated');
  $('#persen').attr('checked', true);
  $('#nominal').attr('checked', false);
  $('.benefit-plus').remove();
};

window.editFormModal = function (id) {
  form.attr('action', '/admin/paket-harga/update/' + id);
  formModalTittle.html('Edit Paket Harga');
  buttonSubmit.text('Update');
  window.axios.get('paket-harga/update/' + id).then(function (response) {
    var data = response.data;
    $('input[name="name"]').val(data.name);
    $('input[name="price"]').val(new Intl.NumberFormat(['id']).format(data.price));
    $('input[name="discount"]').val(new Intl.NumberFormat(['id']).format(data.discount));

    if (data.type_discount == "persen") {
      $('#persen').attr('checked', true);
      $('#nominal').attr('checked', false);
    } else {
      $('#persen').attr('checked', false);
      $('#nominal').attr('checked', true);
    }

    for (var index = 0; index < data.details.length; index++) {
      if (index == 0) {
        $('.note-editable').html(data.details[index].detail);
      } else {
        var html = '<div class="benefit-plus mt-2">' + '<button type="button" onClick="removeBenefit(this)" class="btn btn-sm btn-danger text-white">' + '<i class="fas fa-minus"></i> Hapus Benefit' + '</button>' + '<textarea name="benefit[]" rows="1" placeholder="Masukkan benefit" class="form-control summernote-simple" required>' + data.details[index].detail + '</textarea>' + '<div class="invalid-feedback">Wajib diisi !!</div>' + '</div>';
        benefitContainer.append(html);
        $(".summernote-simple").summernote({
          focus: true,
          dialogsInBody: true,
          toolbar: [['style', ['bold', 'italic', 'underline', 'clear']]]
        });
      }
    }

    formModal.modal('show');
  })["catch"](function (error) {
    console.log(error);
  });
};

window.addBenefit = function () {
  var html = '<div class="mt-2">' + '<button type="button" onClick="removeBenefit(this)" class="btn btn-sm btn-danger text-white">' + '<i class="fas fa-minus"></i> Hapus Benefit' + '</button>' + '<textarea name="benefit[]" rows="1" placeholder="Masukkan benefit" class="form-control summernote-simple" required></textarea>' + '<div class="invalid-feedback">Wajib diisi !!</div>' + '</div>';
  benefitContainer.append(html);
  $(".summernote-simple").summernote({
    focus: true,
    dialogsInBody: true,
    toolbar: [['style', ['bold', 'italic', 'underline', 'clear']]]
  });
};

window.removeBenefit = function (element) {
  element.parentElement.remove();
};

new cleave_js__WEBPACK_IMPORTED_MODULE_1__.default('.price', {
  numeral: true,
  numeralDecimalMark: ',',
  delimiter: '.'
});
new cleave_js__WEBPACK_IMPORTED_MODULE_1__.default('.discount', {
  numeral: true,
  numeralDecimalMark: ',',
  delimiter: '.'
});
$(".summernote-simple").summernote({
  dialogsInBody: true,
  toolbar: [['style', ['bold', 'italic', 'underline', 'clear']]]
});

/***/ }),

/***/ "./resources/css/dashboard/app.css":
/*!*****************************************!*\
  !*** ./resources/css/dashboard/app.css ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/dashboard/user/user.css":
/*!***********************************************!*\
  !*** ./resources/css/dashboard/user/user.css ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/dashboard/blog/blog.css":
/*!***********************************************!*\
  !*** ./resources/css/dashboard/blog/blog.css ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/dashboard/blog/create.css":
/*!*************************************************!*\
  !*** ./resources/css/dashboard/blog/create.css ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/frontend/app.css":
/*!****************************************!*\
  !*** ./resources/css/frontend/app.css ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
0,[["./resources/js/dashboard/user/user.js","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/dashboard/app.css","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/dashboard/user/user.css","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/dashboard/blog/blog.css","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/dashboard/blog/create.css","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/frontend/app.css","/js/dashboard/manifest","/js/dashboard/vendor"]]]);