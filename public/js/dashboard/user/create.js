(self["webpackChunk"] = self["webpackChunk"] || []).push([["/js/dashboard/user/create"],{

/***/ "./resources/js/dashboard/user/create.js":
/*!***********************************************!*\
  !*** ./resources/js/dashboard/user/create.js ***!
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
0,[["./resources/js/dashboard/user/create.js","/js/dashboard/manifest"]]]);