<?php

namespace Omnipay\MoMo\Message\Concerns;

use Omnipay\MoMo\Support\Arr;
use Omnipay\MoMo\Support\Signature;
use Omnipay\Common\Exception\InvalidResponseException;

/**
 * @author tamnnit
 * @since 1.0.0
 */
trait ResponseSignatureValidation
{
    /**
     * validate signature.
     *
     * @throws InvalidResponseException
     */
    protected function validateSignature(): void
    {
        $data = $this->getData();

        if (! isset($data['signature'])) {
            throw new InvalidResponseException(sprintf('Response from MoMo is invalid!'));
        }

        $dataSignature = [];
        $signature = new Signature(
            $this->getRequest()->getSecretKey()
        );

        foreach ($this->getSignatureParameters() as $pos => $parameter) {
            if (! is_string($pos)) {
                $pos = $parameter;
            }

            $dataSignature[$pos] = Arr::getValue($parameter, $data);
        }

        if (! $signature->validate($dataSignature, $data['signature'])) {
            throw new InvalidResponseException(sprintf('Data signature response from MoMo is invalid!'));
        }
    }

    /**
     * get signature parameters.
     *
     * @return array
     */
    abstract protected function getSignatureParameters(): array;
}
