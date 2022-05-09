const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')
const purgeCss = require('@fullhuman/postcss-purgecss')
const path = require('path')

mix.setPublicPath('public')
if (!mix.inProduction()) {

  mix.copyDirectory(
    path.resolve('./public'),
    path.resolve('../../public/vendor/sole-x/blog'),
  )

}

mix.js('resources/js/app.js', 'public/js')
mix.sass('resources/css/app.scss', 'public/css')

mix.options({
  postCss: [
    tailwindcss('./tailwind.config.js'),
    purgeCss({
      content: [
        'resources/**/*.blade.php',
        'resources/**/*.js',
      ],
      defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
      whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/, /hljs/],
      safelist: {
        deep: [/(bg|text)-\w+-\d+/, /hljs/, /markdown-body/],
      },
    })],
})

mix.extract(['alpinejs', 'jquery', 'lodash', 'axios', 'highlight.js'])

if (mix.inProduction()) {
  mix.version()
}
