<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    @include('en.store.head')
</head>
<body class="preload-wrapper" >

    <div id="wrapper">
        @include("en.store.nav")
        @yield("content")
        @include("en.store.footer")
    </div>
    @include("en.store.modals")

</body>
</html>