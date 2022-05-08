const colors = require('tailwindcss/colors')
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        green: colors.emerald,
        yellow: colors.amber,
        purple: colors.violet,
      },
    },
  },
  // 一些样式来自于数据库保存， tailwind css 扫描不到，就会移除，可以添加一个安全列表，让 tailwind css 始终打包这些。
  safelist: [
    {
      pattern: /bg-([a-zA-Z]+)-(\d+)?/,
    },
  ],
  corePlugins: {
    aspectRatio: false,
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/aspect-ratio'),
  ],
}
