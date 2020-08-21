<?php

namespace Omnipay\MoMo\Message;

/**
 * @author tamnnit
 * @since 1.0.0
 */
abstract class AbstractIncomingRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData(): array
    {
        call_user_func_array(
            [$this, 'validate'],
            array_keys($parameters = $this->getIncomingParameters())
        );

        return $parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        parent::initialize($parameters);

        foreach ($this->getIncomingParameters() as $parameter => $value) {
            $this->setParameter($parameter, $value);
        }

        return $this;
    }

    /**
     * get parameters.
     *
     * @return array
     */
    abstract protected function getIncomingParameters(): array;
}
