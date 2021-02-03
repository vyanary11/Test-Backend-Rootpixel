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


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

__webpack_require__(/*! datatables */ "./node_modules/datatables/media/js/jquery.dataTables.js");

__webpack_require__(/*! datatables.net-bs4 */ "./node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js");

__webpack_require__(/*! datatables.net-select-bs4 */ "./node_modules/datatables.net-select-bs4/js/select.bootstrap4.js");

"use strict";

var dataTable = $('#data-table').DataTable({
  processing: true,
  serverSide: true,
  responsive: true,
  order: [[0, "desc"]],
  ajax: {
    url: "/dashboard/user/data_table_server_side"
  },
  columns: [{
    className: "text-center",
    data: 'DT_RowIndex',
    orderable: false,
    searchable: false
  }, {
    data: 'name',
    name: 'name'
  }, {
    data: 'email',
    name: 'email'
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
                return window.axios["delete"]('user/delete/', {
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
      dataTable.ajax.reload(null, false);
    }
  });
};

/***/ }),

/***/ "./resources/css/frontend/app.css":
/*!****************************************!*\
  !*** ./resources/css/frontend/app.css ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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

/***/ "./resources/css/dashboard/blog/update.css":
/*!*************************************************!*\
  !*** ./resources/css/dashboard/blog/update.css ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
0,[["./resources/js/dashboard/user/user.js","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/dashboard/app.css","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/dashboard/user/user.css","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/dashboard/blog/blog.css","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/dashboard/blog/create.css","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/dashboard/blog/update.css","/js/dashboard/manifest","/js/dashboard/vendor"],["./resources/css/frontend/app.css","/js/dashboard/manifest","/js/dashboard/vendor"]]]);