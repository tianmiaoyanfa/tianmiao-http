<?php

declare(strict_types=1);
/**
 * This file is part of Tianmiao.
 *
 * @link     https://tianmiao.com
 * @document https://docs.tianmiao.com
 * @contact  tianmiao.com@gmail.com
 * @license  https://tianmiao.com/LICENSE
 */
namespace Tianmiao\Http;

class UnprocessableEntityException extends HttpException
{
    protected $errors;

    /**
     * Constructor.
     * @param string $message error message
     * @param int $code error code
     * @param \Exception $previous the previous exception used for the exception chaining
     */
    public function __construct($message = null, $code = 0, \Exception $previous = null)
    {
        parent::__construct(422, $message, $code, $previous);
    }

    public function addError(string $field, string $message)
    {
        $this->errors[$field][] = $message;
        return $this;
    }

    public static function error(string $field, string $message)
    {
        $exception = new static();
        $exception->addError($field, $message);
        return $exception;
    }

    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public static function errors(array $errors)
    {
        $exception = new static();
        $exception->setErrors($errors);
        return $exception;
    }
}
