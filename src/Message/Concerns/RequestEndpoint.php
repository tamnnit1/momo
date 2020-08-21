<?php

namespace Omnipay\MoMo\Message\Concerns;

/**
 * @author tamnnit
 * @since 1.0.0
 */
trait RequestEndpoint
{
    /**
     * get Endpoint MoMo.
     *
     * @return string
     */
    protected function getEndpoint(): string
    {
        return $this->getTestMode() ? 'https://test-payment.momo.vn' : 'https://payment.momo.vn';
    }
}
