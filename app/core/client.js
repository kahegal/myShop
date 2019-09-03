
(init => {
    if (window.Raven && window.SENTRY_JS_DNS) {
        window.Raven.config(window.SENTRY_JS_DNS).install();
        window.Raven.context(init);
    } else {
        init();
    }
})(() => {
    require('./frontend');
});
