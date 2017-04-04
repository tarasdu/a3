<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            @yield('title')
        </title>

        @stack('head')
    </head>
    <body>

        <section>
            @yield('content')
        </section>

        @stack('body')

    </body>
</html>
