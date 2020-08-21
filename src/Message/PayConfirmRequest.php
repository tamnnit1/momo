<?php

namespace Omnipay\MoMo\Message;

/**
 * @link https://developers.momo.vn/#/docs/pos_payment?id=x%c3%a1c-nh%e1%ba%adn-giao-d%e1%bb%8bch
 * @link https://developers.momo.vn/#/docs/qr_payment?id=x%c3%a1c-nh%e1%ba%adn-giao-d%e1%bb%8bch
 * @link https://developers.momo.vn/#/docs/app_in_app?id=x%c3%a1c-nh%e1%ba%adn-giao-d%e1%bb%8bch
 *
 * @author tamnnit
 * @since 1.0.0
 */
class PayConfirmRequest extends AbstractSignatureRequest
{
    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    public function sendData($data): PayConfirmResponse
    {
        $response = $this->httpClient->request('POST', $this->getEndpoint().'/pay/confirm', [
            'Content-Type' => 'application/json; charset=utf-8',
        ], json_encode($data));
        $responseData = $response->getBody()->getContents();

        return $this->response = new PayConfirmResponse($this, json_decode($responseData, true) ?? []);
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
     * get order code of MoMo.
     *
     * @return null|string
     */
    public function getMomoTransId(): ?string
    {
        return $this->getParameter('momoTransId');
    }

    /**
     * set trans id MoMo.
     *
     * @param  null|string  $id
     * @return $this
     */
    public function setMomoTransId(?string $id)
    {
        return $this->setParameter('momoTransId', $id);
    }

    /**
     * get phone number of customer.
     *
     * @return null|string
     */
    public function getCustomerNumber(): ?string
    {
        return $this->getParameter('customerNumber');
    }

    /**
     * set số điện thoại customer.
     *
     * @param  null|string  $number
     * @return $this
     */
    public function setCustomerNumber(?string $number)
    {
        return $this->setParameter('customerNumber', $number);
    }

    /**
     * get request type.
     *
     * @return null|string
     */
    public function getRequestType(): ?string
    {
        return $this->getParameter('requestType');
    }

    /**
     * set request type, commit or rollback.
     *
     * @param  null|string  $type
     * @return $this
     */
    public function setRequestType(?string $type)
    {
        return $this->setParameter('requestType', $type);
    }

    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        return [
            'partnerCode', 'partnerRefId', 'requestType', 'requestId', 'momoTransId',
        ];
    }
}
