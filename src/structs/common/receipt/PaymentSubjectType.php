<?php 

namespace IntellectMoney\SDK\Structs\Common\Receipt;

use IntellectMoney\SDK\Structs\Common\BaseEnum;

/**
 * Предмет расчета.
 */
final class PaymentSubjectType extends BaseEnum
{
    /**
     * Неизвестно.
     * @var int
     */
    public const Empty = 0;

    /**
     * Товар.
     * @var int
     */
    public const Product = 1;

    /**
     * Подакцизный товар.
     * @var int
     */
    public const Excisable = 2;

    /**
     * Работа.
     * @var int
     */
    public const Job = 3;

    /**
     * Услуга.
     * @var int
     */
    public const Service = 4;

    /**
     * Ставка азартной игры.
     * @var int
     */
    public const GamblingBet = 5;

    /**
     * Выигрыш азартной игры.
     * @var int
     */
    public const GamblingGain = 6;

    /**
     * Лотерейный билет.
     * @var int
     */
    public const LotteryTicket = 7;

    /**
     * Выигрыш лотереи.
     * @var int
     */
    public const LotteryWinnings = 8;

    /**
     * Предоставление результатов интеллектуальной деятельности.
     * @var int
     */
    public const Rid = 9;

    /**
     * Платёж.
     * @var int
     */
    public const Payment = 10;

    /**
     * Агентское вознаграждение.
     * @var int
     */
    public const AgentComission = 11;

    /**
     * Выплата (составной предмет расчета).
     * @var int
     */
    public const Composite = 12;

    /**
     * Иной предмет расчета.
     * @var int
     */
    public const Other = 13;

    /**
     * Имущественное право.
     * @var int
     */
    public const PropertyRight = 14;

    /**
     * Внереализационный доход.
     * @var int
     */
    public const NonOperatingGain = 15;

    /**
     * Иные платежи и взносы.
     * @var int
     */
    public const InsurancePremium = 16;

    /**
     * Торговый сбор.
     * @var int
     */
    public const SalesTax = 17;

    /**
     * Курортный сбор.
     * @var int
     */
    public const ResortFee = 18;

    /**
     * Залог.
     * @var int
     */
    public const Pledge = 19;

    /**
     * Расход.
     * @var int
     */
    public const Expense = 20;

    /**
     * Взносы на обязательное пенсионное страхование ИП.
     * @var int
     */
    public const PensionInsuranceIndividualEntrepreneurs = 21;

    /**
     * Взносы на обязательное пенсионное страхование.
     * @var int
     */
    public const PensionInsurance = 22;

    /**
     * Взносы на обязательное медицинское страхование ИП.
     * @var int
     */
    public const MedicalInsuranceIndividualEntrepreneurs = 23;

    /**
     * Взносы на обязательное медицинское страхование.
     * @var int
     */
    public const MedicalInsurance = 24;

    /**
     * Взносы на обязательное социальное страхование.
     * @var int
     */
    public const SocialInsurance = 25;

    /**
     * Платеж казино.
     * @var int
     */
    public const CasinoPayment = 26;

    /**
     * Выдача денежных средств.
     * @var int
     */
    public const DisbursementOfFunds = 27;

    /**
     * АТНМ (не имеющем кода маркировки).
     * @var int
     */
    public const ATNM = 30;

    /**
     * АТМ (имеющем код маркировки).
     * @var int
     */
    public const ATM = 31;

    /**
     * ТНМ.
     * @var int
     */
    public const TNM = 32;

    /**
     * ТМ.
     * @var int
     */
    public const TM = 33;

    protected static array $_values = [
        self::Empty => 'Empty',
        self::Product => 'Product',
        self::Excisable => 'Excisable',
        self::Job => 'Job',
        self::Service => 'Service',
        self::GamblingBet => 'GamblingBet',
        self::GamblingGain => 'GamblingGain',
        self::LotteryTicket => 'LotteryTicket',
        self::LotteryWinnings => 'LotteryWinnings',
        self::Rid => 'Rid',
        self::Payment => 'Payment',
        self::AgentComission => 'AgentComission',
        self::Composite => 'Composite',
        self::Other => 'Other',
        self::PropertyRight => 'PropertyRight',
        self::NonOperatingGain => 'NonOperatingGain',
        self::InsurancePremium => 'InsurancePremium',
        self::SalesTax => 'SalesTax',
        self::ResortFee => 'ResortFee',
        self::Pledge => 'Pledge',
        self::Expense => 'Expense',
        self::PensionInsuranceIndividualEntrepreneurs => 'PensionInsuranceIndividualEntrepreneurs',
        self::PensionInsurance => 'PensionInsurance',
        self::MedicalInsuranceIndividualEntrepreneurs => 'MedicalInsuranceIndividualEntrepreneurs',
        self::MedicalInsurance => 'MedicalInsurance',
        self::SocialInsurance => 'SocialInsurance',
        self::CasinoPayment => 'CasinoPayment',
        self::DisbursementOfFunds => 'DisbursementOfFunds',
        self::ATNM => 'ATNM',
        self::ATM => 'ATM',
        self::TNM => 'TNM',
        self::TM => 'TM',
    ];
}