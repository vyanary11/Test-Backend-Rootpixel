(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/dashboard/blog/blog"],{

/***/ "./resources/js/dashboard/blog/blog.js":
/*!*********************************************!*\
  !*** ./resources/js/dashboard/blog/blog.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

__webpack_require__(/*! datatables */ "./node_modules/datatables/media/js/jquery.dataTables.js");

__webpack_require__(/*! datatables.net-bs4 */ "./node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js");

__webpack_require__(/*! datatables.net-select-bs4 */ "./node_modules/datatables.net-select-bs4/js/select.bootstrap4.js");

__webpack_require__(/*! selectric */ "./node_modules/selectric/public/jquery.selectric.js");

"use strict";

window.count_data = function () {
  window.axios.get('blog/count_data/').then(function (response) {
    var data = response.data;
    document.getElementById("all").innerHTML = data.all;
    document.getElementById("draft").innerHTML = data.draft;
    document.getElementById("published").innerHTML = data.published;
    document.getElementById("archived").innerHTML = data.archived;
  })["catch"](function (error) {
    console.log(error);
  });
};

count_data();
$("[data-checkboxes]").each(function () {
  var me = $(this),
      group = me.data('checkboxes'),
      role = me.data('checkbox-role');
  me.change(function () {
    var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
        checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
        dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
        total = all.length,
        checked_length = checked.length;

    if (role == 'dad') {
      if (me.is(':checked')) {
        all.prop('checked', true);
      } else {
        all.prop('checked', false);
      }
    } else {
      if (checked_length >= total) {
        dad.prop('checked', true);
      } else {
        dad.prop('checked', false);
      }
    }
  });
});
var dataTable = $('#data-table').DataTable({
  processing: true,
  serverSide: true,
  responsive: true,
  order: [[3, "desc"]],
  ajax: {
    url: "/dashboard/blog/data_table_server_side",
    data: function data(d) {
      d.status = $('#status').val();
    }
  },
  columns: [{
    className: "text-center",
    data: 'id',
    orderable: false,
    searchable: false
  }, {
    data: 'title',
    name: 'title'
  }, {
    data: 'author',
    name: 'author'
  }, {
    data: 'created_at',
    name: 'created_at'
  }, {
    data: 'updated_at',
    name: 'updated_at'
  }, {
    data: 'status',
    name: 'status'
  }, {
    searchable: false,
    sortable: false,
    data: 'action',
    name: 'action'
  }]
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
};

window.deleteData = function (id, name) {
  Swal.fire({
    allowEnterKey: true,
    title: 'Are you sure want to delete ?',
    text: "Will delete data " + name + " ",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
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
                return window.axios["delete"]('blog/delete/', {
                  data: {
                    id: id
                  }
                });

              case 3:
                response = _context.sent;

                if (!(response.statusText != "OK")) {
                  _context.next = 6;
                  break;
                }

                throw new Error(response.statusText);

              case 6:
                _context.next = 8;
                return response;

              case 8:
                return _context.abrupt("return", _context.sent);

              case 11:
                _context.prev = 11;
                _context.t0 = _context["catch"](0);
                Swal.showValidationMessage("Error: ".concat(_context.t0));

              case 14:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, null, [[0, 11]]);
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
      Swal.fire('Success!', 'Data ' + name + ' has been deleted!', 'success');
      count_data();
      dataTable.ajax.reload(null, false);
    }
  });
};

$('#action-selected').on('change', function () {
  var value = this.value;

  if (this.value != "") {
    var id = [];
    $.each($("input[name='id']:checked"), function () {
      id.push($(this).val());
    });

    if (id.length == 0) {
      Swal.fire('Error!', 'Select one data!', 'error');
    } else {
      deleteOrUpdateSelected(id.join(","), this.value);
    }
  }

  $(this).prop('selectedIndex', 0).selectric('refresh');
  $("#checkbox-all").prop('checked', false);
});

window.deleteOrUpdateSelected = function (id, value) {
  Swal.fire({
    allowEnterKey: true,
    title: 'Are you sure ?',
    text: "Selected data will be change to " + value + " ",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
    showLoaderOnConfirm: true,
    preConfirm: function () {
      var _preConfirm2 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.prev = 0;
                response = null;

                if (!(value == "delete")) {
                  _context2.next = 8;
                  break;
                }

                _context2.next = 5;
                return window.axios["delete"]('blog/delete_selected/', {
                  data: {
                    id: id
                  }
                });

              case 5:
                response = _context2.sent;
                _context2.next = 11;
                break;

              case 8:
                _context2.next = 10;
                return window.axios.post('blog/update_selected/', {
                  id: id,
                  status: value
                });

              case 10:
                response = _context2.sent;

              case 11:
                if (!(response.statusText != "OK")) {
                  _context2.next = 13;
                  break;
                }

                throw new Error(response.statusText);

              case 13:
                _context2.next = 15;
                return response;

              case 15:
                return _context2.abrupt("return", _context2.sent);

              case 18:
                _context2.prev = 18;
                _context2.t0 = _context2["catch"](0);
                Swal.showValidationMessage("Gagal: ".concat(_context2.t0));

              case 21:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, null, [[0, 18]]);
      }));

      function preConfirm() {
        return _preConfirm2.apply(this, arguments);
      }

      return preConfirm;
    }(),
    allowOutsideClick: function allowOutsideClick() {
      return !Swal.isLoading();
    }
  }).then(function (result) {
    if (result.isConfirmed) {
      if (value == "delete") {
        Swal.fire('Success!', 'Data has been deleted!', 'success');
      } else {
        Swal.fire('Success!', 'Data has been changed!', 'success');
      }

      count_data();
      dataTable.ajax.reload(null, false);
    }
  });
};

/***/ })

},
0,[["./resources/js/dashboard/blog/blog.js","/js/dashboard/manifest","/js/dashboard/vendor"]]]);