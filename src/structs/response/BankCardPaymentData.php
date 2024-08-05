<?php 

namespace IntellectMoney\SDK\Structs\Response;

use IntellectMoney\SDK\Structs\Common\Service\ServiceData;

/**
 * Данные о проведенной оплате с помощью банковской карты.
 */
final class BankCardPaymentData extends ServiceData
{
    /**
     * Данные о проведенной оплате с помощью банковской карты.
     * 
     * @param array $data Данные.
     * ```
     * {
     * }
     * ```
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }
}