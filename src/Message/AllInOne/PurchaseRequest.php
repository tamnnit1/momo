<?php

namespace Omnipay\MoMo\Message\AllInOne;

/**
 * @link https://developers.momo.vn/#/docs/aio/?id=ph%c6%b0%c6%a1ng-th%e1%bb%a9c-thanh-to%c3%a1n
 *
 * @author tamnnit
 * @since 1.0.0
 */
class PurchaseRequest extends AbstractSignatureRequest
{
    /**
     * {@inheritdoc}
     */
    protected $responseClass = PurchaseResponse::class;

    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        parent::initialize($parameters);
        $this->setOrderInfo($this->getParameter('orderInfo') ?? '');
        $this->setExtraData($this->getParameter('extraData') ?? '');
        $this->setParameter('requestType', 'captureMoMoWallet');

        return $this;
    }

    /**
     * get extra data send to MoMo.
     *
     * @return null|string
     */
    public function getExtraData(): ?string
    {
        return $this->getParameter('extraData');
    }

    /**
     * set Extra Data.
     *
     * @param  null|string  $data
     * @return $this
     */
    public function setExtraData(?string $data)
    {
        return $this->setParameter('extraData', $data);
    }

    /**
     * get order info send to MoMo.
     *
     * @return null|string
     */
    public function getOrderInfo(): ?string
    {
        return $this->getParameter('orderInfo');
    }

    /**
     * set order info.
     *
     * @param  null|string  $info
     * @return $this
     */
    public function setOrderInfo(?string $info)
    {
        return $this->setParameter('orderInfo', $info);
    }

    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'partnerCode', 'accessKey', 'requestId', 'amount', 'orderId', 'orderInfo', 'returnUrl', 'notifyUrl',
            'extraData',
        ];
    }
}
