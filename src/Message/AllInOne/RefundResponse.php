<?php

namespace Omnipay\MoMo\Message\AllInOne;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class RefundResponse extends AbstractSignatureResponse
{
    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'partnerCode', 'accessKey', 'requestId', 'orderId', 'errorCode', 'transId', 'message',
            'localMessage', 'requestType',
        ];
    }
}
