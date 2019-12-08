<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Csrf;

use Tests\SimpleTestCase;
use PublishingKit\Csrf\Token;

final class TokenTest extends SimpleTestCase
{
    public function testCreate()
    {
        $token = Token::generate();
        $this->assertInstanceOf(Token::class, $token);
    }

    public function testString()
    {
        $token = Token::generate();
        $this->assertIsString($token->__toString());
    }

    public function testEquals()
    {
        $token = Token::generate();
        $t2 = new Token($token->__toString());
        $this->assertTrue($token->equals($t2));
    }
}
