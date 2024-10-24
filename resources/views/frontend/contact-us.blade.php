@extends('frontend.layouts.app')
@section('title','Contact Us')
@section('content')
    <div class="breadcrum-area">
        <div class="container">
            <div class="breadcrumb">
                <h1 class="title h2">Contact</h1>
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
                            Get a free Keystroke quote now
                        </h3>
                        <form method="POST" class="sms-contact-form">
                            <div class="form-group">
                                <label>Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="contact-name"
                                />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="contact-email"
                                />
                            </div>
                            <div class="form-group">
                                <label>Company</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="contact-company"
                                />
                            </div>
                            <div class="form-group mb--40">
                                <label>How can we help you?</label>
                                <textarea
                                    name="contact-message"
                                    id="contact-message"
                                    class="form-control textarea"
                                    cols="30"
                                    rows="4"
                                ></textarea>
                            </div>
                            <div class="form-group">
                                <button
                                    type="submit"
                                    class="sms-btn btn-fill-primary btn-fluid btn-primary"
                                    name="submit-btn"
                                >
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 offset-xl-1">
                    <div
                        class="contact-info mb--100 mb_md--30 mt_md--0 mt--150"
                    >
                        <h4 class="title">Phone</h4>
                        <p>
                            Our customer care is open from Mon-Fri,
                            10:00 am to 6:00 pm
                        </p>
                        <h4 class="phone-number">
                            <a href="tel:1234567890">(123) 456 7890</a>
                        </h4>
                    </div>
                    <div class="contact-info mb--30">
                        <h4 class="title">Email</h4>
                        <p>
                            Our support team will get back to in 48-h
                            during standard business hours.
                        </p>
                        <h4 class="phone-number">
                            <a href="mailto:info@example.com"
                            >info@example.com</a
                            >
                        </h4>
                    </div>
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
@endsection
