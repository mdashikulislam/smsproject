<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Home</title>
    <meta name="description" content="" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="{{asset('frontend/assets/images/favicon.png')}}"
    />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/sal.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/app.css')}}" />
</head>

<body class="sticky-header">
<a href="#main-wrapper" id="backto-top" class="back-to-top">
    <i class="far fa-angle-double-up"></i>
</a>

<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here -->

<!-- <div class="my_switcher d-none d-lg-block">
    <ul>
        <li title="Light Mode">
            <a
                href="javascript:void(0)"
                class="setColor light"
                data-theme="light"
            >
                <i class="fal fa-lightbulb-on"></i>
            </a>
        </li>
        <li title="Dark Mode">
            <a
                href="javascript:void(0)"
                class="setColor dark"
                data-theme="dark"
            >
                <i class="fas fa-moon"></i>
            </a>
        </li>
    </ul>
</div> -->

<div id="main-wrapper" class="main-wrapper">
    <header class="header sms-header header-style-2">
        <div id="sms-sticky-placeholder"></div>
        <div class="sms-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-logo">
                        <a href="index.html">
                            <img
                                src="{{asset('frontend/assets/images/logo.svg')}}"
                                alt="logo"
                            />
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav" id="mobilemenu-popup">
                            <div class="d-block d-lg-none">
                                <div class="mobile-nav-header">
                                    <div class="mobile-nav-logo">
                                        <a href="index.html">
                                            <img
                                                class="light-mode"
                                                src="{{asset('frontend/assets/images/logo-2.svg')}}"
                                                alt="Site Logo"
                                            />
                                        </a>
                                    </div>
                                    <button
                                        class="mobile-menu-close"
                                        data-bs-dismiss="offcanvas"
                                    >
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <ul class="mainmenu">
                                <li>
                                    <a href="index.html"> Home </a>
                                </li>
                                <li>
                                    <a href="free-sms.html">
                                        Free SMS
                                    </a>
                                </li>
                                <li>
                                    <a href="pricing.html"> Pricing </a>
                                </li>
                                <li>
                                    <a href="service.html">
                                        Services
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                                <li class="auth-btn">
                                    <a class="login" href="login.html">
                                        Login
                                    </a>
                                </li>
                                <li class="auth-btn">
                                    <a
                                        class="signup"
                                        href="signup.html"
                                    >
                                        Signup
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="banner banner-style-1">
        <div class="container">
            <div class="row align-items-end align-items-xl-center">
                <div class="col-lg-6">
                    <div
                        class="banner-content"
                        data-sal="slide-up"
                        data-sal-duration="1000"
                        data-sal-delay="100"
                    >
                        <h1 class="title">
                            <span>SMS & CALL</span> Verification.
                        </h1>
                        <span class="subtitle">
                                    Real UK Phone Numbers for SMS, CALL & OTP
                                    Verification
                                </span>
                        <p>
                            Receive Unlimited SMS and CALLS from all
                            over the world Verify and register various
                            websites anonymously Verify Facebook,
                            Twitter, Google and many more
                        </p>
                        <a
                            href="contact.html"
                            class="sms-btn btn-fill-primary btn-large"
                        >
                            Get Started
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-thumbnail">
                        <div
                            class="large-thumb"
                            data-sal="zoom-in"
                            data-sal-duration="800"
                            data-sal-delay="300"
                        >
                            <img
                                src="{{asset('assets/images/banner/window.svg')}}"
                                alt="Laptop"
                            />
                        </div>

                        <ul class="list-unstyled shape-group">
                            <li
                                class="shape shape-1"
                                data-sal="slide-left"
                                data-sal-duration="500"
                                data-sal-delay="800"
                            >
                                <img
                                    src="{{asset('assets/images/banner/chat-group.svg')}}"
                                    alt="chat"
                                />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul class="list-unstyled shape-group-21">
            <li
                class="shape shape-1"
                data-sal="slide-down"
                data-sal-duration="500"
                data-sal-delay="100"
            >
                <img
                    src="{{asset('frontend/assets/images/others/bubble-39.png')}}"
                    alt="Bubble"
                />
            </li>
            <li
                class="shape shape-2"
                data-sal="zoom-in"
                data-sal-duration="800"
                data-sal-delay="500"
            >
                <img
                    src="{{asset('frontend/assets/images/others/bubble-38.png')}}"
                    alt="Bubble"
                />
            </li>
            <li
                class="shape shape-3"
                data-sal="slide-left"
                data-sal-duration="500"
                data-sal-delay="700"
            >
                <img
                    src="{{asset('frontend/assets/images/others/bubble-14.png')}}"
                    alt="Bubble"
                />
            </li>
            <li
                class="shape shape-4"
                data-sal="slide-left"
                data-sal-duration="500"
                data-sal-delay="700"
            >
                <img
                    src="{{asset('frontend/assets/images/others/bubble-14.png')}}"
                    alt="Bubble"
                />
            </li>
            <li
                class="shape shape-5"
                data-sal="slide-left"
                data-sal-duration="500"
                data-sal-delay="700"
            >
                <img
                    src="{{asset('frontend/assets/images/others/bubble-14.png')}}"
                    alt="Bubble"
                />
            </li>
            <li
                class="shape shape-6"
                data-sal="slide-left"
                data-sal-duration="500"
                data-sal-delay="700"
            >
                <img
                    src="{{asset('frontend/assets/images/others/bubble-40.png')}}"
                    alt="Bubble"
                />
            </li>
            <li
                class="shape shape-7"
                data-sal="slide-left"
                data-sal-duration="500"
                data-sal-delay="700"
            >
                <img
                    src="{{asset('frontend/assets/images/others/bubble-41.png')}}"
                    alt="Bubble"
                />
            </li>
        </ul>
    </section>

    <section class="section section-padding">
        <div class="container">
            <div class="section-heading heading-left mb--20 mb_md--70">
                <span class="subtitle">How To Get Started? </span>
                <h2 class="title">
                    How To Get <br />
                    Started?
                </h2>
            </div>
            <div class="row">
                <div
                    class="col-lg-4 mt--200 mt_md--0"
                    data-sal="slide-up"
                    data-sal-duration="800"
                    data-sal-delay="100"
                >
                    <div class="services-grid service-style-2 active">
                        <div class="thumbnail">
                            <img
                                src="{{asset('frontend/assets/images/icon/icon-1.svg')}}"
                                alt="icon"
                            />
                        </div>
                        <div class="content">
                            <h5 class="title">Choose Your Plan</h5>
                            <p>Choose what plan is suitable for you</p>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-4 mt--100 mt_md--0"
                    data-sal="slide-up"
                    data-sal-duration="800"
                    data-sal-delay="200"
                >
                    <div class="services-grid service-style-2 active">
                        <div class="thumbnail">
                            <img
                                src="{{asset('frontend/assets/images/icon/icon-2.svg')}}"
                                alt="icon"
                            />
                        </div>
                        <div class="content">
                            <h5 class="title">Use Your Number</h5>
                            <p>
                                Your new number is ready to use Sign in
                                on our website or use our app to view
                                your numbers and messages
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-4"
                    data-sal="slide-up"
                    data-sal-duration="800"
                    data-sal-delay="300"
                >
                    <div class="services-grid service-style-2 active">
                        <div class="thumbnail">
                            <img
                                src="assets/images/icon/icon-3.svg"
                                alt="icon"
                            />
                        </div>
                        <div class="content">
                            <h5 class="title">
                                Receive Unlimited SMS and CALLS
                            </h5>
                            <p>You are all set</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="shape-group-7 list-unstyled">
            <li class="shape shape-1">
                <img
                    src="assets/images/others/circle-2.png"
                    alt="circle"
                />
            </li>
            <li class="shape shape-2">
                <img
                    src="assets/images/others/bubble-2.png"
                    alt="Line"
                />
            </li>
            <li class="shape shape-3">
                <img
                    src="assets/images/others/bubble-1.png"
                    alt="Line"
                />
            </li>
        </ul>
    </section>
    <section
        class="section section-padding-equal case-study-featured-area"
    >
        <div class="container">
            <div class="row align-items-center">
                <div
                    class="col-xl-5 col-lg-6"
                    data-sal="slide-right"
                    data-sal-duration="800"
                >
                    <div class="case-study-featured">
                        <div class="section-heading heading-left">
                            <span class="subtitle"> Numbers </span>
                            <h2 class="title">Real UK Numbers</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur,
                                adipisicing elit. Beatae, corrupti quae?
                                Reiciendis possimus voluptatem
                                exercitationem illo. Neque quos dolor
                                itaque earum maxime, non illum quisquam
                                nulla ullam id possimus unde.
                            </p>

                            <a
                                href="free-sms.html"
                                class="sms-btn btn-fill-primary btn-large"
                            >
                                Free SMS
                            </a>
                        </div>
                        <div class="case-study-counterup">
                            <div class="single-counterup">
                                <h2 class="count-number">
                                            <span
                                                class="number count"
                                                data-count="100"
                                            >
                                                100
                                            </span>
                                </h2>
                                <span class="counter-title">
                                            Free Numbers
                                        </span>
                            </div>
                            <div class="single-counterup">
                                <h2 class="count-number">
                                            <span
                                                class="number count"
                                                data-count="150"
                                            >
                                                150
                                            </span>
                                </h2>
                                <span class="counter-title">
                                            Paid Numbers
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-xl-7 col-lg-6 d-none d-lg-block"
                    data-sal="slide-left"
                    data-sal-duration="800"
                >
                    <div class="case-study-featured-thumb">
                        <img
                            src="assets/images/others/case-study-4.svg"
                            alt="travel"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section call-to-action-area">
        <div class="container">
            <div class="call-to-action">
                <div class="section-heading heading-light">
                    <h2 class="title">Try Our Free SMS Service</h2>
                    <p>
                        Receive SMS, CALLS & OTP from all over the world
                        <br />
                        Protect your identity <br />
                        Remain anonymous
                    </p>
                    <h4 class="subtitle">
                        All our UK numbers can receive messages and
                        calls globally even if the sender is in a
                        different country
                    </h4>
                    <a
                        href="contact.html"
                        class="sms-btn btn-large btn-fill-white"
                    >
                        Contact Us
                    </a>
                </div>
                <div class="thumbnail">
                    <div
                        class="larg-thumb"
                        data-sal="zoom-in"
                        data-sal-duration="600"
                        data-sal-delay="100"
                    >
                        <img
                            class="paralax-image"
                            src="assets/images/others/chat-group.png"
                            alt="Chat"
                        />
                    </div>
                    <ul class="list-unstyled small-thumb">
                        <li
                            class="shape shape-1"
                            data-sal="slide-right"
                            data-sal-duration="800"
                            data-sal-delay="400"
                        >
                            <img
                                class="paralax-image"
                                src="assets/images/others/laptop-poses.png"
                                alt="Laptop"
                            />
                        </li>
                        <li
                            class="shape shape-2"
                            data-sal="slide-left"
                            data-sal-duration="800"
                            data-sal-delay="300"
                        >
                            <img
                                class="paralax-image"
                                src="assets/images/others/bill-pay.png"
                                alt="Bill"
                            />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="list-unstyled shape-group-9">
            <li class="shape shape-1">
                <img
                    src="assets/images/others/bubble-12.png"
                    alt="Comments"
                />
            </li>
            <li class="shape shape-2">
                <img
                    src="assets/images/others/bubble-16.png"
                    alt="Comments"
                />
            </li>
            <li class="shape shape-3">
                <img
                    src="assets/images/others/bubble-13.png"
                    alt="Comments"
                />
            </li>
            <li class="shape shape-4">
                <img
                    src="assets/images/others/bubble-14.png"
                    alt="Comments"
                />
            </li>
            <li class="shape shape-5">
                <img
                    src="assets/images/others/bubble-16.png"
                    alt="Comments"
                />
            </li>
            <li class="shape shape-6">
                <img
                    src="assets/images/others/bubble-15.png"
                    alt="Comments"
                />
            </li>
            <li class="shape shape-7">
                <img
                    src="assets/images/others/bubble-16.png"
                    alt="Comments"
                />
            </li>
        </ul>
    </section>

    <footer class="footer-area">
        <div class="container">
            <div class="footer-main">
                <div class="row">
                    <div
                        class="col-xl-6 col-lg-5"
                        data-sal="slide-right"
                        data-sal-duration="800"
                        data-sal-delay="100"
                    >
                        <div class="footer-widget border-end">
                            <div class="footer-newsletter">
                                <h2 class="title">Get in touch!</h2>
                                <p>
                                    Fusce varius, dolor tempor interdum
                                    tristique, dui urna bib endum magna,
                                    ut ullamcorper purus
                                </p>
                                <div class="footer-social-link">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a
                                                href="https://facebook.com/"
                                                data-sal="slide-up"
                                                data-sal-duration="500"
                                                data-sal-delay="100"
                                            ><i
                                                    class="fab fa-facebook-f"
                                                ></i
                                                ></a>
                                        </li>
                                        <li>
                                            <a
                                                href="https://twitter.com/"
                                                data-sal="slide-up"
                                                data-sal-duration="500"
                                                data-sal-delay="200"
                                            ><i
                                                    class="fab fa-twitter"
                                                ></i
                                                ></a>
                                        </li>

                                        <li>
                                            <a
                                                href="https://www.linkedin.com/"
                                                data-sal="slide-up"
                                                data-sal-duration="500"
                                                data-sal-delay="400"
                                            ><i
                                                    class="fab fa-linkedin-in"
                                                ></i
                                                ></a>
                                        </li>
                                        <li>
                                            <a
                                                href="https://www.instagram.com/"
                                                data-sal="slide-up"
                                                data-sal-duration="500"
                                                data-sal-delay="500"
                                            ><i
                                                    class="fab fa-instagram"
                                                ></i
                                                ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-xl-6 col-lg-7"
                        data-sal="slide-left"
                        data-sal-duration="800"
                        data-sal-delay="100"
                    >
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="footer-widget">
                                    <h6 class="widget-title">
                                        Quick Access
                                    </h6>
                                    <div class="footer-menu-link">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="free-sms.html">
                                                    Free SMS
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="single-service.html"
                                                >
                                                    Single Service
                                                </a>
                                            </li>
                                            <li>
                                                <a href="pricing.html">
                                                    Pricing
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="footer-widget">
                                    <h6 class="widget-title">
                                        Resourses
                                    </h6>
                                    <div class="footer-menu-link">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="contact.html">
                                                    Contact
                                                </a>
                                            </li>
                                            <li>
                                                <a href="faqs.html">
                                                    Faqs
                                                </a>
                                            </li>

                                            <li>
                                                <a
                                                    href="portfolio.html"
                                                >
                                                    Affiliates
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="footer-widget">
                                    <h6 class="widget-title">
                                        Support
                                    </h6>
                                    <div class="footer-menu-link">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a
                                                    href="privacy-policy.html"
                                                >
                                                    Privacy Policy
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="terms-of-use.html"
                                                >
                                                    Terms of Use
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="cookies-policy.html"
                                                >
                                                    Cookies Policy
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="refund-policy.html"
                                                >
                                                    Refund Policy
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="footer-bottom"
                data-sal="slide-up"
                data-sal-duration="500"
                data-sal-delay="100"
            >
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright">
                                    <span class="copyright-text">
                                        © 2023. All rights reserved
                                    </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-bottom-link">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="privacy-policy.html"
                                    >Privacy Policy</a
                                    >
                                </li>
                                <li>
                                    <a href="terms-of-use.html"
                                    >Terms of Use</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Js -->
<script src="{{asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/sal.js')}}"></script>
<script src="{{asset('frontend/assets/js/js.cookie.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.style.switcher.js')}}"></script>
<script src="{{asset('frontend/assets/js/tilt.js')}}"></script>
<script src="{{asset('frontend/assets/js/odometer.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.nav.js')}}"></script>
<script src="{{asset('frontend/assets/js/app.js')}}"></script>
</body>
</html>
