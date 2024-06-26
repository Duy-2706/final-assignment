<x-guest-layout>
    <x-validation-errors class="mb-4" />
    @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            {{-- <x-label for="email" value="" /> --}}
                                            <x-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')"
                                            required autofocus autocomplete="username" placeholder="Enter Email Address..."/>
                                        </div>
                                        <div class="form-group">
                                            {{-- <x-label for="password" value="" /> --}}
                                            <x-input id="password" class="form-control form-control-user" type="password" name="password"
                                            required autocomplete="current-password" placeholder="Enter Password Here"/>

                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <x-button >
                                            {{ __('Login') }}
                                        </x-button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        @if (Route::has('register'))
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</x-guest-layout>
