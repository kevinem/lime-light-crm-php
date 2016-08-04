<?php


namespace KevinEm\LimeLight;


use KevinEm\LimeLight\Exceptions\LimeLightMembershipException;

/**
 * Class Membership
 * @package KevinEm\LimeLight
 */
class Membership
{

    /**
     * @var LimeLight
     */
    protected $limeLight;

    /**
     * Membership constructor.
     * @param LimeLight $limeLight
     */
    public function __construct(LimeLight $limeLight)
    {
        $this->limeLight = $limeLight;
    }

    /**
     * @return string
     */
    public function getMembershipUrl()
    {
        return $this->limeLight->getBaseUrl() . '/admin/membership.php';
    }

    /**
     * @param array $response
     * @throws LimeLightMembershipException
     */
    public function checkResponse(array $response)
    {
        if (isset($response['response_code']) && $response['response_code'] != 100) {
            throw new LimeLightMembershipException($response['response_code']);
        }
    }

    /**
     * @return array
     */
    public function findActiveCampaign()
    {
        $formParams = $this->limeLight->buildFormParams('campaign_find_active');

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @return mixed
     */
    public function validateCredentials()
    {
        $formParams = $this->limeLight->buildFormParams('validate_credentials');

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        return $res;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewCampaign(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('campaign_view', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findCustomerActiveProduct(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('customer_find_active_product', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function calculateRefund(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_calculate_refund', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findOverdueOrders(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_find_overdue', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function refundOrder(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_refund', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function voidOrder(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_void', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function forceOrderBill(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_force_bill', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateRecurringOrder(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_update_recurring', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findOrder(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_find', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findUpdatedOrder(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_find_updated', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateOrder(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_update', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateSubscription(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('subscription_update', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewOrder(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_view', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function indexProduct(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('product_index', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function indexProductAttribute(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('product_attribute_index', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function copyProduct(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('product_copy', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateProduct(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('product_update', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function stopRecurringUpsell(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('upsell_stop_recurring', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewProspect(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('prospect_view', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateProspect(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('prospect_update', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findProspect(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('prospect_find', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewCustomer(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('customer_view', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findCustomer(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('customer_find', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function reprocessOrder(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('order_reprocess', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function getAlternativeProvider(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('get_alternative_provider', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function repostToFulfillment(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('repost_to_fulfillment', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function viewShippingMethod(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('shipping_method_view', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function findShippingMethod(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('shipping_method_find', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }

    /**
     * @param array $data
     * @return array
     */
    public function validateCoupon(array $data)
    {
        $formParams = $this->limeLight->buildFormParams('coupon_validate', $data);

        $res = $this->limeLight->getResponse('POST', $this->getMembershipUrl(), $formParams);

        $parsed = $this->limeLight->parseResponse($res);

        $this->checkResponse($parsed);

        return $parsed;
    }
}