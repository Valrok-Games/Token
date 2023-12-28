<?php

namespace Danes\Login\Core\Token;

use Danes\Login\Plugin;
use Danes\Login\Core\Token\TokenType;

class Token {
	/**
	 * Value sent to the class constructor
	 *
	 * @var string
	 */
	public readonly string $value_to_tokenize;
	/**
	 * The type of hashing used
	 *
	 * @var string
	 */
	public readonly string $hash_type;
	/**
	 * The value of the @var string $value_to_tokenize after being hashed
	 *
	 * @var string
	 */
	public readonly string $value;
	/**
	 * Types of token generation formats
	 *
	 * @var array
	 */
	public readonly array $token_types;
	/**
	 * secret used for generating the token value
	 */
	private const SALT = 'asdfasfdasdfas!2352145asdQWEdfasdsadf';

	/**
	 * Generates a token
	 *
	 * @param string $value_to_tokenize - the value you want to be generate a token for
	 * @param string $hash_type - which hash type to be used
	 * @param boolean $use_binary - hex value if false else binary value
	 * @return Token
	 */
	public function __construct( string $value_to_tokenize, TokenType $token_type, string $hash_type = 'sha512', bool $use_binary = false ) {
		$this->hash_type         = $hash_type;
		$this->value_to_tokenize = $value_to_tokenize;
		$this->value             = $this->generate_token_value( $value_to_tokenize, $hash_type, $use_binary, $token_type );
	}

	/**
	 * hashes the @var string $value_to_tokenize value
	 *
	 * @param string $value_to_tokenize
	 * @param string $hash_type
	 * @param boolean $use_binary - hex value if false else binary value
	 * @return string
	 */
	private function generate_token_value( string $value_to_tokenize, string $hash_type, bool $use_binary, TokenType $token_type ): string {
		switch ( $token_type->get() ) {
			case 'reset':
				$value = hash_hmac( $hash_type, self::SALT, gmdate( 'Y-m-d' ), $use_binary );
				break;

			default:
				$hash  = base64_encode( hash( $hash_type, $value_to_tokenize . self::SALT, true ) );
				$value = hash_hmac( $hash_type, $hash, gmdate( 'Y-m-d' ), $use_binary );
				break;
		}
		return $value;
	}

}
