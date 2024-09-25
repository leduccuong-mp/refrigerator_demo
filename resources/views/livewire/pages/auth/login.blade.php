<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('admins.layouts.guest');

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
};

$loginAdmin = function () {
    $this->validate();

    $this->form->authenticateAdmin();

    Session::regenerate();

    $this->redirectIntended(default: '/', navigate: true);
};

?>

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a class="h1"><b>Refrigerator</b></a>
        </div>
        <div class="card-body">

            <form wire:submit="loginAdmin" method="post">
                <div class="input-group mb-3">
                    <input wire:model="form.email" id="email" type="email" class="form-control" placeholder="{{ __('Email') }}" required autofocus autocomplete="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input wire:model="form.password" id="password" type="password" class="form-control" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input wire:model="form.remember" id="remember" type="checkbox" type="checkbox">
                            <label for="remember">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
            @if (Route::has('password.request'))
            <p class="mb-1">
                <a wire:navigate href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
            </p>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

