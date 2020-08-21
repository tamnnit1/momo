<?php

namespace Omnipay\MoMo\Message\AllInOne;

use Omnipay\MoMo\Message\AbstractSignatureRequest as BaseAbstractSignatureRequest;

/**
 * @author tamnnit
 * @since 1.0.0
 */
abstract class AbstractSignatureRequest extends BaseAbstractSignatureRequest
{
    /**
     * get response.
     *
     * @var string
     */
    protected $responseClass;

    /**
     * get order id.
     *
     * @return null|string
     */
    public function getOrderId(): ?string
    {
        return $this->getParameter('orderId');
    }

    /**
     * set order id.
     *
     * @param  null|string  $id
     * @return $this
     */
    public function setOrderId(?string $id)
    {
        return $this->setParameter('orderId', $id);
    }

    /**
     * get request id.
     *
     * @return null|string
     */
    public function getRequestId(): ?string
    {
        return $this->getParameter('requestId');
    }

    /**
     * set request id order.
     *
     * @param  null|string  $id
     * @return $this
     */
    public function setRequestId(?string $id)
    {
        return $this->setParameter('requestId', $id);
    }

    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    public function sendData($data)
    {
        $response = $this->httpClient->request('POST', $this->getEndpoint().'/gw_payment/transactionProcessor', [
            'Content-Type' => 'application/json; charset=UTF-8',
        ], json_encode($data));
        $responseClass = $this->responseClass;
        $responseData = $response->getBody()->getContents();

        return $this->response = new $responseClass($this, json_decode($responseData, true) ?? []);
    }
}
