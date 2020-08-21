<?php

namespace Omnipay\MoMo\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 * @author tamnnit
 * @since 1.0.0
 */
abstract class AbstractSignatureResponse extends AbstractResponse
{
    use Concerns\ResponseSignatureValidation;

    /**
     * Response.
     *
     * @param  \Omnipay\Common\Message\RequestInterface  $request
     * @param $data
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);

        if ('0' === $this->getCode()) {
            $this->validateSignature();
        }
    }
}
