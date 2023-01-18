<?php

namespace App\Exceptions\Http\register;

use App\Constant\ErrorMessage;
use App\Exceptions\ApiException;
use Throwable;

class ResourceConflictException extends ApiException
{
    /**
     * ValidationErrorException constructor.
     * @param string $errorMessage
     * @param string $errorCode
     * @param Throwable|null $previous
     */
    public function __construct(
        $errorMessage = ErrorMessage::RESOURCE_CONFLICE_MSG,
        Throwable $previous = null
    ) {
        parent::__construct(409, $errorMessage, $previous);

        $this->errorMessage = $errorMessage;
    }
}
