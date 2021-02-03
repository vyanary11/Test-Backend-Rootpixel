(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/dashboard/blog/update"],{

/***/ "./resources/js/dashboard/blog/update.js":
/*!***********************************************!*\
  !*** ./resources/js/dashboard/blog/update.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! summernote */ "./node_modules/summernote/dist/summernote.js");

__webpack_require__(/*! selectric */ "./node_modules/selectric/public/jquery.selectric.js");

__webpack_require__(/*! bootstrap-tagsinput */ "./node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.js");

$(".inputtags").tagsinput('items');

window.readURL = function (input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('.img-thumbnail').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
};

/***/ })

},
0,[["./resources/js/dashboard/blog/update.js","/js/dashboard/manifest","/js/dashboard/vendor"]]]);