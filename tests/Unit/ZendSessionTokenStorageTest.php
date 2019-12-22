<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Csrf;

use Tests\SimpleTestCase;
use PublishingKit\Csrf\ZendSessionTokenStorage;
use PublishingKit\Csrf\Token;
use Zend\Session\Container;

final class ZendSessionTokenStorageTest extends SimpleTestCase
{
    public function testCreate()
    {
        $session = new Container();
        $storage = new ZendSessionTokenStorage($session);
        $token = new Token('bar');
        $this->assertNull($storage->retrieve('foo'));
        $storage->store('foo', $token);
        $this->assertEquals($token, $storage->retrieve('foo'));
    }
}
