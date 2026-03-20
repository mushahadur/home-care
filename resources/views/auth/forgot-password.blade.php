
@extends('frontend.layouts.app')

@section('title', 'Forgot Password')

@section('content')

<style>
    .form-card {
        border: 2px solid var(#6B8E23);
        border-radius: 8px;
        background-color: rgba(254, 251, 251, 0.982);
        overflow: hidden;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 350px;
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .tab-btn {
        /* flex: 1; */
        padding: 15px;
        border: none;
        background: none;
        cursor: pointer;
        font-weight: bold;
        color: #777;
        transition: color 0.3s;
    }

    .tab-btn.active {
        color: #28a745;
        border-bottom: 2px solid #28a745;
    }

    .form-card {
        display: none;
        animation: fadeIn 0.5s ease;
    }

    .form-card.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<main class="main">
    <!-- End Page Title -->
    <section id="login" class="section dark-background-auth">
        <div class="auth-tabs d-flex my-4 flex-row justify-content-center">
            <button class="tab-btn active text-xl">Forgot Password</button>
        </div>
        <div class="container d-flex justify-content-center">

            <form method="POST" action="{{ route('password.email') }}" class="border border-success-subtle p-4 rounded needs-validation form-card active">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-dark">{{ __('Email') }}</label>
                    <input type="email" name="email" autofocus placeholder="Enter Your Email " class="form-control">
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-sm py-1 px-4">{{ __('Email Password Reset Link') }}</button>
                </div>
            </form>
        </div>

    </section>

</main>
@endsection