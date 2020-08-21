<?php

namespace Omnipay\MoMo\Message\AllInOne;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * @link https://developers.momo.vn/#/docs/aio/?id=x%e1%bb%ad-l%c3%bd-k%e1%ba%bft-qu%e1%ba%a3-thanh-to%c3%a1n
 *
 * @author tamnnit
 * @since 1.0.0
 */
class CompletePurchaseRequest extends AbstractIncomingRequest
{
    /**
     * {@inheritdoc}
     */
    protected function getIncomingParametersBag(): ParameterBag
    {
        return $this->httpRequest->query;
    }
}
