<?php

namespace Omnipay\MoMo\Message\AppInApp;

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
     */
    public function getData(): array
    {
        $this->validate('appData', 'customerNumber');

        return parent::getData();
    }

    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        $response = $this->httpClient->request('POST', $this->getEndpoint().'/pay/app', [
            'Content-Type' => 'application/json; charset=utf-8',
        ], json_encode($data));
        $responseData = $response->getBody()->getContents();

        return $this->response = new PurchaseResponse($this, json_decode($responseData, true) ?? []);
    }

    /**
     * get app data token from MoMo.
     *
     * @return null|string
     */
    public function getAppData(): ?string
    {
        return $this->getParameter('appData');
    }

    /**
     * set app token from app MoMo .
     *
     * @param  null|string  $appData
     * @return $this
     */
    public function setAppData(?string $appData)
    {
        return $this->setParameter('appData', $appData);
    }

    /**
     * get store name.
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
     * get order code.
     *
     * @return null|string
     */
    public function getPartnerTransId(): ?string
    {
        return $this->getParameter('partnerTransId');
    }

    /**
     * set order code.
     *
     * @param  null|string  $id
     * @return $this
     */
    public function setPartnerTransId(?string $id)
    {
        return $this->setParameter('partnerTransId', $id);
    }

    /**
     * get partner name.
     *
     * @return null|string
     */
    public function getPartnerName(): ?string
    {
        return $this->getParameter('partnerName');
    }

    /**
     * set partner name.
     *
     * @param  null|string  $name
     * @return $this
     */
    public function setPartnerName(?string $name)
    {
        return $this->setParameter('partnerName', $name);
    }

    /**
     * get customer phone number.
     *
     * @return null|string
     */
    public function getCustomerNumber(): ?string
    {
        return $this->getParameter('customerNumber');
    }

    /**
     * set customer phone number.
     *
     * @param  null|string  $number
     * @return $this
     */
    public function setCustomerNumber(?string $number)
    {
        return $this->setParameter('customerNumber', $number);
    }

    /**
     * {@inheritdoc}
     */
    protected function getHashParameters(): array
    {
        $parameters = [
            'partnerCode', 'partnerRefId', 'amount',
        ];

        if ($this->getParameter('partnerName')) {
            $parameters[] = 'partnerName';
        }

        if ($this->getParameter('partnerTransId')) {
            $parameters[] = 'partnerTransId';
        }

        if ($this->getParameter('storeId')) {
            $parameters[] = 'storeId';
        }

        if ($this->getParameter('storeName')) {
            $parameters[] = 'storeName';
        }

        return $parameters;
    }
}
