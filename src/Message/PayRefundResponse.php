<?php

namespace Omnipay\MoMo\Message;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class PayRefundResponse extends AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function getCode(): ?string
    {
        return $this->data['status'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionId(): ?string
    {
        return $this->data['partnerRefId'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionReference(): ?string
    {
        return $this->data['transid'] ?? null;
    }
}
