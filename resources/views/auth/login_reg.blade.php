<link href="{{ asset('login&reg.css') }}" rel="stylesheet">


<!-- filepath: /c:/xampp/htdocs/prief_laravel/resources/views/auth/login_reg.blade.php -->
<div class="cont">
    {{-- فورم تسجيل الدخول --}}
    <div class="form sign-in">
        <h2>Welcome</h2>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label>
                <span>Email</span>
                <input type="email" name="email" required />
            </label> 
            <label>
                <span>Password</span>
                <input type="password" name="password" required />
            </label>
            <button type="submit" class="submit">Sign In</button>
        </form>
    </div>

    <div class="sub-cont">
        <div class="img">
            <div class="img__text m--up">
                <h3>Don't have an account? Please Sign up!</h3>
            </div>
            <div class="img__text m--in">
                <h3>If you already have an account, just sign in.</h3>
            </div>
            <div class="img__btn">
                <span class="m--up">Sign Up</span>
                <span class="m--in">Sign In</span>
            </div>
        </div>

        {{-- فورم تسجيل الحساب --}}
        <div class="form sign-up">
            <h2>Create your Account</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label>
                    <span>Name</span>
                    <input type="text" name="name" required />
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" required />
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password" required />
                </label>
                <label>
                    <span>Confirm Password</span>
                    <input type="password" name="password_confirmation" required />
                </label>
                
                <button type="submit" class="submit">Sign Up</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('.img__btn').addEventListener('click', function () {
        document.querySelector('.cont').classList.toggle('s--signup');
    });
</script>
