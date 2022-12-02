<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script>
    WebFont.load({
        google: {"families": ["Lato:300,400,700,900"]},
        custom: {
            "families": [
                "Flaticon",
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['{{ asset('assets/css/fonts.min.css') }}']
        },
        active: function () {
            sessionStorage.fonts = true;
        }
    });
</script>
