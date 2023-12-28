# Token
- Handling and creation of tokens
- Token secret/salt can be found inside Token class, it is automatically added at the end of the string to token before creating the token.

## TokenValidator
- Validates tokens by comparing the token value to a newly created token and its value

## TokenType
- Specifies the type of token
- Uses the type when generating the token in order to have different types of tokens generated