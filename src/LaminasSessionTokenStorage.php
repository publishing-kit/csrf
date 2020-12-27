<?php

declare(strict_types=1);

namespace PublishingKit\Csrf;

use Laminas\Session\Container;

final class LaminasSessionTokenStorage implements TokenStorage
{
    /**
     * @var Container
     */
    private $session;

    public function __construct(Container $session)
    {
        $this->session = $session;
    }

    public function store(string $key, Token $token): void
    {
        $this->session->$key = $token->__toString();
    }

    public function retrieve(string $key): ?Token
    {
        /** @var string|null **/
        $tokenValue = $this->session->$key;

        if ($tokenValue === null) {
            return null;
        }

        return new Token($tokenValue);
    }
}
