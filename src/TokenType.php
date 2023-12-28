<?php

namespace Danes\Login\Core\Token;

use Danes\Login\Plugin;

class TokenType {

	/**
	 * Type of token
	 *
	 * @var string
	 */
	private string $type;

	/**
	 * Sets the type to the first availabe type by default
	 */
	public function __construct() {
		$this->type = reset( self::get_available_types() );
		return $this;
	}

	/**
	 * Gets the type
	 *
	 * @return string
	 */
	public function get() {
		return $this->type;
	}

	/**
	 * Sets the typing
	 *
	 * @param string $type
	 * @return TokenType
	 */
	public function set( string $type ) {
		if ( in_array( $type, self::get_available_types(), true ) ) {
			$this->type = $type;
		}
		return $this;
	}

	public static function get_available_types(): array {
		return [
			'login',
			'reset',
		];
	}

}
