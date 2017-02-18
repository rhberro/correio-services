<?php

namespace Correios;

use Correios\Response\ {
    Deadline,
    DeadlinePrice,
    Price
};

class Request implements RequestInterface {
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
     * {@inheritdoc}
     */
    public static function deadline($origin, $destination, $code = '40010'): Deadline
    {
        $instance = new static;

        $params = [
            'nCdServico' => $code,
            'sCepOrigem' => $origin,
            'sCepDestino' => $destination,
        ];

        $results = $instance->client->CalcPrazo($params);

        return new Deadline($results);
    }

    /**
     * {@inheritdoc}
     */
    public static function deadlinePrice
    (
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
    ): DeadlinePrice
    {
        $instance = new static;

        $params = [
            'nCdServico' => $code,
            'sCepOrigem' => $origin,
            'sCepDestino' => $destination,
            'nVlPeso' => $weight,
            'nCdFormato' => $format,
            'nVlComprimento' => $length,
            'nVlAltura' => $height,
            'nVlLargura' => $width,
            'nVlDiametro' => $diameter,
            'sCdMaoPropria' => $own,
            'nVlValorDeclarado' => $declared,
            'sCdAvisoRecebimento' => $advice,
        ];

        $results = $instance->client->CalcPrecoPrazo($params);

        return new DeadlinePrice($results);
    }

    /**
     * {@inheritdoc}
     */
    public static function price
    (
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
    ): Price
    {
        $instance = new static;

        $params = [
            'nCdServico' => $code,
            'sCepOrigem' => $origin,
            'sCepDestino' => $destination,
            'nVlPeso' => $weight,
            'nCdFormato' => $format,
            'nVlComprimento' => $length,
            'nVlAltura' => $height,
            'nVlLargura' => $width,
            'nVlDiametro' => $diameter,
            'sCdMaoPropria' => $own,
            'nVlValorDeclarado' => $declared,
            'sCdAvisoRecebimento' => $advice,
        ];

        $results = $instance->client->CalcPreco($params);

        return new Price($results);
    }
}
