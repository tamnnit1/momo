<?php

namespace Omnipay\MoMo;

use Omnipay\Common\AbstractGateway;
use Omnipay\MoMo\Message\PayRefundRequest;
use Omnipay\MoMo\Message\PayConfirmRequest;
use Omnipay\MoMo\Message\PayQueryStatusRequest;
use Omnipay\MoMo\Message\AppInApp\PurchaseRequest;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class AppInAppGateway extends AbstractGateway
{
    use Concerns\Parameters;

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'MoMo AIA';
    }

    /**
     * {@inheritdoc}
     * @return \Omnipay\Common\Message\RequestInterface|PurchaseRequest
     */
    public function purchase(array $options = []): PurchaseRequest
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * create request pay confirm
     *
     * @param  array  $options
     * @return \Omnipay\Common\Message\RequestInterface|PayConfirmRequest
     */
    public function payConfirm(array $options = []): PayConfirmRequest
    {
        return $this->createRequest(PayConfirmRequest::class, $options);
    }

    /**
     * create request pay status
     *
     * @param  array  $options
     * @return \Omnipay\Common\Message\RequestInterface|PayQueryStatusRequest
     */
    public function queryTransaction(array $options = []): PayQueryStatusRequest
    {
        return $this->createRequest(PayQueryStatusRequest::class, $options);
    }

    /**
     * {@inheritdoc}
     * @return \Omnipay\Common\Message\RequestInterface|PayRefundRequest
     */
    public function refund(array $options = []): PayRefundRequest
    {
        return $this->createRequest(PayRefundRequest::class, $options);
    }
}
