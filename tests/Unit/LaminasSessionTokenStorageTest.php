<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Csrf;

use Tests\SimpleTestCase;
use PublishingKit\Csrf\LaminasSessionTokenStorage;
use PublishingKit\Csrf\Token;
use Laminas\Session\Container;

final class LaminasSessionTokenStorageTest extends SimpleTestCase
{
    public function testCreate()
    {
        $session = new Container();
        $storage = new LaminasSessionTokenStorage($session);
        $token = new Token('bar');
        $this->assertNull($storage->retrieve('foo'));
        $storage->store('foo', $token);
        $this->assertEquals($token, $storage->retrieve('foo'));
    }
}
