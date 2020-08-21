<?php

namespace Omnipay\MoMo;

use Omnipay\Common\AbstractGateway;
use Omnipay\MoMo\Message\AllInOne\RefundRequest;
use Omnipay\MoMo\Message\AllInOne\PurchaseRequest;
use Omnipay\MoMo\Message\AllInOne\QueryRefundRequest;
use Omnipay\MoMo\Message\AllInOne\NotificationRequest;
use Omnipay\MoMo\Message\AllInOne\CompletePurchaseRequest;
use Omnipay\MoMo\Message\AllInOne\QueryTransactionRequest;

/**
 * @link https://developers.momo.vn/#/docs/aio/
 *
 * @author tamnnit
 * @since 1.0.0
 */
class AllInOneGateway extends AbstractGateway
{
    use Concerns\Parameters;

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'MoMo AIO';
    }

    /**
     * {@inheritdoc}
     * @return \Omnipay\Common\Message\RequestInterface|CompletePurchaseRequest
     */
    public function completePurchase(array $options = []): CompletePurchaseRequest
    {
        return $this->createRequest(CompletePurchaseRequest::class, $options);
    }

    /**
     * create request notification from MoMo.
     *
     * @param  array  $options
     * @return \Omnipay\Common\Message\RequestInterface|NotificationRequest
     */
    public function notification(array $options = []): NotificationRequest
    {
        return $this->createRequest(NotificationRequest::class, $options);
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
     * create query transaction.
     *
     * @param  array  $options
     * @return \Omnipay\Common\Message\RequestInterface|QueryTransactionRequest
     */
    public function queryTransaction(array $options = []): QueryTransactionRequest
    {
        return $this->createRequest(QueryTransactionRequest::class, $options);
    }

    /**
     * {@inheritdoc}
     * @return \Omnipay\Common\Message\RequestInterface|RefundRequest
     */
    public function refund(array $options = [])
    {
        return $this->createRequest(RefundRequest::class, $options);
    }

    /**
     * create query refund.
     *
     * @return \Omnipay\Common\Message\RequestInterface|QueryRefundRequest
     */
    public function queryRefund(array $options = [])
    {
        return $this->createRequest(QueryRefundRequest::class, $options);
    }
}
