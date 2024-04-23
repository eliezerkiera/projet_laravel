<form action="{{route('login')}}" name="auth-login-form" method="POST">
    @csrf

    <div class="mb-3">
        <label for="auth-login-form-email" class="form-label">{{__('Email address')}}</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="auth-login-form-email" aria-describedby="emailHelp" value="{{old('email')}}" name='email'>
        @error('email')
            <div class="invalid-feedback d-block">{{$message}}</div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="auth-login-form-password" class="form-label">{{__('Password')}}</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="auth-login-form-password" aria-describedby="passwordHelp" value="{{old('password')}}">
        @error('password')
            <div class="invalid-feedback d-block">{{$message}}</div>
        @enderror
    </div>


    <button class="btn btn-primary" type="submit">{{__('Login')}}</button>
</form>
