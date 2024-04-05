<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Welcome</title>
</head>
<body>
    <header>
        <h1>Welkom op onze website!</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            @guest <!-- Alleen tonen als de gebruiker niet is ingelogd -->
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else <!-- Alleen tonen als de gebruiker is ingelogd -->
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endguest
        </ul>
    </nav>

    <main>
        <p>Dit is onze aangepaste welkomstpagina. Hier kun je aangepaste inhoud toevoegen aan je welkomstpagina.</p>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Mijn Website</p>
    </footer>
</body>
</html>
