<?php

namespace Omnipay\MoMo\Message\QRCode;

use Omnipay\MoMo\Message\AbstractIncomingRequest;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class NotificationRequest extends AbstractIncomingRequest
{
    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    public function sendData($data): NotificationResponse
    {
        return $this->response = new NotificationResponse($this, $data);
    }

    /**
     * {@inheritdoc}
     */
    protected function getIncomingParameters(): array
    {
        $data = [];
        $requestData = json_decode($this->httpRequest->getContent(), true) ?? [];
        $parameters = [
            'accessKey', 'amount', 'message', 'momoTransId', 'partnerCode', 'partnerRefId', 'partnerTransId',
            'responseTime', 'status', 'storeId', 'transType', 'signature',
        ];

        foreach ($parameters as $parameter) {
            $data[$parameter] = $requestData[$parameter] ?? null;
        }

        return $data;
    }
}
