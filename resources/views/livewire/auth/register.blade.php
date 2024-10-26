<div>
    <div class="breadcrum-area">
        <div class="container">
            <div class="breadcrumb">
                <h1 class="title h2">{{__('Register')}}</h1>
            </div>
        </div>
        <ul class="shape-group-8 list-unstyled">
            <li
                class="shape shape-1"
                data-sal="slide-right"
                data-sal-duration="500"
                data-sal-delay="100"
            >
                <img
                    src="{{asset('frontend/assets/images/others/bubble-9.png')}}"
                    alt="Bubble"
                />
            </li>
            <li
                class="shape shape-2"
                data-sal="slide-left"
                data-sal-duration="500"
                data-sal-delay="200"
            >
                <img
                    src="{{asset('frontend/assets/images/others/bubble-17.png')}}"
                    alt="Bubble"
                />
            </li>
            <li
                class="shape shape-3"
                data-sal="slide-up"
                data-sal-duration="500"
                data-sal-delay="300"
            >
                <img src="{{asset('frontend/assets/images/others/line-4.png')}}" alt="Line"/>
            </li>
        </ul>
    </div>
    <div class="section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="contact-form-box shadow-box mb--30">
                        <form wire:submit.prevent="register" method="POST">
                            @csrf
                            <div class="row mb-3 form-group">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" wire:model.live="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 form-group">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" wire:model.live="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 form-group">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           wire:model.live="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 form-group">
                                <label for="password_confirmation"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           wire:model.live="password_confirmation">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                    @if (Route::has('login'))
                                        <p>Already have account?
                                            <a wire:navigate class="btn btn-link" href="{{ route('login') }}">
                                                {{ __('Click Here') }}
                                            </a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
