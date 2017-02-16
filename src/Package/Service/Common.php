<?php

namespace Correios\Package\Service;

use Correios\Package\AbstractPackage;

class Common extends AbstractPackage
{
    /**
     * {@inheritdoc}
     */
    public $conversions = [
        'code'                 => 'Codigo',
        'error'                => 'Erro',
        'message'              => 'MsgErro',
        'value'                => 'ValorSemAdicionais',
        'total'                => 'Valor',
        'own_hand_value'       => 'ValorMaoPropria',
        'receipt_notice_value' => 'ValorAvisoRecebimento',
        'declared_value'       => 'ValorValorDeclarado',
        'deadline'             => 'PrazoEntrega',
        'home_delivery'        => 'EntregaDomiciliar',
        'saturday_delivery'    => 'EntregaSabado',
        'observation'          => 'obsFim',
    ];

    /**
     * {@inheritdoc}
     */
    public $casts = [
        'code'                 => 'integer',
        'error'                => 'integer',
        'message'              => 'string',
        'value'                => 'float',
        'total'                => 'float',
        'own_hand_value'       => 'float',
        'receipt_notice_value' => 'float',
        'declared_value'       => 'float',
        'deadline'             => 'integer',
        'home_delivery'        => 'special',
        'saturday_delivery'    => 'special',
    ];
}
