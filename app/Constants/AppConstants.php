<?php
namespace App\Constants;
class AppConstants
{
    // Roles
    public const ADMIN = 'Admin';
    public const USER = 'User';
    public const DEVELOPER = 'Developer';
    public const DEFAULT_ROLES = [
        self::ADMIN,
        self::USER,
        self::DEVELOPER,
    ];

    // Layouts
    public const FRONTEND_LAYOUT = 'frontend.layouts.app';
    public const ADMIN_LAYOUT = 'admin.layouts.app';

    // Statuses
    public const STATUS_ENABLED = 1;
    public const STATUS_DISABLED = 0;
    public const STATUSES = [
        self::STATUS_ENABLED => 'Active',
        self::STATUS_DISABLED => 'Inactive',
    ];

    // Service Defaults
    public const SINGLE_SERVICE_DURATION = '10 Minutes';
    public const DEFAULT_SIM_QUANTITY = 1;
    public const DEFAULT_SIM_COST = 1.5;
    public const SIM_TYPE_PAID = 'Paid';

    // Dropdown Options
    public const YES_NO_OPTIONS = ['No', 'Yes'];
    public const DATATABLE_ITEMS = [10, 20, 50, 100, 500];
    public const SERVER_STATUS = ['Online', 'Offline'];
    public const COUPON_TYPES = ['Fixed', 'Percentage'];
    public const COUPON_USE_TYPES = ['Single', 'Multiple'];
    public const COUPON_ELIGIBLE_OPTIONS = ['All', 'New', 'Old'];

    // Packages
    public const PACKAGES = [
        1 => '1 Day',
        7 => '1 Week',
        30 => '1 Month',
    ];
    const PACKAGE_NAME = [
        1=>'1 Day',
        7=>'1 Week',
        30=>'1 Month',
    ];
    // URL Slugs
    public const TERMS_AND_CONDITION_SLUG = 'terms-and-condition';
    public const COOKIE_POLICY_SLUG = 'cookie-policy';
    public const REFUND_POLICY_SLUG = 'refund-policy';
    public const PRIVACY_POLICY_SLUG = 'privacy-policy';
    public const LOGIN_SLUG = 'login';
    public const REGISTER_SLUG = 'register';
    public const HOME_SLUG = '/';
    public const FREE_SMS_SLUG = 'free-sms';
    public const CONTACT_US_SLUG = 'contact-us';
    public const SERVICES_SLUG = 'services';
    public const PRICING_SLUG = 'pricing';
    public const RELOAD_SLUG = 'reload';
    public const NUMBER_LIST_SLUG = 'number-list';
    public const MESSAGE_SLUG = 'messages';
    public const COUPON_USE_TYPE_ARRAY = ['Single', 'Multiple'];
    public const COUPON_TYPE_ARRAY = ['Fixed', 'Percentage'];

    public const COUPON_ELIGIBLE_ARRAY = ['All', 'New','Old'];
    public const DATATABLE_SHOW_ITEM_ARRAY = [10, 20, 50, 100, 500];

    public const STATUS_ARRAY = [
        1 =>'Active',
        0 =>'Inactive',
    ];

    public  const YES_NO_ARRAY = ['No', 'Yes'];
    public const DEFAULT_ROLE = [self::ADMIN,self::USER,self::DEVELOPER];
    public const CASH_IN = 'Cash In';
    public const CASH_OUT = 'Cash Out';
    public const PURCHASE = 'Purchase';
    public const PAYMENT_TYPE = [self::CASH_IN,self::CASH_OUT,self::PURCHASE];
    public const PENDING = 'Pending';
    public const ACCEPT = 'Accept';
    public const REJECT = 'Reject';
    public const  TRANSACTION_STATUS_ARRAY = [self::PENDING,self::ACCEPT,self::REJECT];

    public const PAYPAL = 'Paypal';
    public const CRYPTO = 'Crypto';
    public const WALLET = 'Wallet';
    public const STRIPE = 'Stripe';
    public const PAYMENT_METHODS_ARRAY = [
        self::PAYPAL,
        self::CRYPTO,
        self::WALLET,
        self::STRIPE,
    ];

}
