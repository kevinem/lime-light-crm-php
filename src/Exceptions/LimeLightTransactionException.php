<?php


namespace KevinEm\LimeLight\Exceptions;


class LimeLightTransactionException extends LimeLightException
{

    public function __construct($code, \Exception $previous)
    {
        $message = $this->getExceptionMessage($code);

        parent::__construct($message, $code, $previous);
    }

    public function getExceptionMessage($code)
    {
        switch ($code) {
            case 101:
                return '';
            case 200:
                return 'Invalid login credentials';
            case 201:
                return 'three_d_redirect_url is required';
            case 303:
                return 'Invalid upsell product Id of (XXX) found';
            case 304:
                return 'Invalid first name of (XXX) found';
            case 305:
                return 'Invalid last name of (XXX) found';
            case 306:
                return 'Invalid shipping address1 of (XXX) found';
            case 307:
                return 'Invalid shipping city of (XXX) found';
            case 308:
                return 'Invalid shipping state of (XXX) found';
            case 309:
                return 'Invalid shipping zip of (XXX) found';
            case 310:
                return 'Invalid shipping country of (XXX) found';
            case 311:
                return 'Invalid billing address1 of (XXX) found';
            case 312:
                return 'Invalid billing city of (XXX) found';
            case 313:
                return 'Invalid billing state of (XXX) found';
            case 314:
                return 'Invalid billing zip of (XXX) found';
            case 315:
                return 'Invalid billing country of (XXX) found';
            case 316:
                return 'Invalid phone number of (XXX) found';
            case 317:
                return 'Invalid email address of (XXX) found';
            case 318:
                return 'Invalid credit card type of (XXX) found';
            case 319:
                return 'Invalid credit card number of (XXX) found';
            case 320:
                return 'Invalid expiration date of (XXX) found';
            case 321:
                return 'Invalid IP address of (XXX) found';
            case 322:
                return 'Invalid shipping id of (XXX) found';
            case 323:
                return 'CVV is required for tranType \'Sale\' ';
            case 324:
                return 'Supplied CVV of (XXX) has an invalid length';
            case 325:
                return 'Shipping state must be 2 characters for a shipping country of US';
            case 326:
                return 'Billing state must be 2 characters for a billing country of US';
            case 327:
                return 'Invalid payment type of XXX';
            case 328:
                return 'Expiration month of (XXX) must be between 01 and 12';
            case 329:
                return 'Expiration date of (XXX) must be 4 digits long';
            case 330:
                return 'Could not find prospect record';
            case 331:
                return 'Missing previous OrderId';
            case 332:
                return 'Could not find original order Id';
            case 333:
                return 'Order has been black listed';
            case 334:
                return 'The credit card number or email address has already purchased this product(s)';
            case 335:
                return 'Invalid Dynamic Price Format';
            case 336:
                return 'checkRoutingNumber must be passed when checking is the payment type is checking or eft_germany';
            case 337:
                return 'checkAccountNumber must be passed when checking is the payment type is checking or eft_germany';
            case 338:
                return 'Invalid campaign to perform sale on.  No checking account on this campaign.';
            case 339:
                return 'tranType missing or invalid';
            case 340:
                return 'Invalid employee username of (XXX) found';
            case 341:
                return 'Campaign Id (XXX) restricted to user (XXX)';
            case 342:
                return 'The credit card has expired';
            case 400:
                return 'Invalid campaign Id of (XXX) found';
            case 411:
                return 'Invalid subscription field';
            case 412:
                return 'Missing subscription field';
            case 413:
                return 'Product is not subscription based';
            case 414:
                return 'The product that is being purchased has a different subscription type than the next recurring product';
            case 415:
                return 'Invalid subscription value';
            case 600:
                return 'Invalid product Id of (XXX) found';
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
            case 705:
                return 'Order is not 3DS related';
            case 800:
                return 'Transaction was declined';
            case 900:
                return 'SSL is required to run a transaction';
            case 901:
                return 'Alternative payment payer id is required for this payment type';
            case 902:
                return 'Alternative payment token is required for this payment type';
            case 1000:
                return 'Could not add record';
            case 1001:
                return 'Invalid login credentials supplied';
            case 1002:
                return 'Invalid method supplied';
            default:
                return 'Unknown exception';
        }
    }
}