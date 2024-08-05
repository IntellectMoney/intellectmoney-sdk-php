<?php 

namespace IntellectMoney\SDK\Structs\Response;

use IntellectMoney\SDK\Contracts\Contracts;
use IntellectMoney\SDK\Structs\Common\PaymentStep;
use IntellectMoney\SDK\Structs\Common\Service\ServiceData;

/**
 * Данные о состоянии оплаты СКО.
 */
final class BankCardPaymentStateData extends ServiceData
{
    /**
     * Статус платежа.
     * @var ?int
     */
    protected ?int $_paymentStep;

    /**
     * Сообщение.
     * @var ?string
     */
    protected ?string $_message;

    /**
     * Уникальный идентификатор RC-кода.
     * @var ?int
     */
    protected ?int $_rcCodeId;

    /**
     * Код формы 3DS.
     * @var ?string
     */
    protected ?string $_form3DS;

    /**
     * RRN операции.
     * @var ?string
     */
    protected ?string $_rrn;

    /**
     * Данные о состоянии оплаты СКО.
     * 
     * @param array $data Данные ответа.
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->_paymentStep = null;
        $this->_message = null;
        $this->_rcCodeId = null;
        $this->_form3DS = null;
        $this->_rrn = null;

        if (Contracts::keyExists('PaymentStep', $data))
            $this->_paymentStep = PaymentStep::fromMixed($data['PaymentStep']);
        if (Contracts::keyExists('Message', $data))
            $this->_message = (string) $data['Message'];
        if (Contracts::keyExists('RcCodeId', $data))
            $this->_rcCodeId = intval($data['RcCodeId']);
        if (Contracts::keyExists('Form3DS', $data))
            $this->_form3DS = (string) $data['Form3DS'];
        if (Contracts::keyExists('Rrn', $data))
            $this->_rrn = (string) $data['Rrn'];
    }

    /**
     * Статус платежа.
     * 
     * @return ?int
     * Возвращает статус платежа.
     */
    public function getPaymentStep(): ?int
    {
        return $this->_paymentStep;
    }

    /**
     * Сообщение.
     * 
     * @return ?string
     * Возвращает сообщение.
     */
    public function getMessage(): ?string
    {
        return $this->_message;
    }

    /**
     * Уникальный идентификатор RC-кода.
     * 
     * @return ?int
     * Возвращает уникальный идентификатор RC-кода.
     */
    public function getRcCodeId(): ?int
    {
        return $this->_rcCodeId;
    }

    /**
     * Код формы 3DS.
     * 
     * @return ?string
     * Возвращает код формы 3DS.
     */
    public function getForm3DS(): ?string
    {
        return $this->_form3DS;
    }

    /**
     * RRN операции.
     * 
     * @return ?string
     * Возвращает RRN операции.
     */
    public function getRrn(): ?string
    {
        return $this->_rrn;
    }
}