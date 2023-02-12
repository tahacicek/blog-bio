<x-app-layout>
    <main id="main-container">
        <div class="content content-full content-boxed">
            <div class="rounded border overflow-hidden push">
                <div class="bg-image pt-9" style="background-image: url('assets/media/photos/photo19@2x.jpg');"></div>
                <div class="px-4 py-3 bg-body-extra-light d-flex flex-column flex-md-row align-items-center">
                    <a class="d-block img-link mt-n5" href="be_pages_generic_profile_v2.html">
                        <img class="img-avatar img-avatar128 img-avatar-thumb" src="assets/media/avatars/avatar13.jpg"
                            alt="">
                    </a>
                    <div class="ms-3 flex-grow-1 text-center text-md-start my-3 my-md-0">
                        <h1 class="fs-4 fw-bold mb-1">John Smith</h1>
                        <h2 class="fs-sm fw-medium text-muted mb-0">
                            Edit Account
                        </h2>
                    </div>
                    <div class="space-x-1">
                        <a href="be_pages_generic_profile_v2.html" class="btn btn-sm btn-alt-secondary space-x-1">
                            <i class="fa fa-arrow-left opacity-50"></i>
                            <span>Back to Profile</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="block block-bordered block-rounded">
                <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link space-x-1 active" id="account-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#account-profile" role="tab" aria-controls="account-profile"
                            aria-selected="true">
                            <i class="fa fa-user-circle d-sm-none"></i>
                            <span class="d-none d-sm-inline">Profile</span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link space-x-1" id="account-password-tab" data-bs-toggle="tab"
                            data-bs-target="#account-password" role="tab" aria-controls="account-password"
                            aria-selected="false">
                            <i class="fa fa-asterisk d-sm-none"></i>
                            <span class="d-none d-sm-inline">Password</span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link space-x-1" id="account-connections-tab" data-bs-toggle="tab"
                            data-bs-target="#account-connections" role="tab" aria-controls="account-connections"
                            aria-selected="false">
                            <i class="fa fa-share-alt d-sm-none"></i>
                            <span class="d-none d-sm-inline">Connections</span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link space-x-1" id="account-billing-tab" data-bs-toggle="tab"
                            data-bs-target="#account-billing" role="tab" aria-controls="account-billing"
                            aria-selected="false">
                            <i class="fa fa-credit-card d-sm-none"></i>
                            <span class="d-none d-sm-inline">Billing</span>
                        </button>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane active" id="account-profile" role="tabpanel" aria-labelledby="account-profile-tab"
                        tabindex="0">
                        <div class="row push p-sm-2 p-lg-4">
                            <div class="offset-xl-1 col-xl-4 order-xl-1">
                                <p class="bg-body-dark p-4 rounded-3 text-muted fs-sm">
                                   Genel hesap ayarları. Kullanııc adınızı herkes görebilir. Kullanıcı adı benzersiz olmak zorundadır.
                                </p>
                            </div>
                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>
                            <div class="col-xl-6 order-xl-0">
                                <form action="be_pages_generic_profile_v2_edit.html" method="post"
                                    action="{{ route('profile.update') }}" enctype="multipart/form-data"
                                    onsubmit="return false;">
                                    @csrf
                                    @method('patch')
                                    <div class="mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ old('username', $user->username) }}" required autofocus
                                            autocomplete="username">
                                            <x-input-error class="mt-2" :messages="$errors->get('username')" />


                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="dm-profile-edit-name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="dm-profile-edit-email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            type="email" value="{{ old('email', $user->email) }}" required
                                            autocomplete="username">
                                      <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                    </div>
                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                        <div>
                                            <p class="text-sm mt-2 text-gray-800">
                                                {{ __('Your email address is unverified.') }}

                                                <button form="send-verification"
                                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    {{ __('Click here to re-send the verification email.') }}
                                                </button>
                                            </p>

                                            @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 font-medium text-sm text-green-600">
                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="mb-4">
                                        <label class="form-label">Your Avatar</label>
                                        <div class="push">
                                            <img class="img-avatar" src="assets/media/avatars/avatar13.jpg"
                                                alt="">
                                        </div>
                                        <label class="form-label" for="avatar">Choose a new avatar</label>
                                        <input class="form-control" type="file" id="avatar" name="avatar">
                                      <x-input-error class="mt-2" :messages="$errors->get('avatar')" />

                                    </div>
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-check-circle opacity-50 me-1"></i> Update Profile
                                    </button>
                                    @if (session('status') === 'profile-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="account-password" role="tabpanel" aria-labelledby="account-password-tab"
                        tabindex="0">
                        <div class="row push p-sm-2 p-lg-4">
                            <div class="offset-xl-1 col-xl-4 order-xl-1">
                                <p class="bg-body-light p-4 rounded-3 text-muted fs-sm">
                                    Changing your sign in password is an easy way to keep your account secure.
                                </p>
                            </div>
                            <div class="col-xl-6 order-xl-0">
                                <form action="be_pages_generic_profile_v2_edit.html"
                                    onsubmit="return false;"  method="post" action="{{ route('password.update') }}">
                                    @csrf
                                    @method('put')
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label class="form-label" for="dm-profile-edit-password-new">Şifreniz</label>
                                            <input type="password" class="form-control"  id="current_password" name="current_password" type="password"  autocomplete="current-password"/>
                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="dm-profile-edit-password">Yeni Şifre</label>
                                        <input type="password" class="form-control"id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label class="form-label" for="dm-profile-edit-password-new-confirm">Yeni Şifreyi Doğrula</label>
                                            <input type="password" class="form-control"
                                            id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-check-circle opacity-50 me-1"></i> Update Password
                                    </button>
                                    @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="account-connections" role="tabpanel"
                        aria-labelledby="account-connections-tab" tabindex="0">
                        <div class="row push p-sm-2 p-lg-4">
                            <div class="offset-xl-1 col-xl-4 order-xl-1">
                                <p class="bg-body-light p-4 rounded-3 text-muted fs-sm">
                                    You can connect your account to third party networks to get extra features.
                                </p>
                            </div>
                            <div class="col-xl-6 order-xl-0">
                                <form action="be_pages_generic_profile_v2_edit.html" method="POST"
                                    onsubmit="return false;">
                                    <div class="row mb-4">
                                        <div class="col-sm-10 col-lg-8">
                                            <a class="btn w-100 btn-alt-danger text-start" href="javascript:void(0)">
                                                <i class="fab fa-fw fa-google opacity-50 me-1"></i> Connect to Google
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-10 col-lg-8">
                                            <a class="btn w-100 btn-alt-info text-start" href="javascript:void(0)">
                                                <i class="fab fa-fw fa-twitter opacity-50 me-1"></i> Connect to Twitter
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-10 col-lg-8">
                                            <a class="btn w-100 btn-alt-primary bg-white d-flex align-items-center justify-content-between"
                                                href="javascript:void(0)">
                                                <span>
                                                    <i class="fab fa-fw fa-facebook me-1"></i> John Doe
                                                </span>
                                                <i class="fa fa-fw fa-check me-1"></i>
                                            </a>
                                        </div>
                                        <div class="mt-2">
                                            <a class="btn btn-sm btn-alt-secondary rounded-pill"
                                                href="javascript:void(0)">
                                                <i class="fa fa-fw fa-pencil-alt opacity-50 me-1"></i> Edit Facebook
                                                Connection
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-10 col-lg-8">
                                            <a class="btn w-100 btn-alt-warning bg-white d-flex align-items-center justify-content-between"
                                                href="javascript:void(0)">
                                                <span>
                                                    <i class="fab fa-fw fa-instagram me-1"></i> @john_doe
                                                </span>
                                                <i class="fa fa-fw fa-check me-1"></i>
                                            </a>
                                        </div>
                                        <div class="mt-2">
                                            <a class="btn btn-sm btn-alt-secondary rounded-pill"
                                                href="javascript:void(0)">
                                                <i class="fa fa-fw fa-pencil-alt opacity-50 me-1"></i> Edit Instagram
                                                Connection
                                            </a>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-check-circle opacity-50 me-1"></i> Update Connections
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="account-billing" role="tabpanel" aria-labelledby="account-billing-tab"
                        tabindex="0">
                        <div class="row push p-sm-2 p-lg-4">
                            <div class="offset-xl-1 col-xl-4 order-xl-1">
                                <p class="bg-body-light p-4 rounded-3 text-muted fs-sm">
                                    Your billing information is never shown to other users and only used for creating your
                                    invoices.
                                </p>
                            </div>
                            <div class="col-xl-6 order-xl-0">
                                @include('profile.partials.delete-user-form')
                                <form action="be_pages_generic_profile_v2_edit.html" method="POST"
                                    onsubmit="return false;">
                                    <div class="mb-4">
                                        <label class="form-label" for="dm-profile-edit-company-name">Company Name
                                            (Optional)</label>
                                        <input type="text" class="form-control" id="dm-profile-edit-company-name"
                                            name="dm-profile-edit-company-name">
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label class="form-label" for="dm-profile-edit-firstname">Firstname</label>
                                            <input type="text" class="form-control" id="dm-profile-edit-firstname"
                                                name="dm-profile-edit-firstname">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label" for="dm-profile-edit-lastname">Lastname</label>
                                            <input type="text" class="form-control" id="dm-profile-edit-lastname"
                                                name="dm-profile-edit-lastname">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="dm-profile-edit-street-1">Street Address 1</label>
                                        <input type="text" class="form-control" id="dm-profile-edit-street-1"
                                            name="dm-profile-edit-street-1">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="dm-profile-edit-street-2">Street Address 2</label>
                                        <input type="text" class="form-control" id="dm-profile-edit-street-2"
                                            name="dm-profile-edit-street-2">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="dm-profile-edit-city">City</label>
                                        <input type="text" class="form-control" id="dm-profile-edit-city"
                                            name="dm-profile-edit-city">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="dm-profile-edit-postal">Postal code</label>
                                        <input type="text" class="form-control" id="dm-profile-edit-postal"
                                            name="dm-profile-edit-postal">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="dm-profile-edit-vat">VAT Number</label>
                                        <input type="text" class="form-control" id="dm-profile-edit-vat"
                                            name="dm-profile-edit-vat" value="EA00000000" disabled>
                                    </div>
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-check-circle opacity-50 me-1"></i> Update Billing
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Edit Account -->
        </div>
        <!-- END Page Content -->
    </main>
</x-app-layout>

<!-- END Main Container -->
