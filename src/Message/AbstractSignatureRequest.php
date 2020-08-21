<?php

namespace Omnipay\MoMo\Message;

/**
 * @author tamnnit
 * @since 1.0.0
 */
abstract class AbstractSignatureRequest extends AbstractRequest
{
    use Concerns\RequestEndpoint;
    use Concerns\RequestSignature;

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        $parameters = $this->getParameters();
        call_user_func_array(
            [$this, 'validate'],
            $this->getSignatureParameters()
        );
        $parameters['signature'] = $this->generateSignature();
        unset($parameters['secretKey'], $parameters['testMode'], $parameters['publicKey']);

        return $parameters;
    }
}
