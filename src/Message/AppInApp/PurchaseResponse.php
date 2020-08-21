<?php

namespace Omnipay\MoMo\Message\AppInApp;

use Omnipay\MoMo\Message\AbstractSignatureResponse;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class PurchaseResponse extends AbstractSignatureResponse
{
    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'status', 'message', 'amount', 'transid',
        ];
    }

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
    public function getTransactionReference(): ?string
    {
        return $this->data['transid'] ?? null;
    }
}
