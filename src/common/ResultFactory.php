<?php

namespace IntellectMoney\SDK\Common;

use IntellectMoney\SDK\Structs\Common\Service\ServiceData;
use IntellectMoney\SDK\Structs\Response\BankCardPaymentData;
use IntellectMoney\SDK\Structs\Response\BankCardPaymentStateData;
use IntellectMoney\SDK\Structs\Response\CreateInvoiceData;

/**
 * Фабрика, для перевода результатов запросов в объекты.
 */
final class ResultFactory
{
    /**
     * Создать объект результата.
     * 
     * @param string $method Вызванный метод API.
     * @param array $data Данные, полученные от API.
     * 
     * @return ServiceData
     * Возвращает объект результата.
     */
    public static function create(string $method, array|bool $data = []): ServiceData
    {
        switch ($method) {
            case 'createInvoice':
                return new CreateInvoiceData($data);
            case 'bankCardPayment':
                return new BankCardPaymentData($data);
            case 'getBankCardPaymentState':
                return new BankCardPaymentStateData($data);
            default:
                throw new \OutOfRangeException('Invalid method: ' . $method);
        }
    }
}