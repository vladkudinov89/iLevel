<?php

namespace App\Exceptions\Product;

class ProductDoesNotExistException extends \LogicException
{
    public function __construct(string $message = 'The Product does\'t exists', $code = 404, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
