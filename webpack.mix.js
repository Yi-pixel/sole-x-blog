const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')

mix.js('resources/js/app.js')
mix.sass('resources/css/app.scss', 'public/css')

mix.options({
  postCss: [tailwindcss('./tailwind.config.js')],
})

if (mix.inProduction()) {
  mix.version()
}
