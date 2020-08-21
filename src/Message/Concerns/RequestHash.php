<?php

namespace Omnipay\MoMo\Message\Concerns;

use Omnipay\MoMo\Support\Arr;
use Omnipay\MoMo\Support\RSAEncrypt;

/**
 * @author tamnnit
 * @since 1.0.0
 */
trait RequestHash
{
    /**
     * get hash [[getHashParameters()]].
     *
     * @return string
     */
    protected function generateHash(): string
    {
        $data = [];
        $rsa = new RSAEncrypt(
            $this->getPublicKey()
        );
        $parameters = $this->getParameters();

        foreach ($this->getHashParameters() as $pos => $parameter) {
            if (! is_string($pos)) {
                $pos = $parameter;
            }

            $data[$pos] = Arr::getValue($parameter, $parameters);
        }

        return $rsa->encrypt($data);
    }

    /**
     * get hash parameters send to MoMo.
     *
     * @return array
     */
    abstract protected function getHashParameters(): array;
}
