<?php

namespace Omnipay\MoMo\Message\AllInOne;

use Omnipay\MoMo\Message\AbstractSignatureResponse as BaseAbstractSignatureResponse;

/**
 * @author tamnnit
 * @since 1.0.0
 */
abstract class AbstractSignatureResponse extends BaseAbstractSignatureResponse
{
    /**
     * get error code MoMo. if 0 then success.
     *
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->data['errorCode'] ?? null;
    }

    /**
     * get order code.
     *
     * @return null|string
     */
    public function getTransactionId(): ?string
    {
        return $this->data['orderId'] ?? null;
    }

    /**
     * get transaction reference Response.
     *
     * @return null|string
     */
    public function getTransactionReference(): ?string
    {
        return $this->data['transId'] ?? null;
    }
}
