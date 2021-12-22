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

class RangeNotSatisfiableException extends HttpException
{
    /**
     * RangeNotSatisfiableException constructor.
     * @param null $message
     * @param int $code
     */
    public function __construct($message = null, $code = 0, \Exception $previous = null)
    {
        parent::__construct(416, $message, $code, $previous);
    }
}
