<?php 

namespace IntellectMoney\SDK\Structs\Common;

use IntellectMoney\SDK\Structs\Common\BaseEnum;

/**
 * Класс, представляющий коды валют.
 * 
 * Цифровые коды валют в формате [ISO-4217](https://www.iso.org/iso-4217-currency-codes.html)
 */
final class Currency extends BaseEnum {
    /**
     * Российский рубль (после 1998).
     */
    public const RUB = 643;

    /**
     * Российский рубль (до 1998).
     */
    public const RUR = 810;

    /**
     * Австралийский доллар.
     */
    public const AUD = 36;

    /**
     * Армянский драм.
     */
    public const AMD = 51;

    /**
     * Канадский доллар.
     */
    public const CAD = 124;

    /**
     * Китайский юань женьминьби.
     */
    public const CNY = 156;

    /**
     * Чешская крона.
     */
    public const CZK = 203;

    /**
     * Датская крона.
     */
    public const DKK = 208;

    /**
     * Венгерский форинт.
     */
    public const HUF = 348;

    /**
     * Индийская рупия.
     */
    public const INR = 356;

    /**
     * Японская иена.
     */
    public const JPY = 392;

    /**
     * Казахстанский тенге.
     */
    public const KZT = 398;

    /**
     * Южно-корейская вона (Корея).
     */
    public const KRW = 410;

    /**
     * Киргизский сом.
     */
    public const KGS = 417;

    /**
     * Латвийский лат.
     */
    public const LVL = 428;

    /**
     * Литовский лит.
     */
    public const LTL = 440;

    /**
     * Молдовский лей.
     */
    public const MDL = 498;

    /**
     * Норвежская крона.
     */
    public const NOK = 578;

    /**
     * Сингапурский доллар.
     */
    public const SGD = 702;

    /**
     * Южно-африканский рэнд.
     */
    public const ZAR = 710;

    /**
     * Шведская крона.
     */
    public const SEK = 752;

    /**
     * Швейцарский франк.
     */
    public const CHF = 756;

    /**
     * Фунт стерлингов Велико­британии.
     */
    public const GBP = 826;

    /**
     * Доллар США.
     */
    public const USD = 840;

    /**
     * Узбекский сум.
     */
    public const UZS = 860;

    /**
     * Туркменский манат.
     */
    public const TMT = 934;

    /**
     * Азербайджанский манат.
     */
    public const AZN = 944;

    /**
     * Новый румынский лей
     */
    public const RON = 946;

    /**
     * Новая турецкая лира.
     */
    public const _TRY = 949;

    /**
     * СПЗ.
     */
    public const XDR = 960;

    /**
     * Таджикский сомони.
     */
    public const TJS = 972;

    /**
     * Белорусский рубль.
     */
    public const BYR = 974;

    /**
     * Болгарский лев.
     */
    public const BGN = 975;

    /**
     * Евро.
     */
    public const EUR = 978;

    /**
     * Украинская гривна.
     */
    public const UAH = 980;

    /**
     * Польский злотый.
     */
    public const PLN = 985;

    /**
     * Бразильский реал.
     */
    public const BRL = 986;

    /**
     * Тестовая валюта (в рамках системы IntellectMoney).
     */
    public const TST = 0;

    protected static array $_values = [
        self::TST => 'TST',
        self::RUB => 'RUB',
        self::RUR => 'RUR',
        self::AUD => 'AUD',
        self::AMD => 'AMD',
        self::CAD => 'CAD',
        self::CNY => 'CNY',
        self::CZK => 'CZK',
        self::DKK => 'DKK',
        self::HUF => 'HUF',
        self::INR => 'INR',
        self::JPY => 'JPY',
        self::KZT => 'KZT',
        self::KRW => 'KRW',
        self::KGS => 'KGS',
        self::LVL => 'LVL',
        self::LTL => 'LTL',
        self::MDL => 'MDL',
        self::NOK => 'NOK',
        self::SGD => 'SGD',
        self::ZAR => 'ZAR',
        self::SEK => 'SEK',
        self::CHF => 'CHF',
        self::GBP => 'GBP',
        self::USD => 'USD',
        self::UZS => 'UZS',
        self::TMT => 'TMT',
        self::AZN => 'AZN',
        self::RON => 'RON',
        self::_TRY => 'TRY',
        self::XDR => 'XDR',
        self::TJS => 'TJS',
        self::BYR => 'BYR',
        self::BGN => 'BGN',
        self::EUR => 'EUR',
        self::UAH => 'UAH',
        self::PLN => 'PLN',
        self::BRL => 'BRL',
    ];
}