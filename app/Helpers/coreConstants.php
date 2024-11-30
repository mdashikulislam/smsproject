<?php
const ADMIN = 'Admin';
const USER = 'User';
const DEVELOPER = 'Developer';
const DEFAULT_ROLE = [ADMIN,USER,DEVELOPER];
const FRONTEND_LAYOUT = 'frontend.layouts.app';
const ADMIN_LAYOUT = 'admin.layouts.app';
const STATUS_ENABLED = 1;
const SINGLE_SERVICE_DURATION = '10 Minutes';
const YES_NO_ARRAY = ['No', 'Yes'];
const STATUS_ARRAY = [
    1 =>'Active',
    0 =>'Inactive',
];
const PACKAGE_NAME = [
    1=>'1 Day',
    7=>'1 Week',
    30=>'1 Month',
];
const DEFAULT_SIM_QUANTITY = 1;
const DEFAULT_SIM_COST = 1.5;
const SIM_TYPE_PAID = 'Paid';

const DATATABLE_SHOW_ITEM_ARRAY = [10, 20, 50, 100, 500];
const SERVER_STATUS = ['Online', 'Offline'];
const COUPON_TYPE_ARRAY = ['Fixed', 'Percentage'];
const COUPON_USE_TYPE_ARRAY = ['Single', 'Multiple'];
const COUPON_ELIGIBLE_ARRAY = ['All', 'New','Old'];

//Url Slug constant
const TERMS_AND_CONDITION_SLUG = 'terms-and-condition';
const COOKIE_POLICY_SLUG = 'cookie-policy';
const REFUND_POLICY_SLUG = 'refund-policy';
const PRIVACY_POLICY_SLUG = 'privacy-policy';
const LOGIN_SLUG = 'login';
const REGISTER_SLUG = 'register';
const HOME_SLUG = '/';
const FREE_SMS_SLUG = 'free-sms';
const CONTACT_US_SLUG = 'contact-us';
const SERVICES_SLUG = 'services';
const PRICING_SLUG = 'pricing';
const RELOAD_SLUG = 'reload';
