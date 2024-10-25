<x-frontend-layout title="{{__('Login')}}">
    <div class="breadcrum-area">
        <div class="container">
            <div class="breadcrumb">
                <h1 class="title h2">{{__('Login')}}</h1>
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
                <img src="{{asset('frontend/assets/images/others/line-4.png')}}" alt="Line" />
            </li>
        </ul>
    </div>
    <div class="section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="contact-form-box shadow-box mb--30">
                        @livewire('auth.login')
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-frontend-layout>
