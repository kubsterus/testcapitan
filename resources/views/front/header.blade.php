<div id="header">
    <div class="container">

        <!-- Logo -->
        <div id="logo">
            <h1><a href="#">Royale</a></h1>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                @guest
                    <li><a href="/login">Log In</a></li>
                @else
                    <li><a href="/admin">Admin Panel</a></li>
                    @endguest
            </ul>
        </nav>

    </div>
</div>