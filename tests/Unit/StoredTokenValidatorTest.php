<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Csrf;

use Tests\SimpleTestCase;
use PublishingKit\Csrf\StoredTokenValidator;
use PublishingKit\Csrf\Token;
use Mockery as m;

final class StoredTokenValidatorTest extends SimpleTestCase
{
    public function testValidateToken()
    {
        $storage = m::mock('PublishingKit\Csrf\TokenStorage');
        $token = new Token('bar');
        $storage->shouldReceive('retrieve')
            ->with('foo')
            ->once()
            ->andReturn($token);
        $validator = new StoredTokenValidator($storage);
        $this->assertTrue($validator->validate('foo', $token));
    }

    public function testInvalidToken()
    {
        $storage = m::mock('PublishingKit\Csrf\TokenStorage');
        $token = new Token('bar');
        $storage->shouldReceive('retrieve')
            ->with('foo')
            ->once()
            ->andReturn(null);
        $validator = new StoredTokenValidator($storage);
        $this->assertFalse($validator->validate('foo', $token));
    }
}
