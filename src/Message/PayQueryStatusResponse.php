<?php

namespace Omnipay\MoMo\Message;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class PayQueryStatusResponse extends AbstractResponse
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
        return $this->data['data']['billId'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionReference(): ?string
    {
        return $this->data['data']['transid'] ?? null;
    }
}
