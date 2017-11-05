<?php
namespace Dvomaks\Livecoin;

interface ClientContract
{


    /**
     * PUBLIC DATA
     *
     * Documentation https://www.livecoin.net/api/public
     */
    public function exchangeTicker($params = []);
    public function exchangeLastTrades($params);
    public function exchangeOrderBook($params);
    public function exchangeAllOrderBook($params);
    public function exchangeMaxbidMinask($params);
    public function exchangeRestrictions($params);
    public function infoCoinInfo();


    /**
     * PRIVATE USER DATA
     *
     * Documentation https://www.livecoin.net/api/userdata
     */
    public function exchangeTrades($params = []);
    public function exchangeClientOrders($params = []);
    public function exchangeOrder($params);
    public function paymentBalances($params = []);
    public function paymentBalance($params);
    public function paymentHistoryTransactions($params);
    public function paymentHistorySize($params);
    public function exchangeCommissions();
    public function exchangeCommissionCommonInfo();


    /**
     * OPEN / CANCEL ORDERS
     *
     * Documentation https://www.livecoin.net/api/orders
     */
    public function exchangeBuylimit($params);
    public function exchangeSelllimit($params);
    public function exchangeBuymarket($params);
    public function exchangeSellmarket($params);
    public function exchangeCancellimit($params);


    /**
     * DEPOSIT AND WITHDRAWAL
     *
     * Documentation https://www.livecoin.net/api/withdrawal
     */
    public function paymentGetAddress($params);
    public function paymentOutCoin($params);
    public function paymentOutPayeer($params);
    public function paymentOutCapitalist($params);
    public function paymentOutAdvcah($params);
    public function paymentOutCard($params);
    public function paymentOutOkpay($params);
    public function paymentOutPerfectmoney($params);


    /**
     * VOUCHERS
     *
     * Documentation https://www.livecoin.net/api/vouchers
     */
    public function paymentVoucherMake($params);
    public function paymentVoucherAmount($params);
    public function paymentVoucherRedeem($params);
}