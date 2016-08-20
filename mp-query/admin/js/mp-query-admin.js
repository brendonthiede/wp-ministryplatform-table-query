(function ($) {
    'use strict';

    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     */

    window.handleChangePasswordClick = function (cb) {
        if (cb.checked) {
            $('#change-api-password:hidden').slideToggle();
        } else {
            $('#change-api-password:visible').slideToggle();

        }
    };
})(jQuery);
