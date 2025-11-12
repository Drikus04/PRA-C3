<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <header>
    <nav style="display:flex; gap:.75rem; justify-content:flex-end; margin: 1rem 0;">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Log out</button>
            </form>
        @else
            @if (Route::has('login'))
                <a href="{{ route('login') }}">Log in</a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </nav>
    </header>
    <main>
    @auth
        <section style="margin: 1rem 0; padding: 1rem; border: 1px solid #e5e7eb; border-radius: .5rem;">
            @if (session('status'))
                <div style="margin-bottom:.5rem; color: #065f46;">{{ session('status') }}</div>
            @endif
            <form method="POST" action="{{ route('teams.store') }}" style="display:flex; gap:.5rem; align-items:center;">
                @csrf
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Teamnaam"
                    style="padding:.5rem; border:1px solid #d1d5db; border-radius:.375rem; flex: 1 1 auto;"
                    required
                />
                <button type="submit" style="padding:.5rem .75rem; border:0; background:#111827; color:#fff; border-radius:.375rem;">Team toevoegen</button>
            </form>
            @error('name')
                <div style="color:#b91c1c; margin-top:.25rem;">{{ $message }}</div>
            @enderror
        </section>
    @endauth

    <section aria-label="Teams" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: .75rem;">
        @forelse(($teams ?? []) as $team)
            <div style="border:1px solid #e5e7eb; border-radius:.5rem; padding:.75rem;">
                <div style="font-weight:600;">{{ $team->name }}</div>
                <div style="font-size:.8rem; color:#6b7280;">Aangemaakt op {{ $team->created_at->format('d-m-Y') }}</div>
            </div>
        @empty
            <div style="color:#6b7280;">Nog geen teams aangemaakt.</div>
        @endforelse
    </section>
    </main>

    <footer>

    </footer>

</body>
</html>
