<?php

namespace Omnipay\MoMo\Message\POS;

use Omnipay\MoMo\Message\AbstractHashRequest;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class PurchaseRequest extends AbstractHashRequest
{
    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        parent::initialize($parameters);
        $this->setParameter('payType', 3);
        $this->setParameter('version', 2);

        return $this;
    }

    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('paymentCode');
        $parameters = parent::getData();
        unset($parameters['paymentCode']);

        return $parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function sendData($data): PurchaseResponse
    {
        $response = $this->httpClient->request('POST', $this->getEndpoint().'/pay/pos', [
            'Content-Type' => 'application/json; charset=utf-8',
        ], json_encode($data));
        $responseData = $response->getBody()->getContents();

        return $this->response = new PurchaseResponse($this, json_decode($responseData, true) ?? []);
    }

    /**
     * get code store.
     *
     * @return null|string
     */
    public function getStoreId(): ?string
    {
        return $this->getParameter('storeId');
    }

    /**
     * set code store.
     *
     * @param  null|string  $id
     * @return $this
     */
    public function setStoreId(?string $id)
    {
        return $this->setParameter('storeId', $id);
    }

    /**
     * get store name.
     *
     * @return null|string
     */
    public function getStoreName(): ?string
    {
        return $this->getParameter('storeName');
    }

    /**
     * set store name.
     *
     * @param  null|string  $name
     * @return $this
     */
    public function setStoreName(?string $name)
    {
        return $this->setParameter('storeName', $name);
    }

    /**
     * get order code.
     *
     * @return null|string
     */
    public function getPartnerRefId(): ?string
    {
        return $this->getParameter('partnerRefId');
    }

    /**
     * set order code.
     *
     * @param  null|string  $id
     * @return $this
     */
    public function setPartnerRefId(?string $id)
    {
        return $this->setParameter('partnerRefId', $id);
    }

    /**
     * get code payment.
     *
     * @return null|string
     */
    public function getPaymentCode(): ?string
    {
        return $this->getParameter('paymentCode');
    }

    /**
     * set code khách payment.
     *
     * @param  null|string  $code
     * @return $this
     */
    public function setPaymentCode(?string $code)
    {
        return $this->setParameter('paymentCode', $code);
    }

    /**
     * {@inheritdoc}
     */
    protected function getHashParameters(): array
    {
        $parameters = [
            'partnerCode', 'partnerRefId', 'amount', 'paymentCode',
        ];

        if ($this->getParameter('storeId')) {
            $parameters[] = 'storeId';
        }

        if ($this->getParameter('storeName')) {
            $parameters[] = 'storeName';
        }

        return $parameters;
    }
}
