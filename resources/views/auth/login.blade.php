@extends('frontend.master')

@section('content')

<style>
    .auth-premium-section {
        min-height: 100vh;
        padding: 150px 0 90px;
        background:
            linear-gradient(90deg, rgba(5, 9, 18, .92), rgba(5, 9, 18, .72)),
            url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1800&q=80') center/cover no-repeat;
        position: relative;
        overflow: hidden;
    }
    .auth-premium-box {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 38px;
        align-items: stretch;
    }
    .auth-copy {
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 520px;
    }
    .auth-tag {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        width: fit-content;
        padding: 9px 15px;
        border-radius: 999px;
        background: rgba(20, 184, 166, .16);
        color: var(--gold-light);
        border: 1px solid rgba(20, 184, 166, .32);
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 20px;
    }
    .auth-copy h1 {
        font-family: "Playfair Display", serif;
        font-size: 54px;
        line-height: 1.05;
        font-weight: 800;
        margin: 0 0 18px;
        color: #fff;
    }
    .auth-copy h1 span {
        color: var(--gold-light);
        display: block;
    }
    .auth-copy p {
        max-width: 560px;
        color: rgba(255,255,255,.78);
        font-size: 16px;
        line-height: 1.75;
        margin-bottom: 26px;
    }
    .auth-highlights {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
        max-width: 560px;
    }
    .auth-highlight {
        padding: 14px;
        border-radius: 8px;
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.14);
        color: #fff;
    }
    .auth-highlight i {
        color: var(--gold-light);
        display: block;
        margin-bottom: 8px;
    }
    .auth-highlight span {
        font-size: 13px;
        font-weight: 600;
    }
    .auth-card {
        background: rgba(255,255,255,.96);
        border: 1px solid rgba(255,255,255,.42);
        border-radius: 8px;
        padding: 34px;
        box-shadow: 0 30px 90px rgba(0,0,0,.28);
        backdrop-filter: blur(16px);
    }
    .auth-card-head {
        text-align: center;
        margin-bottom: 24px;
    }
    .auth-card-icon {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #111827;
        color: var(--gold-light);
        font-size: 24px;
        margin-bottom: 15px;
    }
    .auth-card h2 {
        font-family: "Playfair Display", serif;
        color: #111827;
        font-size: 32px;
        font-weight: 800;
        margin: 0 0 8px;
    }
    .auth-card-head p {
        color: #64748b;
        margin: 0;
        font-size: 14px;
    }
    .auth-alert {
        padding: 12px 14px;
        border-radius: 8px;
        background: #eff6ff;
        color: #1d4ed8;
        border: 1px solid #bfdbfe;
        font-size: 13px;
        margin-bottom: 18px;
    }
    .auth-field {
        margin-bottom: 18px;
    }
    .auth-field label {
        color: #111827;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
        display: block;
    }
    .auth-input-wrap {
        position: relative;
    }
    .auth-input-wrap i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gold);
        font-size: 16px;
    }
    .auth-input {
        width: 100%;
        height: 50px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 0 15px 0 44px;
        outline: none;
        font-size: 14px;
        color: #111827;
        background: #fff;
        transition: .2s ease;
    }
    .auth-input:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 4px rgba(20, 184, 166, .12);
    }
    .auth-error {
        color: #dc2626;
        font-size: 12px;
        margin: 6px 0 0;
    }
    .auth-options {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin: 4px 0 22px;
        font-size: 13px;
    }
    .auth-check {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #475569;
        font-weight: 600;
    }
    .auth-check input {
        accent-color: var(--gold);
    }
    .auth-link {
        color: var(--gold-dark);
        font-weight: 700;
        text-decoration: none;
    }
    .auth-link:hover {
        color: #111827;
    }
    .auth-btn {
        width: 100%;
        height: 52px;
        border: 0;
        border-radius: 8px;
        background:
            radial-gradient(circle at 30% 20%, rgba(255, 255, 255, .36), transparent 30%),
            linear-gradient(135deg, var(--gold-light), var(--gold), var(--gold-dark));
        color: #ffffff;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: .2s ease;
    }
    .auth-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 35px rgba(20, 184, 166, .32);
    }
    .auth-bottom {
        text-align: center;
        margin: 22px 0 0;
        color: #64748b;
        font-size: 14px;
    }
    @media(max-width: 991px) {
        .auth-premium-box { grid-template-columns: 1fr; }
        .auth-copy { min-height: auto; text-align: center; align-items: center; }
        .auth-copy h1 { font-size: 42px; }
    }
    @media(max-width: 575px) {
        .auth-premium-section { padding: 120px 0 60px; }
        .auth-card { padding: 24px; }
        .auth-highlights { grid-template-columns: 1fr; }
        .auth-copy h1 { font-size: 34px; }
        .auth-options { align-items: flex-start; flex-direction: column; }
    }
</style>

<section class="auth-premium-section">
    <div class="container">
        <div class="auth-premium-box">
            <div class="auth-copy">
                <span class="auth-tag">
                    <i class="bi bi-shield-check"></i>
                    Admin Access
                </span>
                <h1>Manage Your Luxury Fleet <span>With Confidence</span></h1>
                <p>Login to handle cars, bookings, enquiries, gallery, services and website settings from one premium dashboard.</p>

                <div class="auth-highlights">
                    <div class="auth-highlight">
                        <i class="bi bi-car-front"></i>
                        <span>Fleet Control</span>
                    </div>
                    <div class="auth-highlight">
                        <i class="bi bi-calendar-check"></i>
                        <span>Booking Leads</span>
                    </div>
                    <div class="auth-highlight">
                        <i class="bi bi-gear"></i>
                        <span>Site Settings</span>
                    </div>
                </div>
            </div>

            <div class="auth-card">
                <div class="auth-card-head">
                    <div class="auth-card-icon">
                        <i class="bi bi-gem"></i>
                    </div>
                    <h2>{{ trans('global.login') }}</h2>
                    <p>{{ trans('panel.site_title') }} admin panel</p>
                </div>

                @if(session('message'))
                    <div class="auth-alert">{{ session('message') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="auth-field">
                        <label>{{ trans('global.login_email') }}</label>
                        <div class="auth-input-wrap">
                            <i class="bi bi-envelope"></i>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus class="auth-input {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="admin@example.com">
                        </div>
                        @if($errors->has('email'))
                            <p class="auth-error">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="auth-field">
                        <label>{{ trans('global.login_password') }}</label>
                        <div class="auth-input-wrap">
                            <i class="bi bi-lock"></i>
                            <input type="password" name="password" required class="auth-input {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Enter password">
                        </div>
                        @if($errors->has('password'))
                            <p class="auth-error">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="auth-options">
                        <label class="auth-check">
                            <input type="checkbox" name="remember">
                            {{ trans('global.remember_me') }}
                        </label>

                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="auth-link">{{ trans('global.forgot_password') }}</a>
                        @endif
                    </div>

                    <button type="submit" class="auth-btn">
                        {{ trans('global.login') }}
                        <i class="bi bi-arrow-right"></i>
                    </button>

                    @if(Route::has('register'))
                        <p class="auth-bottom">
                            New admin user?
                            <a href="{{ route('register') }}" class="auth-link">{{ trans('global.register') }}</a>
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
