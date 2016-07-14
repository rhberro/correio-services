<?php

namespace Correios;

use Correios\Response\Service\Deadline;
use Correios\Response\Service\Price;
use Correios\Response\Service\PriceDeadline;

class Request
{
    /**
     * The request client.
     *
     * @var \SoapClient
     */
    private $client;

    /**
     * The request wsdl.
     *
     * @var string
     */
    private $wsdl = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx?WSDL';

    /**
     * Create a new request instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new \SoapClient($this->wsdl);
    }

    /**
     * Calculate the cost in reais (R$) and the time in days to delivery a package.
     *
     * @param string $origin
     * @param string $destination
     * @param string $weight
     * @param float  $length
     * @param float  $height
     * @param float  $width
     * @param float  $diameter
     * @param string $code
     * @param int    $format
     * @param string $own
     * @param int    $declared
     * @param string $advice
     *
     * @return PriceDeadline
     */
    public static function complete(
        $origin,
        $destination,
        $weight,
        $length,
        $height,
        $width,
        $diameter,
        $code = '40010',
        $format = 1,
        $own = 'N',
        $declared = 0,
        $advice = 'N'
    ) {
        $instance = new static();

        $params = [
            'nCdServico'          => $code,
            'sCepOrigem'          => $origin,
            'sCepDestino'         => $destination,
            'nVlPeso'             => $weight,
            'nCdFormato'          => $format,
            'nVlComprimento'      => $length,
            'nVlAltura'           => $height,
            'nVlLargura'          => $width,
            'nVlDiametro'         => $diameter,
            'sCdMaoPropria'       => $own,
            'nVlValorDeclarado'   => $declared,
            'sCdAvisoRecebimento' => $advice,
        ];

        $results = $instance->client->CalcPrecoPrazo($params);

        return new PriceDeadline($results);
    }

    /**
     * Calculate the cost, in reais (R$) to delivery a package.
     *
     * @param string $origin
     * @param string $destination
     * @param string $weight
     * @param float  $length
     * @param float  $height
     * @param float  $width
     * @param float  $diameter
     * @param string $code
     * @param int    $format
     * @param string $own
     * @param int    $declared
     * @param string $advice
     *
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
        $code = '40010',
        $format = 1,
        $own = 'N',
        $declared = 0,
        $advice = 'N'
    ) {
        $instance = new static();

        $params = [
            'nCdServico'          => $code,
            'sCepOrigem'          => $origin,
            'sCepDestino'         => $destination,
            'nVlPeso'             => $weight,
            'nCdFormato'          => $format,
            'nVlComprimento'      => $length,
            'nVlAltura'           => $height,
            'nVlLargura'          => $width,
            'nVlDiametro'         => $diameter,
            'sCdMaoPropria'       => $own,
            'nVlValorDeclarado'   => $declared,
            'sCdAvisoRecebimento' => $advice,
        ];

        $results = $instance->client->CalcPreco($params);

        return new Price($results);
    }

    /**
     * Calculate the time, in days to delivery a package.
     *
     * @param $origin
     * @param $destination
     * @param string $code
     *
     * @return Deadline
     */
    public static function deadline($origin, $destination, $code = '40010')
    {
        $instance = new static();

        $params = [
            'nCdServico'  => $code,
            'sCepOrigem'  => $origin,
            'sCepDestino' => $destination,
        ];

        $results = $instance->client->CalcPrazo($params);

        return new Deadline($results);
    }
}
