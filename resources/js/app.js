import $ from 'jquery'
import _ from 'lodash'
import hljs from 'highlight.js'
import Alpine from 'alpinejs'

window.$ = $
window.Alpine = Alpine

require('./bootstrap');



Alpine.start()

// import 'remixicon/fonts/remixicon.css'
// import Han from 'han-css/dist/han.min'
// import 'han-css/dist/han.min.css'

window.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.markdown-body pre code').forEach((block) => {
    hljs.highlightElement(block)
  })
})
!(function () {
  // Han(document.body).render()
  {
    const $profile = $('#header-profile')
    let profileHide = _.debounce(() => $profile.stop().hide(), 50)
    $('#toggle-header-profile')
      .on('mouseover', () => {
        $profile.stop().show()
        profileHide && profileHide.cancel && profileHide.cancel()
      })
      .on('mouseleave', () => {
        profileHide = _.debounce(() => $profile.stop().hide(), 50)
        profileHide()
      })
  }

  {
    const $notification = $('#header-notification')

    let notificationHide = _.debounce(() => $notification.stop().hide(), 50)
    $('#toggle-header-notification')
      .on('mouseover', () => {
        $notification.stop().show()
        notificationHide && notificationHide.cancel && notificationHide.cancel()
      })
      .on('mouseleave', () => {
        notificationHide = _.debounce(() => $notification.stop().hide(), 50)
        notificationHide()
      })
  }
})()
