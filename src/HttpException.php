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

class HttpException extends \RuntimeException
{
    /**
     * @var int HTTP status code, such as 403, 404, 500, etc
     */
    public $statusCode;

    /**
     * Exception constructor.
     * @param $status
     * @param null $message
     * @param int $code
     */
    public function __construct($status, $message = null, $code = 0, \Exception $previous = null)
    {
        $this->statusCode = $status;
        if (is_null($message)) {
            $message = StatusMap::reason($this->statusCode);
        }
        parent::__construct($message, $code, $previous);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName(): string
    {
        return StatusMap::reason($this->statusCode);
    }
}
