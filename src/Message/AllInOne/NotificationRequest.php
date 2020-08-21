<?php

namespace Omnipay\MoMo\Message\AllInOne;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * @link https://developers.momo.vn/#/docs/aio/?id=ipn-instant-payment-notification
 *
 * @author tamnnit
 * @since 1.0.0
 */
class NotificationRequest extends AbstractIncomingRequest
{
    /**
     * {@inheritdoc}
     */
    protected function getIncomingParametersBag(): ParameterBag
    {
        return $this->httpRequest->request;
    }
}
