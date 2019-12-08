<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\SimpleTestCase;
use PublishingKit\Csrf\StoredTokenReader;
use PublishingKit\Csrf\Token;
use Mockery as m;

final class StoredTokenReaderTest extends SimpleTestCase
{
    public function testReadToken()
    {
        $storage = m::mock('PublishingKit\Csrf\TokenStorage');
        $token = new Token('bar');
        $storage->shouldReceive('retrieve')
            ->with('foo')
            ->once()
            ->andReturn($token);
        $reader = new StoredTokenReader($storage);
        $this->assertEquals($token, $reader->read('foo'));
    }

    public function testGenerateToken()
    {
        $storage = m::mock('PublishingKit\Csrf\TokenStorage');
        $storage->shouldReceive('retrieve')
            ->with('foo')
            ->once()
            ->andReturn(null);
        $storage->shouldReceive('store')->once();
        $reader = new StoredTokenReader($storage);
        $this->assertInstanceOf(Token::class, $reader->read('foo'));
    }
}
