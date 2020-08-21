<?php
namespace Omnipay\MoMo\Concerns;

/**
 * @author tamnnit
 * @since 1.0.0
 */
trait Parameters
{
    /**
     * get access key 
     *
     * @return null|string
     */
    public function getAccessKey(): ?string
    {
        return $this->getParameter('accessKey');
    }

    /**
     * set access key 
     *
     * @param  null|string  $key
     * @return $this
     */
    public function setAccessKey(?string $key)
    {
        return $this->setParameter('accessKey', $key);
    }

    /**
     * get secret key 
     *
     * @return null|string
     */
    public function getSecretKey(): ?string
    {
        return $this->getParameter('secretKey');
    }

    /**
     * set secret key 
     *
     * @param  null|string  $key
     * @return $this
     */
    public function setSecretKey(?string $key)
    {
        return $this->setParameter('secretKey', $key);
    }

    /**
     * get partner code 
     *
     * @return null|string
     */
    public function getPartnerCode(): ?string
    {
        return $this->getParameter('partnerCode');
    }

    /**
     * set partner code 
     *
     * @param  null|string  $code
     * @return $this
     */
    public function setPartnerCode(?string $code)
    {
        return $this->setParameter('partnerCode', $code);
    }

    /**
     * get public key 
     *
     * @return null|string
     */
    public function getPublicKey(): ?string
    {
        return $this->getParameter('publicKey');
    }

    /**
     * set public key 
     *
     * @param  null|string  $key
     * @return $this
     */
    public function setPublicKey(?string $key)
    {
        return $this->setParameter('publicKey', $key);
    }
}
