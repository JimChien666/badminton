<?php

namespace App\Exceptions\Http;

use App\Constant\ErrorMessage;
use App\Exceptions\ApiException;
use Throwable;

class EmailNotFoundException extends ApiException
{
    /**
     * ValidationErrorException constructor.
     * @param string $errorMessage
     * @param string $errorCode
     * @param Throwable|null $previous
     */
    public function __construct(
        $errorMessage = ErrorMessage::EMAIL_NOT_FOUND_MSG,
        Throwable $previous = null
    ) {
        parent::__construct(404, $errorMessage, $previous);

        $this->errorMessage = $errorMessage;
    }
}
