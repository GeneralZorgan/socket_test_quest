<div class="card border-top-0 w-100" style="border-top-left-radius: 0;">
    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="loginForm__name" class="form-label">Name</label>
                <input value="{{ request()->old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="loginForm__name" placeholder="Sergey">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="loginForm__email" class="form-label">Email address</label>
                <input value="{{ request()->old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="loginForm__email" placeholder="name@example.com">
                @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="loginForm__password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="loginForm__password">
                @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="loginForm__passwordConfirmation" class="form-label">Confirm password</label>
                <input name="password_confirmation" type="password" class="form-control" id="loginForm__passwordConfirmation">
            </div>
            <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
        </form>
    </div>
</div>
