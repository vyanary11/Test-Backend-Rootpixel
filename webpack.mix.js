const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.postCss('resources/css/dashboard/app.css', 'public/css/dashboard')
    // Dashboard Page User List
    .postCss('resources/css/dashboard/user/user.css', 'public/css/dashboard/user')
    .js('resources/js/dashboard/user/user.js', 'public/js/dashboard/user')
    // Dashboard Page User Create
    .js('resources/js/dashboard/user/create.js', 'public/js/dashboard/user')
    // Dashboard Page User Update
    .js('resources/js/dashboard/user/update.js', 'public/js/dashboard/user')

    // Dashboard Page Blog List
    .postCss('resources/css/dashboard/blog/blog.css', 'public/css/dashboard/blog')
    .js('resources/js/dashboard/blog/blog.js', 'public/js/dashboard/blog')
    // Dashboard Page Blog Create
    .postCss('resources/css/dashboard/blog/create.css', 'public/css/dashboard/blog')
    .js('resources/js/dashboard/blog/create.js', 'public/js/dashboard/blog')
    // Dashboard Page Blog Update
    .postCss('resources/css/dashboard/blog/update.css', 'public/css/dashboard/blog')
    .js('resources/js/dashboard/blog/update.js', 'public/js/dashboard/blog')

    .js('resources/js/dashboard/dashboard.js', 'public/js/dashboard')
    .js('resources/js/frontend/app.js', 'public/js/frontend')
    .js('resources/js/dashboard/app.js', 'public/js/dashboard')
    .postCss("resources/css/frontend/app.css", "public/css/frontend", [
        require("tailwindcss"),
    ]).extract();


mix.version();
