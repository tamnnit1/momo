<?php

namespace Omnipay\MoMo\Support;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class RSAEncrypt
{
    /**
     * public key.
     *
     * @var string
     */
    protected $publicKey;

    /**
     * DataEncrypt.
     *
     * @param  string  $publicKey
     */
    public function __construct(string $publicKey)
    {
        $this->publicKey = $publicKey;
    }

    /**
     * encrypt.
     *
     * @param  array  $data
     * @return string
     */
    public function encrypt(array $data): string
    {
        $data = json_encode($data);
        openssl_public_encrypt($data, $dataEncrypted, $this->publicKey, OPENSSL_PKCS1_PADDING);

        return base64_encode($dataEncrypted);
    }
}
