<?php

namespace Omnipay\MoMo\Message\AllInOne;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class PurchaseResponse extends AbstractSignatureResponse implements RedirectResponseInterface
{
    /**
     * {@inheritdoc}
     */
    public function isSuccessful(): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function isRedirect(): bool
    {
        return isset($this->data['payUrl']);
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectUrl(): string
    {
        return $this->data['payUrl'];
    }

    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'requestId', 'orderId', 'message', 'localMessage', 'payUrl', 'errorCode', 'requestType',
        ];
    }
}
