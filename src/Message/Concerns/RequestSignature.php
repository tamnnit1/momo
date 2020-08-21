<?php

namespace Omnipay\MoMo\Message\Concerns;

use Omnipay\MoMo\Support\Arr;
use Omnipay\MoMo\Support\Signature;

/**
 * @author tamnnit
 * @since 1.0.0
 */
trait RequestSignature
{
    /**
     * get signature send to MoMo [[getSignatureParameters()]].
     *
     * @return string
     */
    protected function generateSignature(): string
    {
        $data = [];
        $signature = new Signature(
            $this->getSecretKey()
        );
        $parameters = $this->getParameters();

        foreach ($this->getSignatureParameters() as $pos => $parameter) {
            if (! is_string($pos)) {
                $pos = $parameter;
            }

            $data[$pos] = Arr::getValue($parameter, $parameters);
        }

        return $signature->generate($data);
    }

    /**
     * get parameters
     *
     * @return array
     */
    abstract protected function getSignatureParameters(): array;
}
