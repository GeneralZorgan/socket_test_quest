<div class="card border-top-0 w-100" style="border-top-left-radius: 0;">
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="loginForm__email" class="form-label">Email address</label>
                <input name="email" value="{{ request()->old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" id="loginForm__email" placeholder="name@example.com">
                @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="loginForm__password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control @error('email') is-invalid @enderror" id="loginForm__password">
                @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Войти</button>
        </form>
    </div>
</div>
