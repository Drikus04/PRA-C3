<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem auto; max-width: 480px; }
        form { display: grid; gap: 1rem; }
        label { display: grid; gap: 0.5rem; }
        input[type="email"], input[type="password"] { padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 0.5rem 1rem; border: none; background: #222; color: #fff; border-radius: 4px; cursor: pointer; }
        .errors { background: #ffe0e0; border: 1px solid #f99; padding: 1rem; border-radius: 4px; }
        .links { display: flex; justify-content: space-between; font-size: 0.9rem; }
    </style>
</head>
<body>
    <h1>Inloggen</h1>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>
            E-mailadres
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </label>
        <label>
            Wachtwoord
            <input type="password" name="password" required>
        </label>
        <label style="display: flex; align-items: center; gap: 0.5rem;">
            <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
            Onthoud mij
        </label>
        <button type="submit">Log in</button>
    </form>

    <div class="links">
        <a href="{{ route('register') }}">Nog geen account?</a>
        <a href="{{ route('home') }}">Terug naar start</a>
    </div>
</body>
</html>

