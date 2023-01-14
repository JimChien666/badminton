<?php

namespace App\Exceptions\Http;

use Throwable;
use App\Constant\ErrorMessage;
use App\Exceptions\ApiException;

class ValidationErrorException extends ApiException
{
    /**
     * ValidationErrorException constructor.
     * @param string $errorMessage
     * @param string $errorCode
     * @param Throwable|null $previous
     */
    public function __construct(
        $errorMessage = ErrorMessage::VALIDATION_ERROR_MSG,
        Throwable $previous = null
    ) {
        parent::__construct(400, $errorMessage, $previous);

        $this->errorMessage = $errorMessage;
    }
}
