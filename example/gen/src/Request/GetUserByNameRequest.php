<?php declare(strict_types=1);

/*
 * This file was generated by docler-labs/api-client-generator.
 *
 * Do not edit it manually.
 */

namespace OpenApi\PetStoreClient\Request;

class GetUserByNameRequest implements RequestInterface
{
    /** @var string */
    private $username;

    /** @var string */
    private $contentType = '';

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getRoute(): string
    {
        return \strtr('user/{username}', ['{username}' => $this->username]);
    }

    public function getQueryParameters(): array
    {
        return [];
    }

    public function getRawQueryParameters(): array
    {
        return [];
    }

    public function getCookies(): array
    {
        return [];
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function getBody()
    {
        return null;
    }
}
