<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        <h1>@yield('header')</h1>

        <div class="container">
            <p>Und sein name war...</p>
            <!--der folgende content ist abhängig vom child - das child 'legt also nach'-->
                @yield('content')
        </div>
    </body>
</html>

