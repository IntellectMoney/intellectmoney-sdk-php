<?php 

namespace IntellectMoney\SDK\Structs\Common;

/**
 * Способы оплаты.
 */
final class PreferenceType extends BaseEnum {
    /**
     * Внутренний платеж.
     */
    public const Inner = 0;

    /**
     * Банковская карта.
     */
    public const BankCard = 1;

    /**
     * Переводы.
     */
    public const Transfers = 2;

    /**
     * Терминалы.
     */
    public const Terminals = 3;

    /**
     * Банк.
     */
    public const Bank = 4;

    /**
     * Яндекс.
     */
    public const Yandex = 10;

    /**
     * MoneyMail.
     */
    public const MoneyMail = 11;

    /**
     * RbkMoney.
     */
    public const RbkMoney = 12;

    /**
     * TeleMoney.
     */
    public const TeleMoney = 13;

    /**
     * Единый кошелек (Walet).
     */
    public const Walet = 14;

    /**
     * EasyPay.
     */
    public const EasyPay = 15;

    /**
     * LiqPay.
     */
    public const LiqPay = 16;

    /**
     * WebCreds.
     */
    public const WebCreds = 17;

    /**
     * ZPayment.
     */
    public const ZPayment = 18;

    /**
     * MailRu.
     */
    public const MailRu = 19;

    /**
     * WebMoney.
     */
    public const WebMoney = 20;

    /**
     * VKontakteBANK.
     */
    public const VKontakteBANK = 21;

    /**
     * QiwiPurse.
     */
    public const QiwiPurse = 22;

    /**
     * SMS.
     */
    public const SMS = 23;

    /**
     * AMegaEKO.
     */
    public const AMegaEKO = 24;

    /**
     * Rapida.
     */
    public const Rapida = 25;

    /**
     * MobiMoney.
     */
    public const MobiMoney = 26;

    /**
     * AlfaClickPayU.
     */
    public const AlfaClickPayU = 27;

    /**
     * IBank.
     */
    public const IBank = 28;

    /**
     * BeeLineVisa.
     */
    public const BeeLineVisa = 29;

    /**
     * MegaFonVisa.
     */
    public const MegaFonVisa = 30;

    /**
     * Bankomats.
     */
    public const Bankomats = 31;

    /**
     * RapidaOnline.
     */
    public const RapidaOnline = 32;

    /**
     * GoogleADS.
     */
    public const GoogleADS = 33;

    /**
     * MtsVisa.
     */
    public const MtsVisa = 34;

    /**
     * PostPay.
     */
    public const PostPay = 35;

    /**
     * Mvideo.
     */
    public const Mvideo = 36;

    /**
     * PeerToPeerPayment.
     */
    public const PeerToPeerPayment = 37;

    /**
     * Tele2Visa.
     */
    public const Tele2Visa = 38;

    /**
     * QBank.
     */
    public const QBank = 39;

    /**
     * SberBank.
     */
    public const SberBank = 40;

    /**
     * AlfaClick.
     */
    public const AlfaClick = 41;

    /**
     * HomeCredit.
     */
    public const HomeCredit = 42;

    /**
     * QiwiPush.
     */
    public const QiwiPush = 43;

    /**
     * Masterpass.
     */
    public const Masterpass = 44;

    /**
     * AlfaLightning.
     */
    public const AlfaLightning = 45;

    /**
     * Tinkoff.
     */
    public const Tinkoff = 46;

    /**
     * PremiumBankCard.
     */
    public const PremiumBankCard = 47;

    /**
     * ForeignBankCard.
     */
    public const ForeignBankCard = 48;

    /**
     * ApplePay.
     */
    public const ApplePay = 49;

    /**
     * BNPL.
     */
    public const BNPL = 50;

    /**
     * GooglePay.
     */
    public const GooglePay = 51;

    /**
     * YandexPay.
     */
    public const YandexPay = 52;

    /**
     * СБП.
     */
    public const Sbp = 53;

    /**
     * Qiwi Кошелек.
     */
    public const QiwiWallet = 54;

    /**
     * MirPay.
     */
    public const MirPay = 55;

    /**
     * GazpromPay.
     */
    public const GazpromPay = 56;

    protected static array $_values = [
        self::Inner => 'Inner',
        self::BankCard => 'BankCard',
        self::Transfers => 'Transfers',
        self::Terminals => 'Terminals',
        self::Bank => 'Bank',
        self::Yandex => 'Yandex',
        self::MoneyMail => 'MoneyMail',
        self::RbkMoney => 'RbkMoney',
        self::TeleMoney => 'TeleMoney',
        self::Walet => 'Walet',
        self::EasyPay => 'EasyPay',
        self::LiqPay => 'LiqPay',
        self::WebCreds => 'WebCreds',
        self::ZPayment => 'ZPayment',
        self::MailRu => 'MailRu',
        self::WebMoney => 'WebMoney',
        self::VKontakteBANK => 'VKontakteBANK',
        self::QiwiPurse => 'QiwiPurse',
        self::SMS => 'SMS',
        self::AMegaEKO => 'AMegaEKO',
        self::Rapida => 'Rapida',
        self::MobiMoney => 'MobiMoney',
        self::AlfaClickPayU => 'AlfaClickPayU',
        self::IBank => 'IBank',
        self::BeeLineVisa => 'BeeLineVisa',
        self::MegaFonVisa => 'MegaFonVisa',
        self::Bankomats => 'Bankomats',
        self::RapidaOnline => 'RapidaOnline',
        self::GoogleADS => 'GoogleADS',
        self::MtsVisa => 'MtsVisa',
        self::PostPay => 'PostPay',
        self::Mvideo => 'Mvideo',
        self::PeerToPeerPayment => 'PeerToPeerPayment',
        self::Tele2Visa => 'Tele2Visa',
        self::QBank => 'QBank',
        self::SberBank => 'SberBank',
        self::AlfaClick => 'AlfaClick',
        self::HomeCredit => 'HomeCredit',
        self::QiwiPush => 'QiwiPush',
        self::Masterpass => 'Masterpass',
        self::AlfaLightning => 'AlfaLightning',
        self::Tinkoff => 'Tinkoff',
        self::PremiumBankCard => 'PremiumBankCard',
        self::ForeignBankCard => 'ForeignBankCard',
        self::ApplePay => 'ApplePay',
        self::BNPL => 'BNPL',
        self::GooglePay => 'GooglePay',
        self::YandexPay => 'YandexPay',
        self::Sbp => 'Sbp',
        self::QiwiWallet => 'QiwiWallet',
        self::MirPay => 'MirPay',
        self::GazpromPay => 'GazpromPay',
    ];
}
