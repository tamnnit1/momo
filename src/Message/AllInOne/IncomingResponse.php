<?php

namespace Omnipay\MoMo\Message\AllInOne;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class IncomingResponse extends AbstractSignatureResponse
{
    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'partnerCode', 'accessKey', 'requestId', 'amount', 'orderId', 'orderInfo', 'orderType',
            'transId', 'message', 'localMessage', 'responseTime', 'errorCode', 'payType', 'extraData',
        ];
    }
}
