<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EcommerceException extends HttpException
{
    public static function ambiguousParameter(): self
    {
        return new static(Response::HTTP_INTERNAL_SERVER_ERROR,
            'Ambiguous ecommerce config in minimin_before_checkout.', null, []);
    }

    public static function itemCount(int $itemCount): self
    {
        return new static(Response::HTTP_UNPROCESSABLE_ENTITY, "Item count must not below $itemCount.", null, []);
    }

    public static function totalAmount($itemAmount): self
    {
        return new static(Response::HTTP_UNPROCESSABLE_ENTITY, "Item amount must not below $itemAmount.", null, []);
    }
}
