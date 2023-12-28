<?php

namespace Valrok\Token;

use Valrok\Token\TokenType;
use Valrok\Token\Token;

class TokenValidator {

	/**
	 * Validates a token by creating a new token and comparing their values
	 *
	 * @param string $value
	 * @param string $token
	 */
	public static function is_valid( string $value, string $token, TokenType $token_type, string $hash_type = 'sha512', bool $use_binary = false ): bool {
		return ( new Token( $value, $token_type, $hash_type, $use_binary ) )->value === $token;
	}

}
