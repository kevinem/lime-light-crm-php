<?php


namespace KevinEm\LimeLightCRM;


use KevinEm\LimeLightCRM\Exceptions\LimeLightCRMMembershipException;

/**
 * Class Membership
 * @package KevinEm\LimeLightCRM
 */
class Membership
{

    /**
     * @var LimeLightCRM
     */
    protected $limeLightCRM;

    /**
     * Membership constructor.
     * @param LimeLightCRM $limeLightCRM
     */
    public function __construct(LimeLightCRM $limeLightCRM)
    {
        $this->LimeLightCRM = $limeLightCRM;
    }

    /**
     * @return string
     */
    public function getMembershipUrl()
    {
        return $this->LimeLightCRM->getBaseUrl() . '/admin/membership.php';
    }

    /**
     * @param array $response
     * @throws LimeLightCRMMembershipException
     */
    public function checkResponse(array $response)
    {
        if (isset($response['response_code']) && $response['response_code'] != 100) {
            throw new LimeLightCRMMembershipException($response['response_code']);
        }
    }

    /**
     * @return array
     */
    public function findActiveCampaign()
    {
        $formParams = $this->LimeLightCRM->buildFormParams('campaign_find_active');

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @return mixed
     */
    public function validateCredentials()
    {
        $formParams = $this->LimeLightCRM->buildFormParams('validate_credentials');

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        return $res;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewCampaign(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('campaign_view', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findCustomerActiveProduct(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('customer_find_active_product', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function calculateRefund(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_calculate_refund', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findOverdueOrders(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_find_overdue', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function refundOrder(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_refund', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function voidOrder(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_void', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function forceOrderBill(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_force_bill', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateRecurringOrder(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_update_recurring', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findOrder(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_find', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findUpdatedOrder(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_find_updated', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateOrder(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_update', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateSubscription(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('subscription_update', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewOrder(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_view', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function indexProduct(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('product_index', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function indexProductAttribute(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('product_attribute_index', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function copyProduct(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('product_copy', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateProduct(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('product_update', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function stopRecurringUpsell(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('upsell_stop_recurring', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewProspect(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('prospect_view', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateProspect(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('prospect_update', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findProspect(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('prospect_find', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewCustomer(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('customer_view', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findCustomer(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('customer_find', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function reprocessOrder(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('order_reprocess', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function getAlternativeProvider(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('get_alternative_provider', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function repostToFulfillment(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('repost_to_fulfillment', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewShippingMethod(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('shipping_method_view', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findShippingMethod(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('shipping_method_find', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function validateCoupon(array $data)
    {
        $formParams = $this->LimeLightCRM->buildFormParams('coupon_validate', $data);

        $res = $this->LimeLightCRM->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->LimeLightCRM->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }
}