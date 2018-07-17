<?php

namespace Dvomaks\Livecoin;

class Client implements ClientContract
{
    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiSecret;


    public function __construct(array $auth, $api_url)
    {
        $this->apiUrl = $api_url;

        $this->apiKey = array_get($auth, 'key');
        $this->apiSecret = array_get($auth, 'secret');
    }


    /**
     * PUBLIC DATA
     *
     * Documentation https://www.livecoin.net/api/public
     */

    /**
     * To retrieve information on a particular currency pair for the last 24 hours.
     *
     * @param array $params
     * @return array
     */
    public function exchangeTicker($params = [])
    {
        return $this->getRequest('exchange/ticker', $params, false);
    }

    /**
     * To retrieve information on the latest transactions for a specified currency pair.
     * You may receive data within the last hour or the last minute.
     *
     * @param array $params
     * @return array
     */
    public function exchangeLastTrades($params)
    {
        return $this->getRequest('exchange/last_trades', $params, false);
    }

    /**
     * Used to get the orderbook for a given market (the grouping attribute can be set by price)
     *
     * @param array $params
     * @return array
     */
    public function exchangeOrderBook($params)
    {
        return $this->getRequest('exchange/order_book', $params, false);
    }

    /**
     * Returns orderbook for every currency pair
     *
     * @param array $params
     * @return array
     */
    public function exchangeAllOrderBook($params)
    {
        return $this->getRequest('exchange/all/order_book', $params, false);
    }

    /**
     * Returns maximum bid and minimum ask in current orderbook
     *
     * @param array $params
     * @return array
     */
    public function exchangeMaxbidMinask($params)
    {
        return $this->getRequest('exchange/maxbid_minask', $params, false);
    }

    /**
     * Returns limits for minimum amount to open order, for each pair.
     * Also returns maximum number of digits after the decimal point for price.
     *
     * @param array $params
     * @return array
     */
    public function exchangeRestrictions($params)
    {
        return $this->getRequest('exchange/restrictions', $params, false);
    }

    /**
     * Returns public data for currencies
     *
     * @return array
     */
    public function infoCoinInfo()
    {
        return $this->getRequest('info/coinInfo', [], false);
    }


    /**
     * PRIVATE USER DATA
     *
     * Documentation https://www.livecoin.net/api/userdata
     */

    /**
     * To retrieve information on your latest transactions. The result may be determined by the parameters below.
     *
     * @param array $params
     * @return array
     */
    public function exchangeTrades($params = [])
    {
        return $this->getRequest('exchange/trades');
    }

    /**
     * To retrieve full information on your trade-orders for the specified currency pair.
     * You can optionally limit the response to orders of a certain type (open, closed, expired, etc.)
     *
     * @param array $params
     * @return array
     */
    public function exchangeClientOrders($params = [])
    {
        return $this->getRequest('exchange/client_orders', $params);
    }

    /**
     * To retrieve an order's information by its ID
     *
     * @param array $params
     * @return array
     */
    public function exchangeOrder($params)
    {
        return $this->getRequest('exchange/order', $params);
    }

    /**
     * Returns an array with your balances.
     * There are four types of balances for every currency: total, available (for trading), trade (in open orders),
     * available_withdrawal (available for withdrawal)
     *
     * @param array $params
     * @return array
     */
    public function paymentBalances($params = [])
    {
        return $this->getRequest('payment/balances', $params);
    }

    /**
     * Returns available balance for selected currency
     *
     * @param array $params
     * @return array
     */
    public function paymentBalance($params)
    {
        return $this->getRequest('payment/balance', $params);
    }

    /**
     * Returns a list of your transactions
     *
     * @param array $params
     * @return array
     */
    public function paymentHistoryTransactions($params)
    {
        return $this->getRequest('payment/history/transaction', $params);
    }

    /**
     * Returns your transaction count for the specified period
     *
     * @param array $params
     * @return integer
     */
    public function paymentHistorySize($params)
    {
        return $this->getRequest('payment/history/size', $params);
    }

    /**
     * Returns actual trading fee for client
     *
     * @return array
     */
    public function exchangeCommissions()
    {
        return $this->getRequest('exchange/commission', []);
    }

    /**
     * Returns actual trading fee and volume for the last 30 days in USD
     *
     * @return array
     */
    public function exchangeCommissionCommonInfo()
    {
        return $this->getRequest('exchange/commissionCommonInfo', []);
    }




    /**
     * OPEN / CANCEL ORDERS
     *
     * Documentation https://www.livecoin.net/api/orders
     */

    /**
     * To set a buy order (limit) for a particular currency.
     *
     * @param array $params
     * @return array
     */
    public function exchangeBuylimit($params)
    {
        return $this->postRequest('exchange/buylimit', $params);
    }

    /**
     * To set a sell order (limit) for a specific currency pair.
     * Additional parameters are similar to those for buy orders.
     *
     * @param array $params
     * @return array
     */
    public function exchangeSelllimit($params)
    {
        return $this->postRequest('exchange/selllimit', $params);
    }

    /**
     * Open a buy order (market) of the specified amount for a specific currency pair.
     *
     * @param array $params
     * @return array
     */
    public function exchangeBuymarket($params)
    {
        return $this->postRequest('exchange/buymarket', $params);
    }

    /**
     * To set a sell order (market) of the specified amount for a specific currency pair.
     *
     * @param array $params
     * @return array
     */
    public function exchangeSellmarket($params)
    {
        return $this->postRequest('exchange/sellmarket', $params);
    }

