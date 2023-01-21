<?php

declare(strict_types=1);

namespace App\Exception;

final class QuestionNotFoundException extends \Exception
{
    public static function errorCode(): self
    {
        return new self('No question found');
    }
}
