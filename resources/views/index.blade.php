<!DOCTYPE html>
<html class="theme-light" lang="en">

<head>
    <title>Title</title>
    <!-- Primary Meta Tags -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/gif" sizes="16x16">
    <meta name="title" content="title">
    <meta name="description" content="site description">
    <meta name="keywords" content="Site, Description">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mywebsite.com">
    <meta property="og:title" content="title">
    <meta property="og:description" content="site description">
    <meta property="og:image" content="https://myimage.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://mywebsite.com">
    <meta property="twitter:title" content="title">
    <meta property="twitter:description" content="site description">
    <meta property="twitter:image" content="https://myimage.jpg">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <noscript>
        <div align="center">
            <p>Please Enable javascript</p>
        </div>
    </noscript>
    <div id="app"></div>

    <script>
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        }
    </script>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>