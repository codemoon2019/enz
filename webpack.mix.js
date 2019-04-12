let mix = require("laravel-mix");

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

mix
  /*
 | Core Assets
 | ** Note : Do not recomply the core asset unless you know what you are doing.
 | -- Backend core runs on bootstrap 4
 | -- Frontend core runs on bootstrap 3
 |
*/
  // Frontend
  .sass(
    "resources/assets/sass/core/frontend/app.scss",
    "public/css/frontend-core.css"
  )
  .js("resources/assets/js/core/frontend/app.js", "public/js/frontend-core.js")

  .sass("resources/assets/sass/frontend/custom/style.scss", "public/css/frontend.css")
  .sass("resources/assets/sass/frontend/logged-in/style.scss", "public/css/frontend-logged.css")
  .js("resources/assets/js/frontend/app.js", "public/js/frontend.js")


  // Backend
  .sass(
    "resources/assets/sass/core/backend/app.scss",
    "public/css/backend-core.css"
  )
  .js(
    [
      "resources/assets/js/core/backend/before.js",
      "resources/assets/js/core/backend/app.js",
      "resources/assets/js/core/backend/after.js"
    ],
    "public/js/backend-core.js"
  )

  .sass("resources/assets/sass/backend/app.scss", "public/css/backend.css")
  .js("resources/assets/js/backend/app.js", "public/js/backend.js")

  // CKEDITOR
  .js(
    [
      "resources/assets/js/backend/ckeditor/bootstrap.js",
      "public/js/plugins/ckeditor/ckeditor.js",
      "public/js/plugins/ckeditor/config.js",
      "resources/assets/js/backend/ckeditor/ckeditor.js"
    ],
    "public/js/plugins/ckeditor/app.js"
  )

  // Datatable
  .js(
    ["resources/assets/js/backend/datatable/app.js"],
    "public/js/plugins/datatable/app.js"
  )

  // Nestable
  .js(
    ["resources/assets/js/backend/menu/app.js"],
    "public/js/plugins/menu/app.js"
  );

if (mix.inProduction() || process.env.npm_lifecycle_event !== "hot") {
  mix.version();
}
