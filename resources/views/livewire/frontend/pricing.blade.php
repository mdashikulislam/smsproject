<div>
    <div class="breadcrum-area">
        <div class="container">
            <div class="breadcrumb">
                <h1 class="title h2">Plan & Pricing</h1>
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
    <section wire:ignore class="section section-padding">
        <div class="container">
            <div class="section-heading mb-0">
                <span class="subtitle">Pricing Plan</span>
                <h2 class="title">Find the Right Plan.</h2>
                <p>
                    Flexible pricing options for freelancers <br />
                    and design teams.
                </p>
            </div>

            <div class="row">
                <div
                    class="col-xl-4 col-md-6 col-12"
                    data-sal="slide-up"
                    data-sal-duration="800"
                    data-sal-delay="100"
                >
                    <div class="pricing-table active pricing-borderd">
                        <div class="pricing-header">
                            <h3 class="title">Service</h3>
                            <span class="subtitle">Number Valid for 10 Minutes</span>
                            <div class="price-wrap">
                                <div class="monthly-pricing">
                                    <span class="amount">£0.50 </span>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Real UK Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    New Unused UK Number
                                </li>
                                <li>
                                    <i class="far fa-times-circle text-danger"></i>
                                    Receive Unlimited SMS Globally
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Number Issued Instantly
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    All SMS are Private / Only Viewable
                                    By Yourself
                                </li>
                                <li>
                                    <i class="far fa-times-circle text-danger"></i>
                                    Able To Renew / Extend Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    <span>
                                                <strong>Warranty: </strong>24
                                                Hour Money Back
                                            </span>
                                </li>
                                <li>
                                    <i class="far fa-times-circle text-danger"></i>
                                    1 Day Free Premium Plan
                                </li>
                            </ul>
                            <div class="pricing-btn">
                                <a
                                    wire:navigate
                                    href="{{route('services')}}"
                                    class="sms-btn btn-large btn-borderd"
                                >
                                    View More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-xl-4 col-md-6 col-12"
                    data-sal="slide-up"
                    data-sal-duration="800"
                    data-sal-delay="200"
                >
                    <div class="pricing-table pricing-borderd">
                        <div class="pricing-header">
                            <h3 class="title">Day</h3>
                            <span class="subtitle">Number Valid for 1 Day</span>
                            <div class="price-wrap">
                                <div class="monthly-pricing">
                                    <span class="amount">£1.95 </span>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Real UK Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    New Unused UK Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Receive Unlimited SMS Globally
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Number Issued Instantly
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    All SMS are Private / Only Viewable
                                    By Yourself
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Able To Renew / Extend Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    <span>
                                                <strong>Warranty: </strong>24
                                                Hour Money Back
                                            </span>
                                </li>
                                <li>
                                    <i class="far fa-times-circle text-danger"></i>
                                    <span>
                                                1 Day Free Premium Plan
                                            </span>
                                </li>
                            </ul>
                            <div class="pricing-btn">
                                <a
                                    wire:click.prevent="buy(1)"
                                    href=""
                                    data-bs-toggle="modal"
                                    class="sms-btn btn-large btn-borderd"
                                >
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-xl-4 col-md-6 col-12"
                    data-sal="slide-up"
                    data-sal-duration="800"
                    data-sal-delay="200"
                >
                    <div class="pricing-table pricing-borderd">
                        <div class="pricing-header">
                            <h3 class="title">Week</h3>
                            <span class="subtitle">Number Valid for 7 Days</span>
                            <div class="price-wrap">
                                <div class="monthly-pricing">
                                    <span class="amount">£5.00 </span>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Real UK Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    New Unused UK Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Receive Unlimited SMS Globally
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Number Issued Instantly
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    All SMS are Private / Only Viewable
                                    By Yourself
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Able To Renew / Extend Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    <span>
                                                <strong>Warranty: </strong>24
                                                Hour Money Back
                                            </span>
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    <span>
                                                1 Day Free Premium Plan
                                            </span>
                                </li>
                            </ul>
                            <div class="pricing-btn">
                                <a
                                    wire:click.prevent="buy(7)"
                                    href=""
                                    data-bs-toggle="modal"
                                    class="sms-btn btn-large btn-borderd"
                                >
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-xl-4 col-md-6 col-12"
                    data-sal="slide-up"
                    data-sal-duration="800"
                    data-sal-delay="200"
                >
                    <div class="pricing-table pricing-borderd">
                        <div class="pricing-header">
                            <h3 class="title">Month</h3>
                            <span class="subtitle">
                                        Number Valid for 30 Days
                                    </span>
                            <div class="price-wrap">
                                <div class="monthly-pricing">
                                    <span class="amount">£15.00 </span>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Real UK Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    New Unused UK Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Receive Unlimited SMS Globally
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Number Issued Instantly
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    All SMS are Private / Only Viewable
                                    By Yourself
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    Able To Renew / Extend Number
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    <span>
                                                <strong>Warranty: </strong>24
                                                Hour Money Back
                                            </span>
                                </li>
                                <li>
                                    <i class="far fa-check-circle"></i>
                                    <span>
                                                1 Day Free Premium Plan
                                            </span>
                                </li>
                            </ul>
                            <div class="pricing-btn">
                                <a
                                    wire:click.prevent="buy(30)"
                                    href=""
                                    data-bs-toggle="modal"
                                    class="sms-btn btn-large btn-borderd"
                                >
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="shape-group-3 list-unstyled">
            <li class="shape shape-2">
                <img
                    src="{{asset('frontend/assets/images/others/bubble-4.png')}}"
                    alt="shape"
                />
            </li>
        </ul>
    </section>
    <div wire:ignore.self class="modal fade" id="buyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <h4 class="text-center">Buy {{$package['name']}} Package</h4>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <ul class="buy-modal-item">
                        <li>
                            <span>Network Type</span>
                            <select wire:model="network">
                                {!! getNetworkDropdown() !!}
                            </select>
                        </li>
                        <li>
                            <span>Duration</span>
                            <strong>{{$package['duration_text']}}</strong>
                        </li>
                        <li>
                            <span>Price</span>
                            <strong>£{{$package['price']}}</strong>
                        </li>
                        <li>
                            <span>Discount</span>
                            <strong>{{$setting->new_user_discount}}%</strong>
                        </li>
                        <li>
                            <span>Coupon</span>
                            <strong>
                                <input placeholder="Coupon" class="form-control @error('coupon') is-invalid @enderror" wire:keyup="removeValidation" wire:model.live="coupon" type="text">
                                @error('coupon')
                                <span class="d-block invalid-feedback" role="alert">{{$message}}</span>
                                @enderror
                                @if(strlen($this->coupon) >= 4)
                                    <a  wire:click.prevent="calculateCoupon" href="">Calculate Coupon</a>
                                @endif
                                @if(!empty($activeCoupon))
                                    <p>{{$activeCoupon['code']}} <a wire:click.prevent="removeCoupon" href="#"><i class="fas fa-trash"></i></a></p>
                                @endif
                            </strong>
                        </li>
                        <li>
                            <span>Total</span>
                            <strong>£{{$finalPrice}}</strong>
                        </li>
                    </ul>
                    <div class="text-center">
                        <button wire:click.prevent="purchase" style="padding: 10px 15px" type="submit" class="sms-btn btn-sm btn-fill-primary">
                            <span wire:loading wire:target="purchase" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('buy-modal', event => {
            $('#buyModal').modal('show');
        });
    </script>
@endpush
@push('style')
    <style>
        .pricing-table .pricing-body li:before{
            content:""
        }
        .pricing-table .pricing-body li{
            padding-left: 0;
        }
        .buy-modal-item{
            margin-left: 0;
            padding: 20px;
        }
        .buy-modal-item li{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
    </style>
@endpush
