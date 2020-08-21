<?php

namespace Omnipay\MoMo\Support;

/**
 * @author tamnnit
 * @since 1.0.0
 */
class Signature
{
    /**
     * ksecret sey.
     *
     * @var string
     */
    protected $secretKey;

    /**
     * DataSignature.
     *
     * @param  string  $secretKey
     */
    public function __construct(string $secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * generate
     *
     * @param  array  $data
     * @return string
     */
    public function generate(array $data): string
    {
        $data = urldecode(http_build_query($data));

        return hash_hmac('sha256', $data, $this->secretKey);
    }

    /**
     * validate
     *
     * @param  array  $data
     * @param  string  $expect
     * @return bool
     */
    public function validate(array $data, string $expect): bool
    {
        $actual = $this->generate($data);

        return 0 === strcasecmp($expect, $actual);
    }
}
