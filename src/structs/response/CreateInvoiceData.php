<?php 

namespace IntellectMoney\SDK\Structs\Response;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\PaymentMethod;
use IntellectMoney\SDK\Structs\Common\Service\ServiceData;

/**
 * Данные о созданном СКО.
 */
final class CreateInvoiceData extends ServiceData
{
    /**
     * Номер счета (СКО).
     * @var int
     */
    protected int $_invoiceId;

    /**
     * Доступные способы оплаты.
     * @var ?array
     */
    protected ?array $_paymentWays;

    /**
     * Список номеров сплит счетов (СКО).
     * @var ?array
     */
    protected ?array $_invoiceIdSplits;

    /**
     * Данные о созданном СКО.
     * 
     * @param array $data Данные о созданном СКО.
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->_invoiceId = 0;
        $this->_paymentWays = null;
        $this->_invoiceIdSplits = null;
        
        if ($this->isError())
            return;

        Contracts::keyRequired('InvoiceId', $data);

        $this->_invoiceId = intval($data['InvoiceId']);
        $this->_paymentWays = Contracts::keyExists('PaymentWays', $data) ? array_map(function(int $i, array $v) {
            return new PaymentMethod($v);
        }, array_keys($data['PaymentWays']), array_values($data['PaymentWays'])) : null;

        $this->_invoiceIdSplits = Contracts::keyExists('InvoiceIdSplits', $data) ? array_map(function(int $i, array $v) {
            return intval($v);
        }, array_keys($data['InvoiceIdSplits']), array_values($data['InvoiceIdSplits']))
        : null;
    }

    /**
     * Идентификатор счета (СКО).
     * 
     * @return int
     * Возвращает идентификатор счета (СКО).
     */
    public function getInvoiceId(): int
    {
        return $this->_invoiceId;
    }

    /**
     * Способы оплаты.
     * 
     * @return PaymentMethod[]
     * Возвращает способы оплаты.
     */
    public function getPaymentWays(): ?array
    {
        return $this->_paymentWays;
    }

    /**
     * Идентификаторы сплит счетов (СКО).
     * 
     * @return int[]
     * Возвращает идентификаторы сплит счетов (СКО).
     */
    public function getInvoiceIdSplits(): ?array
    {
        return $this->_invoiceIdSplits;
    }
}