<section>
    <header>
        <h2>
            {{ __('Informazioni profilo') }}
        </h2>

        <p>
            {{ __("Modifica i dati del profilo e l'email") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="form_small">
        @csrf
        @method('patch')

        <div class="mb-2">
            <label for="name" class="label_create">{{ __('Nome') }}</label>
            <input class="form-control input_create" type="text" name="name" id="name" autocomplete="name"
                value="{{ old('name', $user->name) }}" required autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->get('name') }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="email" class="label_create">
                {{ __('Email') }}
            </label>

            <input id="email" name="email" type="email" class="form-control input_create"
                value="{{ old('email', $user->email) }}" required autocomplete="username" />

            @error('email')
                <span class="alert alert-danger mt-2" role="alert">
                    <strong>{{ $errors->get('email') }}</strong>
                </span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-muted">
                        {{ __('La tua email non e stata verificata') }}

                        <button form="send-verification" class="btn btn-outline-dark">
                            {{ __("Clicca qui per rimandare la verifica attraverso l'email") }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('Un nuovo link di verifica e stato mandato alla tua email') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-primary" type="submit">{{ __('Salva') }}</button>

            @if (session('status') === 'profile-updated')
                <script>
                    const show = true;
                    setTimeout(() => show = false, 2000)
                    const el = document.getElementById('profile-status')
                    if (show) {
                        el.style.display = 'block';
                    }
                </script>
                <p id='profile-status' class="fs-5 text-muted">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
