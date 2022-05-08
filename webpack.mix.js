const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')

mix.setPublicPath('public')
mix.copy(
  'public',
  '../../public/vendor/sole-x/blog',
)

mix.js('resources/js/app.js', 'public/js')
mix.sass('resources/css/app.scss', 'public/css')

mix.options({
  postCss: [tailwindcss('./tailwind.config.js')],
})

if (mix.inProduction()) {
  mix.version()
}
