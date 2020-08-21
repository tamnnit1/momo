<?php

namespace Omnipay\MoMo\Message\AllInOne;

/**
 * @link https://developers.momo.vn/#/docs/aio/?id=ho%c3%a0n-ti%e1%bb%81n-giao-d%e1%bb%8bch
 *
 * @author tamnnit
 * @since 1.0.0
 */
class RefundRequest extends AbstractSignatureRequest
{
    /**
     * {@inheritdoc}
     */
    protected $responseClass = RefundResponse::class;

    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        parent::initialize($parameters);
        $this->setParameter('requestType', 'refundMoMoWallet');

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionId(): ?string
    {
        return $this->getTransId();
    }

    /**
     * {@inheritdoc}
     */
    public function setTransactionId($value)
    {
        return $this->setTransId($value);
    }

    /**
     * get trans id MoMo.
     *
     * @return null|string
     */
    public function getTransId(): ?string
    {
        return $this->getParameter('transId');
    }

    /**
     * set trans id MoMo.
     *
     * @param  null|string  $id
     * @return $this
     */
    public function setTransId(?string $id)
    {
        return $this->setParameter('transId', $id);
    }

    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'partnerCode', 'accessKey', 'requestId', 'amount', 'orderId', 'transId', 'requestType',
        ];
    }
}
