<div>
    <div class="breadcrum-area">
        <div class="container">
            <div class="breadcrumb">
                <h1 class="title h2">Reload</h1>
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
    <section class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="contact-form-box shadow-box mb--30">
                        <h3 class="title">
                            Reload Amount
                        </h3>
                        <form method="POST" wire:submit.prevent="reloadBalance" class="sms-contact-form">
                            <div class="form-group">
                                <input
                                    type="number"
                                    step="any"
                                    class="form-control @error('amount') is-invalid @enderror"
                                    wire:model="amount"
                                />
                                @error('amount')
                                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button
                                    type="submit"
                                    class="sms-btn btn-fill-primary btn-fluid btn-primary"
                                    name="submit-btn"
                                >
                                    Reload
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 offset-xl-1">

                </div>
            </div>
        </div>
        <ul class="list-unstyled shape-group-12">
            <li class="shape shape-1">
                <img
                    src="{{asset('frontend/assets/images/others/bubble-2.png')}}"
                    alt="Bubble"
                />
            </li>
            <li class="shape shape-2">
                <img
                    src="{{asset('frontend/assets/images/others/bubble-1.png')}}"
                    alt="Bubble"
                />
            </li>
            <li class="shape shape-3">
                <img
                    src="{{asset('frontend/assets/images/others/circle-3.png')}}"
                    alt="Circle"
                />
            </li>
        </ul>
    </section>
</div>
