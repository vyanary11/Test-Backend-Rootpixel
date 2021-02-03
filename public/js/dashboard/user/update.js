(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/dashboard/user/update"],{

/***/ "./resources/js/dashboard/user/update.js":
/*!***********************************************!*\
  !*** ./resources/js/dashboard/user/update.js ***!
  \***********************************************/
/***/ (() => {

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
0,[["./resources/js/dashboard/user/update.js","/js/dashboard/manifest"]]]);