<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div id="page-container">
        <main id="main-container">
            <div class="bg-image"
                style="background-image: url('https://cdn.pixabay.com/photo/2022/11/16/16/56/city-7596379_960_720.jpg');">
                <div class="row g-0 justify-content-center bg-primary-dark-op">
                    <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                        <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                            <div
                                class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                                <div class="mb-2 text-center">
                                    <a class="link-fx fw-bold fs-1" href="index.html">
                                        <span class="text-dark">Dash</span><span class="text-primary">mix</span>
                                    </a>
                                    <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
                                </div>
                                <form class="js-validation-signin" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <div class="input-group input-group-lg">
                                            <input type="email" class="form-control"id="email"
                                                class="block mt-1 w-full" type="email" name="email"
                                                :value="old('email')" required autofocus autocomplete="username">
                                            <span class="input-group-text">
                                                <i class="fa fa-user-circle"></i>
                                            </span>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="input-group input-group-lg">
                                            <input type="password" id="password" class="form-control" type="password"
                                                name="password" required autocomplete="current-password">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                        </div>
                                    </div>
                                    <div
                                        class="d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-start mb-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="remember"
                                                id="remember_me" checked>
                                            <label class="form-check-label" for="remember">Remember Me</label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <div class="fw-semibold fs-sm py-1">
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-center mb-4">
                                        <button type="submit" class="btn btn-hero btn-primary">
                                            <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Login in
                                        </button>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
</x-guest-layout>
