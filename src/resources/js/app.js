import $ from 'jquery'
import _ from 'lodash'

!(function () {
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