    /**
     * Cancel limit order.
     *
     * @param array $params
     * @return array
     */
    public function exchangeCancellimit($params)
    {
        return $this->postRequest('exchange/cancellimit', $params);
    }

    /**
     * DEPOSIT AND WITHDRAWAL
     *
     * Documentation https://www.livecoin.net/api/withdrawal
     */

    /**
     * Get deposit address for selected cryptocurrency.
     * Wallet field contains delimiter "::" in case if you need more data to deposit coins besides the wallet itself
     * (For example for coins: XMR, BTS, THS, STEEM).
     * In this case wallet is located before delimiter, when Memo/Payment ID after.
     *
     * @param array $params
     * @return array
     */
    public function paymentGetAddress($params)
    {
        return $this->getRequest('payment/get/address', $params);
    }

    /**
     * Submit a request to withdraw to a cryptocurrency wallet.
     * After successful withdrawal request, field "fault" will contain a "NULL" value,
     * while field "state" will contain "APPROVED" or "IN PROCESS".
     *
     * @param array $params
     * @return array
     */
    public function paymentOutCoin($params)
    {
        return $this->postRequest('payment/out/coin', $params);
    }

    /**
     * Submit a request to withdraw to a Payeer account.
     * After successful withdrawal request, field "fault" will contain a "NULL" value,
     * while field "state" will contain "APPROVED" or "IN PROCESS".
     *
     * @param array $params
     * @return array
     */
    public function paymentOutPayeer($params)
    {
        return $this->postRequest('payment/out/payeer', $params);
    }

    /**
     * Submit a request to withdraw to a Capitalist account.
     * After successful withdrawal request, field "fault" will contain a "NULL" value,
     * while field "state" will contain "APPROVED" or "IN PROCESS".
     *
     * @param array $params
     * @return array
     */
    public function paymentOutCapitalist($params)
    {
        return $this->postRequest('payment/out/capitalist', $params);
    }

    /**
     * Submit a request to withdraw to an Advcash account.
     * After successful withdrawal request, field "fault" will contain a "NULL" value,
     * while field "state" will contain "APPROVED" or "IN PROCESS".
     *
     * @param array $params
     * @return array
     */
    public function paymentOutAdvcah($params)
    {
        return $this->postRequest('payment/out/advcah', $params);
    }

    /**
     * Submit a request to withdraw to a bank card.
     * After successful withdrawal request, field "fault" will contain a "NULL" value,
     * while field "state" will contain "APPROVED" or "IN PROCESS".
     *
     * @param array $params
     * @return array
     */
    public function paymentOutCard($params)
    {
        return $this->postRequest('payment/out/card', $params);
    }

    /**
     * Submit a request to withdraw to Okpay account.
     * After successful withdrawal request, field "fault" will contain a "NULL" value,
     * while field "state" will contain "APPROVED" or "IN PROCESS".
     *
     * @param array $params
     * @return array
     */
    public function paymentOutOkpay($params)
    {
        return $this->postRequest('payment/out/okpay', $params);
    }

    /**
     * Submit a request to withdraw to a PerfectMoney account.
     * After successful withdrawal request, field "fault" will contain a "NULL" value,
     * while field "state" will contain "APPROVED" or "IN PROCESS".
     *
     * @param $params
     * @return array
     */
    public function paymentOutPerfectmoney($params)
    {
        return $this->postRequest('payment/out/perfectmoney', $params);
    }


    /**
     * VOUCHERS
     *
     * Documentation https://www.livecoin.net/api/vouchers
     */


    /**
     * Creates a new voucher. In case of success returns a voucher code as a string.
     *
     * @param array $params
     * @return string
     */
    public function paymentVoucherMake($params)
    {
        return $this->postRequest('payment/voucher/make', $params, true, false);
    }

    /**
     * Returns a voucher amount from a code
     *
     * @param array $params
     * @return float
     */
    public function paymentVoucherAmount($params)
    {
        return $this->postRequest('/payment/voucher/amount', $params, true, false);
    }

    /**
     * Redeem a voucher
     *
     * @param array $params
     * @return array
     */
    public function paymentVoucherRedeem($params)
    {
        return $this->postRequest('/payment/voucher/redeem', $params);
    }

    private function getRequest($api_method, $params, $private = true, $json_decode = true)
    {

        ksort($params);
        $fields = http_build_query($params, '', '&');

        $headers = [];
        if ($private === true) {
            $signature = strtoupper(hash_hmac('sha256', $fields, $this->apiSecret));
            $headers = [
                "Api-Key: $this->apiKey",
                "Sign: $signature"
            ];
        }

        $ch = curl_init($this->apiUrl . $api_method . "?" . $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($statusCode != 200) {
            throw new \Exception("Status code: $statusCode, response: $response");
        }

        if($json_decode === true){
            $res = json_decode($response, true);
        } else {
            $res = $response;
        }

        return $res;
    }

    private function postRequest($api_method, $params, $private = true, $json_decode = true)
    {

        ksort($params);
        $fields = http_build_query($params, '', '&');
        $headers = [];
        
        if ($private === true) {
            $signature = strtoupper(hash_hmac('sha256', $fields, $this->apiSecret));
            $headers = [
                "Api-Key: $this->apiKey",
                "Sign: $signature"
            ];
        }

        $ch = curl_init($this->apiUrl . $api_method);
        curl_setopt($ch, CURLOPT_POST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($statusCode != 200) {
            throw new \Exception("Status code: $statusCode, response: $response");
        }

        if($json_decode === true){
            $res = json_decode($response, true);
        } else {
            $res = $response;
        }

        return $res;
    }

}