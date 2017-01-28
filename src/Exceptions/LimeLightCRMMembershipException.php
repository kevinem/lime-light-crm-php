<?php


namespace KevinEm\LimeLightCRM\Exceptions;


class LimeLightCRMMembershipException extends LimeLightCRMException
{

    public function __construct($code, \Exception $previous = null, array $response = [])
    {
        parent::__construct($this->getExceptionMessage($code), $code, $previous, $response);
    }

    public function getExceptionMessage($code)
    {
        // @codeCoverageIgnoreStart
        switch ($code) {
            case 200:
                return 'Invalid login credentials';
            case 300:
                return 'Update failed due to third party rejection';
            case 301:
                return 'Error updating affiliate data';
            case 320:
                return 'Invalid Product Id';
            case 321:
                return 'Existing Product Category Id Not Found';
            case 322:
                return 'Invalid Category Id';
            case 323:
                return 'Digital Delivery and Digital URL must be paired together and digital URL must be a valid URL';
            case 324:
                return 'Invalid rebill_product or rebill_days value';
            case 325:
                return 'Length Does Not Meet Minimum';
            case 326:
                return 'URL is invalid';
            case 327:
                return 'Payment Type Invalid';
            case 328:
                return 'Expiration Date Invalid (Must be in the format of MMYY with no special characters)';
            case 329:
                return 'Credit card must be either 15 or 16 digits numeric only';
            case 330:
                return 'No Status Passed';
            case 331:
                return 'Invalid Criteria';
            case 332:
                return 'Start and end date are required';
            case 333:
                return 'No Orders Found';
            case 334:
                return 'Invalid Start Date format';
            case 335:
                return 'Invalid End Date format';
            case 336:
                return 'Wild Card Unsupported for this search criteria';
            case 337:
                return 'Last 4 or First 4 must be 4 characters exactly';
            case 338:
                return 'Timestamp invalid';
            case 339:
                return 'Total Amount must be numeric and non-negative';
            case 340:
                return 'Invalid country code';
            case 341:
                return 'Invalid state code';
            case 342:
                return 'Invalid Email Address';
            case 343:
                return 'Data Element Has Same Value As Value Passed No Update done (Information ONLY, but still a success)';
            case 344:
                return 'Invalid Number Format';
            case 345:
                return 'Must be a 1 or 0.  "1" being "On" or true. "0" being "Off" or false.';
            case 346:
                return 'Invalid date format. Use mm/dd/yyyy';
            case 347:
                return 'Invalid RMA reason';
            case 348:
                return 'Order is already flagged as RMA';
            case 349:
                return 'Order is not flagged as RMA';
            case 350:
                return 'Invalid order Id supplied';
            case 351:
                return 'Invalid status or action supplied';
            case 352:
                return 'Uneven Order/Status/Action Pairing';
            case 353:
                return 'Cannot stop recurring';
            case 354:
                return 'Cannot reset recurring';
            case 355:
                return 'Cannot start recurring';
            case 356:
                return 'Credit card has expired';
            case 357:
                return 'Exceeded number of batch orders to view';
            case 360:
                return 'Cannot stop upsell recurring';
            case 370:
                return 'Invalid amount supplied';
            case 371:
                return 'Invalid keep recurring flag supplied';
            case 372:
                return 'Refund amount exceeds current order total';
            case 373:
                return 'Cannot void a fully refunded order';
            case 374:
                return 'Cannot reprocess non-declined orders';
            case 375:
                return 'Cannot blacklist test payment method';
            case 376:
                return 'Invalid tracking number';
            case 377:
                return 'Cannot ship pending orders';
            case 378:
                return 'Order already shipped';
            case 379:
                return 'Order is fully refunded/voided';
            case 380:
                return 'Order is not valid for force bill';
            case 381:
                return 'Customer is blacklisted';
            case 382:
                return 'Invalid US state';
            case 383:
                return 'All military states must have a city of either "APO", "FPO". or "DPO"';
            case 384:
                return 'Invalid date mode';
            case 385:
                return 'Invalid billing cycle filter';
            case 386:
                return 'Order has already been returned';
            case 387:
                return 'Invalid return reason';
            case 388:
                return 'Rebill discount exceeds maximum for product';
            case 399:
                return 'Refund amount must be greater than 0';
            case 390:
                return 'Invalid number of days supplied';
            case 400:
                return 'Invalid campaign Id supplied';
            case 401:
                return 'Invalid subscription type';
            case 402:
                return 'Subscription type 3 requires subscription week and subscription day values';
            case 403:
                return 'Invalid subscription week value';
            case 404:
                return 'Invalid subscription day value';
            case 405:
                return 'Subscription type 3 required for subscription week and subscription day values';
            case 406:
                return 'Rebill days must be a value between 1 and 31 for subscription type 2';
            case 407:
                return 'Rebill days must be greater than 0 if subscription type is 1 or 2';
            case 408:
                return 'Rebill days is invalid unless type is 1 or 2';
            case 409:
                return 'Subscription type 0, other subscription fields invalid';
            case 410:
                return 'API user: (api_username) has reached the limit of requests per minute: (limit) for method: (method_name)';
            case 411:
                return 'Invalid subscription field';
            case 412:
                return 'Missing subscription field';
            case 413:
                return 'Product is not subscription based';
            case 415:
                return 'Invalid subscription value';
            case 420:
                return 'Campaign does not have fulfillment provider attached';
            case 421:
                return 'This order was placed on hold';
            case 422:
                return 'This order has not been sent to fulfillment yet';
            case 423:
                return 'Invalid SKU';
            case 424:
                return 'Fulfillment Error, provider did not specify';
            case 425:
                return 'This order has been sent to fulfillment but has not been shipped';
            case 426:
                return 'This order not eligible for offline payment  approval (incorrect status & payment type)';
            case 430:
                return 'Coupon Error: Invalid Promo Code';
            case 431:
                return 'Coupon Error: This promo code has expired';
            case 432:
                return 'Coupon Error: Product does not meet minimum purchase amount';
            case 433:
                return 'Coupon Error: Maximum use count has exceeded';
            case 434:
                return 'Coupon Error: Customer use count has exceeded its limit';
            case 435:
                return 'Invalid attribute found on product';
            case 436:
                return 'Invalid option found on attribute';
            case 437:
                return 'Invalid attribute combination; no variants matched for product';
            case 438:
                return 'Invalid attribute(s). Product does not have variants';
            case 439:
                return 'Product has variants; product attributes must be provided.';
            case 500:
                return 'Invalid customer Id supplied';
            case 600:
                return 'Invalid product Id supplied';
            case 601:
                return 'Invalid prospect Id supplied';
            case 602:
                return 'No prospects found';
            case 603:
                return 'Invalid customer Id supplied';
            case 604:
                return 'No customers found';
            case 666:
                return 'User does not have permission to use this method';
            case 667:
                return 'This user account is currently disabled';
            case 668:
                return 'Unauthorized IP Address';
            case 669:
                return 'Unauthorized to access campaign';
            case 700:
                return 'Invalid method supplied';
            case 701:
                return 'Action not permitted by gateway';
            case 702:
                return 'Invalid gateway Id';
            case 800:
                return 'Transaction was declined';
            case 901:
                return 'Invalid return URL';
            case 902:
                return 'Invalid cancel URL';
            case 903:
                return 'Error retrieving alternative provider data';
            case 904:
                return 'Campaign does not support an alternative payment provider';
            case 905:
                return 'Product quantity/dynamic price does not match';
            case 906:
                return 'Invalid quantity';
            case 907:
                return 'Invalid shipping Id';
            case 908:
                return 'Payment was already approved';
            case 909:
                return 'No active shipping methods found';
            case 1000:
                return 'SSL is required';
            case 1001:
                return 'Invalid login credentials supplied';
            case 1002:
                return 'Invalid method supplied';
            default:
                return 'Unknown exception';
        }
        // @codeCoverageIgnoreEnd
    }
}