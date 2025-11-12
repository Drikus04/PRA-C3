<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem auto; max-width: 480px; }
        form { display: grid; gap: 1rem; }
        label { display: grid; gap: 0.5rem; }
        input[type="text"], input[type="email"], input[type="password"] { padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 0.5rem 1rem; border: none; background: #222; color: #fff; border-radius: 4px; cursor: pointer; }
        .errors { background: #ffe0e0; border: 1px solid #f99; padding: 1rem; border-radius: 4px; }
        .links { display: flex; justify-content: space-between; font-size: 0.9rem; }
    </style>
</head>
<body>
    <h1>Registreren</h1>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>
            Naam
            <input type="text" name="name" value="{{ old('name') }}" required autofocus>
        </label>
        <label>
            E-mailadres
            <input type="email" name="email" value="{{ old('email') }}" required>
        </label>
        <label>
            Wachtwoord
            <input type="password" name="password" required>
        </label>
        <label>
            Wachtwoord opnieuw
            <input type="password" name="password_confirmation" required>
        </label>
        <button type="submit">Maak account</button>
    </form>

    <div class="links">
        <a href="{{ route('login') }}">Al een account?</a>
        <a href="{{ route('home') }}">Terug naar start</a>
    </div>
</body>
</html>

