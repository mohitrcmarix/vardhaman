(function () {
    const notice = document.getElementById('curamedix-activation-notice');
    // If notice doesn't exist, stop
    if (!notice) {
        return;
    }
    setTimeout(function () {
        const dismissButton = notice.querySelector('.notice-dismiss');
        if (dismissButton) {
            dismissButton.addEventListener('click', function (e) {
                e.preventDefault();
                // Get nonce from HTML attribute
                const nonce = notice.dataset.nonce;

                // Send AJAX request to delete transient
                fetch(ajaxurl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'action=curamedix_dismiss_notice&_ajax_nonce=' + nonce
                }).catch(() => {});
            });
        }
    }, 1000);
})();
