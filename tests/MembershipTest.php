<?php


namespace KevinEm\LimeLight\Tests;


use KevinEm\LimeLight\Exceptions\LimeLightMembershipException;
use KevinEm\LimeLight\LimeLight;
use KevinEm\LimeLight\Membership;
use Mockery as m;

class MembershipTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var LimeLight
     */
    protected $limeLight;

    /**
     * @var Membership
     */
    protected $membership;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->limeLight = m::mock(LimeLight::class);
        $this->limeLight->shouldReceive('getBaseUrl')->andReturn('mock_url');
        $this->limeLight->shouldReceive('getResponse')->andReturn([]);
        $this->limeLight->shouldReceive('parseResponse')->andReturn([]);
        $this->membership = new Membership($this->limeLight);
    }

    public function testGetMembershipUrl()
    {
        $url = $this->membership->getMembershipUrl();
        $expected = 'mock_url/admin/membership.php';
        $this->assertEquals($url, $expected);
    }

    public function testExceptionIsThrown()
    {
        $this->expectException(LimeLightMembershipException::class);

        $response = [
            'response_code' => 200
        ];

        $this->membership->checkResponse($response);
    }

    public function testFindActiveCampaign()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('campaign_find_active')->andReturn([]);
        $res = $this->membership->findActiveCampaign();
        $this->assertEquals($res, []);
    }

    public function testValidateCredentials()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('validate_credentials')->andReturn([]);
        $res = $this->membership->validateCredentials();
        $this->assertEquals($res, []);
    }

    public function testViewCampaign()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('campaign_view', [])->andReturn([]);
        $res = $this->membership->viewCampaign([]);
        $this->assertEquals($res, []);
    }

    public function testFindCustomerActiveProduct()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('customer_find_active_product', [])->andReturn([]);
        $res = $this->membership->findCustomerActiveProduct([]);
        $this->assertEquals($res, []);
    }

    public function testCalculateRefund()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_calculate_refund', [])->andReturn([]);
        $res = $this->membership->calculateRefund([]);
        $this->assertEquals($res, []);
    }

    public function testFindOverdueOrders()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_find_overdue', [])->andReturn([]);
        $res = $this->membership->findOverdueOrders([]);
        $this->assertEquals($res, []);
    }

    public function testRefundOrder()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_refund', [])->andReturn([]);
        $res = $this->membership->refundOrder([]);
        $this->assertEquals($res, []);
    }

    public function testVoidOrder()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_void', [])->andReturn([]);
        $res = $this->membership->voidOrder([]);
        $this->assertEquals($res, []);
    }

    public function testForceOrderBill()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_force_bill', [])->andReturn([]);
        $res = $this->membership->forceOrderBill([]);
        $this->assertEquals($res, []);
    }

    public function testUpdateRecurringOrder()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_update_recurring', [])->andReturn([]);
        $res = $this->membership->updateRecurringOrder([]);
        $this->assertEquals($res, []);
    }

    public function testFindOrder()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_find', [])->andReturn([]);
        $res = $this->membership->findOrder([]);
        $this->assertEquals($res, []);
    }

    public function testFindUpdatedOrder()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_find_updated', [])->andReturn([]);
        $res = $this->membership->findUpdatedOrder([]);
        $this->assertEquals($res, []);
    }

    public function testUpdateOrder()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_update', [])->andReturn([]);
        $res = $this->membership->updateOrder([]);
        $this->assertEquals($res, []);
    }

    public function testUpdateSubscription()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('subscription_update', [])->andReturn([]);
        $res = $this->membership->updateSubscription([]);
        $this->assertEquals($res, []);
    }

    public function testViewOrder()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_view', [])->andReturn([]);
        $res = $this->membership->viewOrder([]);
        $this->assertEquals($res, []);
    }

    public function testIndexProduct()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('product_index', [])->andReturn([]);
        $res = $this->membership->indexProduct([]);
        $this->assertEquals($res, []);
    }

    public function testIndexProductAttribute()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('product_attribute_index', [])->andReturn([]);
        $res = $this->membership->indexProductAttribute([]);
        $this->assertEquals($res, []);
    }

    public function testCopyProduct()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('product_copy', [])->andReturn([]);
        $res = $this->membership->copyProduct([]);
        $this->assertEquals($res, []);
    }

    public function testUpdateProduct()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('product_update', [])->andReturn([]);
        $res = $this->membership->updateProduct([]);
        $this->assertEquals($res, []);
    }

    public function testStopRecurringUpsell()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('upsell_stop_recurring', [])->andReturn([]);
        $res = $this->membership->stopRecurringUpsell([]);
        $this->assertEquals($res, []);
    }

    public function testViewProspect()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('prospect_view', [])->andReturn([]);
        $res = $this->membership->viewProspect([]);
        $this->assertEquals($res, []);
    }

    public function testUpdateProspect()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('prospect_update', [])->andReturn([]);
        $res = $this->membership->updateProspect([]);
        $this->assertEquals($res, []);
    }

    public function testFindProspect()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('prospect_find', [])->andReturn([]);
        $res = $this->membership->findProspect([]);
        $this->assertEquals($res, []);
    }

    public function testViewCustomer()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('customer_view', [])->andReturn([]);
        $res = $this->membership->viewCustomer([]);
        $this->assertEquals($res, []);
    }

    public function testFindCustomer()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('customer_find', [])->andReturn([]);
        $res = $this->membership->findCustomer([]);
        $this->assertEquals($res, []);
    }

    public function testReprocessOrder()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('order_reprocess', [])->andReturn([]);
        $res = $this->membership->reprocessOrder([]);
        $this->assertEquals($res, []);
    }

    public function testGetAlternativeProvider()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('get_alternative_provider', [])->andReturn([]);
        $res = $this->membership->getAlternativeProvider([]);
        $this->assertEquals($res, []);
    }

    public function testRepostToFulfillment()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('repost_to_fulfillment', [])->andReturn([]);
        $res = $this->membership->repostToFulfillment([]);
        $this->assertEquals($res, []);
    }

    public function testViewShippingMethod()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('shipping_method_view', [])->andReturn([]);
        $res = $this->membership->viewShippingMethod([]);
        $this->assertEquals($res, []);
    }

    public function testFindShippingMethod()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('shipping_method_find', [])->andReturn([]);
        $res = $this->membership->findShippingMethod([]);
        $this->assertEquals($res, []);
    }

    public function testValidateCoupon()
    {
        $this->limeLight->shouldReceive('buildFormParams')->with('coupon_validate', [])->andReturn([]);
        $res = $this->membership->validateCoupon([]);
        $this->assertEquals($res, []);
    }
}