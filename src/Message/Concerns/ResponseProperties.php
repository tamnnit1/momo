<?php

namespace Omnipay\MoMo\Message\Concerns;

/**
 * @author tamnnit
 * @since 1.0.0
 */
trait ResponseProperties
{
    /**
     * get param by name
     *
     * @param  string  $name
     * @return null|string
     */
    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            trigger_error(sprintf('Undefined property: %s::%s', __CLASS__, '$'.$name), E_USER_NOTICE);

            return;
        }
    }

    /**
     * set get param by name
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return null|string
     */
    public function __set($name, $value)
    {
        if (isset($this->data[$name])) {
            trigger_error(sprintf('Undefined property: %s::%s', __CLASS__, '$'.$name), E_USER_NOTICE);
        } else {
            $this->$name = $value;
        }
    }
}
