<?php

namespace Omnipay\MoMo\Message\QRCode;

use Omnipay\MoMo\Message\AbstractSignatureResponse;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class NotificationResponse extends AbstractSignatureResponse
{
    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'accessKey', 'amount', 'message', 'momoTransId', 'partnerCode', 'partnerRefId', 'partnerTransId',
            'responseTime', 'status', 'storeId', 'transType',
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
    public function getTransactionId(): ?string
    {
        return $this->data['partnerRefId'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionReference(): ?string
    {
        return $this->data['momoTransId'] ?? null;
    }
}
