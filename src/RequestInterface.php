<?php

namespace Correios;

use Correios\Response\ {
    Deadline,
    DeadlinePrice,
    Price
};

interface RequestInterface
{
    /**
     * Calculate the time in days to delivery a package.
     *
     * @param $origin
     * @param $destination
     * @param string $code
     * @return Deadline
     */
    public static function deadline($origin, $destination, $code): Deadline;

    /**
     * Calculate the cost in reais (R$) and the time in days to delivery a package.
     *
     * @param string $origin
     * @param string $destination
     * @param string $weight
     * @param float $length
     * @param float $height
     * @param float $width
     * @param float $diameter
     * @param string $code
     * @param int $format
     * @param string $own
     * @param int $declared
     * @param string $advice
     * @return DeadlinePrice
     */
    public static function deadlinePrice(
        $origin,
        $destination,
        $weight,
        $length,
        $height,
        $width,
        $diameter,
        $code,
        $format,
        $own,
        $declared,
        $advice
    ): DeadlinePrice;

    /**
     * Calculate the cost in reais (R$) to delivery a package.
     *
     * @param string $origin
     * @param string $destination
     * @param string $weight
     * @param float $length
     * @param float $height
     * @param float $width
     * @param float $diameter
     * @param string $code
     * @param int $format
     * @param string $own
     * @param int $declared
     * @param string $advice
     * @return Price
     */
    public static function price(
        $origin,
        $destination,
        $weight,
        $length,
        $height,
        $width,
        $diameter,
        $code,
        $format,
        $own,
        $declared,
        $advice
    ): Price;
}
