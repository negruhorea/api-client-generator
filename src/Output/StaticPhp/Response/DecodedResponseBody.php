<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientGenerator\Output\StaticPhp\Response;

use Psr\Http\Message\StreamInterface;

class DecodedResponseBody implements StreamInterface
{
    use StreamDecoratorTrait;

    public function decode(): array
    {
        // TODO: Implement getContents() method.
    }
}