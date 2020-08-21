<?php

namespace Omnipay\MoMo\Message;

/**
 * @author tamnnit
 * @since 1.0.0
 */
abstract class AbstractHashRequest extends AbstractRequest
{
    use Concerns\RequestHash;
    use Concerns\RequestEndpoint;

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        $parameters = $this->getParameters();
        call_user_func_array([$this, 'validate'], $this->getHashParameters());
        $parameters['hash'] = $this->generateHash();
        unset($parameters['testMode'], $parameters['publicKey'], $parameters['secretKey']);

        return $parameters;
    }
}
