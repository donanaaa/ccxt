<?php

namespace ccxt\async;

// PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
// https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

use Exception; // a common import
use \ccxt\ExchangeError;
use \ccxt\Precise;

class bitbank extends Exchange {

    public function describe() {
        return $this->deep_extend(parent::describe (), array(
            'id' => 'bitbank',
            'name' => 'bitbank',
            'countries' => array( 'JP' ),
            'version' => 'v1',
            'has' => array(
                'cancelOrder' => true,
                'createOrder' => true,
                'fetchBalance' => true,
                'fetchDepositAddress' => true,
                'fetchMyTrades' => true,
                'fetchOHLCV' => true,
                'fetchOpenOrders' => true,
                'fetchOrder' => true,
                'fetchOrderBook' => true,
                'fetchTicker' => true,
                'fetchTrades' => true,
                'withdraw' => true,
            ),
            'timeframes' => array(
                '1m' => '1min',
                '5m' => '5min',
                '15m' => '15min',
                '30m' => '30min',
                '1h' => '1hour',
                '4h' => '4hour',
                '8h' => '8hour',
                '12h' => '12hour',
                '1d' => '1day',
                '1w' => '1week',
            ),
            'hostname' => 'bitbank.cc',
            'urls' => array(
                'logo' => 'https://user-images.githubusercontent.com/1294454/37808081-b87f2d9c-2e59-11e8-894d-c1900b7584fe.jpg',
                'api' => array(
                    'public' => 'https://public.{hostname}',
                    'private' => 'https://api.{hostname}',
                    'markets' => 'https://api.{hostname}',
                ),
                'www' => 'https://bitbank.cc/',
                'doc' => 'https://docs.bitbank.cc/',
                'fees' => 'https://bitbank.cc/docs/fees/',
            ),
            'api' => array(
                'public' => array(
                    'get' => array(
                        '{pair}/ticker',
                        '{pair}/depth',
                        '{pair}/transactions',
                        '{pair}/transactions/{yyyymmdd}',
                        '{pair}/candlestick/{candletype}/{yyyymmdd}',
                    ),
                ),
                'private' => array(
                    'get' => array(
                        'user/assets',
                        'user/spot/order',
                        'user/spot/active_orders',
                        'user/spot/trade_history',
                        'user/withdrawal_account',
                    ),
                    'post' => array(
                        'user/spot/order',
                        'user/spot/cancel_order',
                        'user/spot/cancel_orders',
                        'user/spot/orders_info',
                        'user/request_withdrawal',
                    ),
                ),
                'markets' => array(
                    'get' => array(
                        'spot/pairs',
                    ),
                ),
            ),
            'exceptions' => array(
                '20001' => '\\ccxt\\AuthenticationError',
                '20002' => '\\ccxt\\AuthenticationError',
                '20003' => '\\ccxt\\AuthenticationError',
                '20005' => '\\ccxt\\AuthenticationError',
                '20004' => '\\ccxt\\InvalidNonce',
                '40020' => '\\ccxt\\InvalidOrder',
                '40021' => '\\ccxt\\InvalidOrder',
                '40025' => '\\ccxt\\ExchangeError',
                '40013' => '\\ccxt\\OrderNotFound',
                '40014' => '\\ccxt\\OrderNotFound',
                '50008' => '\\ccxt\\PermissionDenied',
                '50009' => '\\ccxt\\OrderNotFound',
                '50010' => '\\ccxt\\OrderNotFound',
                '60001' => '\\ccxt\\InsufficientFunds',
                '60005' => '\\ccxt\\InvalidOrder',
            ),
        ));
    }

    public function fetch_markets($params = array ()) {
        $response = yield $this->marketsGetSpotPairs ($params);
        //
        //     {
        //       "success" => 1,
        //       "$data" => {
        //         "$pairs" => array(
        //           {
        //             "name" => "btc_jpy",
        //             "base_asset" => "btc",
        //             "quote_asset" => "jpy",
        //             "maker_fee_rate_base" => "0",
        //             "taker_fee_rate_base" => "0",
        //             "maker_fee_rate_quote" => "-0.0002",
        //             "taker_fee_rate_quote" => "0.0012",
        //             "unit_amount" => "0.0001",
        //             "limit_max_amount" => "1000",
        //             "market_max_amount" => "10",
        //             "market_allowance_rate" => "0.2",
        //             "price_digits" => 0,
        //             "amount_digits" => 4,
        //             "is_enabled" => true,
        //             "stop_order" => false,
        //             "stop_order_and_cancel" => false
        //           }
        //         )
        //       }
        //     }
        //
        $data = $this->safe_value($response, 'data');
        $pairs = $this->safe_value($data, 'pairs', array());
        $result = array();
        for ($i = 0; $i < count($pairs); $i++) {
            $entry = $pairs[$i];
            $id = $this->safe_string($entry, 'name');
            $baseId = $this->safe_string($entry, 'base_asset');
            $quoteId = $this->safe_string($entry, 'quote_asset');
            $base = $this->safe_currency_code($baseId);
            $quote = $this->safe_currency_code($quoteId);
            $symbol = $base . '/' . $quote;
            $maker = $this->safe_number($entry, 'maker_fee_rate_quote');
            $taker = $this->safe_number($entry, 'taker_fee_rate_quote');
            $pricePrecisionString = $this->safe_string($entry, 'price_digits');
            $priceLimit = $this->parse_precision($pricePrecisionString);
            $precision = array(
                'price' => intval($pricePrecisionString),
                'amount' => $this->safe_integer($entry, 'amount_digits'),
            );
            $active = $this->safe_value($entry, 'is_enabled');
            $minAmountString = $this->safe_string($entry, 'unit_amount');
            $minCost = Precise::string_mul($minAmountString, $priceLimit);
            $limits = array(
                'amount' => array(
                    'min' => $this->safe_number($entry, 'unit_amount'),
                    'max' => $this->safe_number($entry, 'limit_max_amount'),
                ),
                'price' => array(
                    'min' => $this->parse_number($priceLimit),
                    'max' => null,
                ),
                'cost' => array(
                    'min' => $this->parse_number($minCost),
                    'max' => null,
                ),
            );
            $result[] = array(
                'info' => $entry,
                'id' => $id,
                'symbol' => $symbol,
                'baseId' => $baseId,
                'quoteId' => $quoteId,
                'base' => $base,
                'quote' => $quote,
                'precision' => $precision,
                'limits' => $limits,
                'active' => $active,
                'maker' => $maker,
                'taker' => $taker,
            );
        }
        return $result;
    }

    public function parse_ticker($ticker, $market = null) {
        $symbol = null;
        if ($market !== null) {
            $symbol = $market['symbol'];
        }
        $timestamp = $this->safe_integer($ticker, 'timestamp');
        $last = $this->safe_number($ticker, 'last');
        return array(
            'symbol' => $symbol,
            'timestamp' => $timestamp,
            'datetime' => $this->iso8601($timestamp),
            'high' => $this->safe_number($ticker, 'high'),
            'low' => $this->safe_number($ticker, 'low'),
            'bid' => $this->safe_number($ticker, 'buy'),
            'bidVolume' => null,
            'ask' => $this->safe_number($ticker, 'sell'),
            'askVolume' => null,
            'vwap' => null,
            'open' => null,
            'close' => $last,
            'last' => $last,
            'previousClose' => null,
            'change' => null,
            'percentage' => null,
            'average' => null,
            'baseVolume' => $this->safe_number($ticker, 'vol'),
            'quoteVolume' => null,
            'info' => $ticker,
        );
    }

    public function fetch_ticker($symbol, $params = array ()) {
        yield $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'pair' => $market['id'],
        );
        $response = yield $this->publicGetPairTicker (array_merge($request, $params));
        $data = $this->safe_value($response, 'data', array());
        return $this->parse_ticker($data, $market);
    }

    public function fetch_order_book($symbol, $limit = null, $params = array ()) {
        yield $this->load_markets();
        $request = array(
            'pair' => $this->market_id($symbol),
        );
        $response = yield $this->publicGetPairDepth (array_merge($request, $params));
        $orderbook = $this->safe_value($response, 'data', array());
        $timestamp = $this->safe_integer($orderbook, 'timestamp');
        return $this->parse_order_book($orderbook, $symbol, $timestamp);
    }

    public function parse_trade($trade, $market = null) {
        $timestamp = $this->safe_integer($trade, 'executed_at');
        $symbol = null;
        $feeCurrency = null;
        if ($market !== null) {
            $symbol = $market['symbol'];
            $feeCurrency = $market['quote'];
        }
        $priceString = $this->safe_string($trade, 'price');
        $amountString = $this->safe_string($trade, 'amount');
        $price = $this->parse_number($priceString);
        $amount = $this->parse_number($amountString);
        $cost = $this->parse_number(Precise::string_mul($priceString, $amountString));
        $id = $this->safe_string_2($trade, 'transaction_id', 'trade_id');
        $takerOrMaker = $this->safe_string($trade, 'maker_taker');
        $fee = null;
        $feeCost = $this->safe_number($trade, 'fee_amount_quote');
        if ($feeCost !== null) {
            $fee = array(
                'currency' => $feeCurrency,
                'cost' => $feeCost,
            );
        }
        $orderId = $this->safe_string($trade, 'order_id');
        $type = $this->safe_string($trade, 'type');
        $side = $this->safe_string($trade, 'side');
        return array(
            'timestamp' => $timestamp,
            'datetime' => $this->iso8601($timestamp),
            'symbol' => $symbol,
            'id' => $id,
            'order' => $orderId,
            'type' => $type,
            'side' => $side,
            'takerOrMaker' => $takerOrMaker,
            'price' => $price,
            'amount' => $amount,
            'cost' => $cost,
            'fee' => $fee,
            'info' => $trade,
        );
    }

    public function fetch_trades($symbol, $since = null, $limit = null, $params = array ()) {
        yield $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'pair' => $market['id'],
        );
        $response = yield $this->publicGetPairTransactions (array_merge($request, $params));
        $data = $this->safe_value($response, 'data', array());
        $trades = $this->safe_value($data, 'transactions', array());
        return $this->parse_trades($trades, $market, $since, $limit);
    }

    public function parse_ohlcv($ohlcv, $market = null) {
        //
        //     array(
        //         "0.02501786",
        //         "0.02501786",
        //         "0.02501786",
        //         "0.02501786",
        //         "0.0000",
        //         1591488000000
        //     )
        //
        return array(
            $this->safe_integer($ohlcv, 5),
            $this->safe_number($ohlcv, 0),
            $this->safe_number($ohlcv, 1),
            $this->safe_number($ohlcv, 2),
            $this->safe_number($ohlcv, 3),
            $this->safe_number($ohlcv, 4),
        );
    }

    public function fetch_ohlcv($symbol, $timeframe = '5m', $since = null, $limit = null, $params = array ()) {
        yield $this->load_markets();
        $market = $this->market($symbol);
        $date = $this->milliseconds();
        $date = $this->ymd($date);
        $date = explode('-', $date);
        $request = array(
            'pair' => $market['id'],
            'candletype' => $this->timeframes[$timeframe],
            'yyyymmdd' => implode('', $date),
        );
        $response = yield $this->publicGetPairCandlestickCandletypeYyyymmdd (array_merge($request, $params));
        //
        //     {
        //         "success":1,
        //         "$data":{
        //             "$candlestick":[
        //                 {
        //                     "type":"5min",
        //                     "$ohlcv":[
        //                         ["0.02501786","0.02501786","0.02501786","0.02501786","0.0000",1591488000000],
        //                         ["0.02501747","0.02501953","0.02501747","0.02501953","0.3017",1591488300000],
        //                         ["0.02501762","0.02501762","0.02500392","0.02500392","0.1500",1591488600000],
        //                     ]
        //                 }
        //             ],
        //             "timestamp":1591508668190
        //         }
        //     }
        //
        $data = $this->safe_value($response, 'data', array());
        $candlestick = $this->safe_value($data, 'candlestick', array());
        $first = $this->safe_value($candlestick, 0, array());
        $ohlcv = $this->safe_value($first, 'ohlcv', array());
        return $this->parse_ohlcvs($ohlcv, $market, $timeframe, $since, $limit);
    }

    public function fetch_balance($params = array ()) {
        yield $this->load_markets();
        $response = yield $this->privateGetUserAssets ($params);
        //
        //     {
        //       "success" => "1",
        //       "$data" => {
        //         "$assets" => array(
        //           {
        //             "asset" => "jpy",
        //             "amount_precision" => "4",
        //             "onhand_amount" => "0.0000",
        //             "locked_amount" => "0.0000",
        //             "free_amount" => "0.0000",
        //             "stop_deposit" => false,
        //             "stop_withdrawal" => false,
        //             "withdrawal_fee" => array(
        //               "threshold" => "30000.0000",
        //               "under" => "550.0000",
        //               "over" => "770.0000"
        //             }
        //           ),
        //           array(
        //             "asset" => "btc",
        //             "amount_precision" => "8",
        //             "onhand_amount" => "0.00000000",
        //             "locked_amount" => "0.00000000",
        //             "free_amount" => "0.00000000",
        //             "stop_deposit" => false,
        //             "stop_withdrawal" => false,
        //             "withdrawal_fee" => "0.00060000"
        //           ),
        //         )
        //       }
        //     }
        //
        $result = array(
            'info' => $response,
            'timestamp' => null,
            'datetime' => null,
        );
        $data = $this->safe_value($response, 'data', array());
        $assets = $this->safe_value($data, 'assets', array());
        for ($i = 0; $i < count($assets); $i++) {
            $balance = $assets[$i];
            $currencyId = $this->safe_string($balance, 'asset');
            $code = $this->safe_currency_code($currencyId);
            $account = $this->account();
            $account['free'] = $this->safe_string($balance, 'free_amount');
            $account['used'] = $this->safe_string($balance, 'locked_amount');
            $account['total'] = $this->safe_string($balance, 'onhand_amount');
            $result[$code] = $account;
        }
        return $this->parse_balance($result);
    }

    public function parse_order_status($status) {
        $statuses = array(
            'UNFILLED' => 'open',
            'PARTIALLY_FILLED' => 'open',
            'FULLY_FILLED' => 'closed',
            'CANCELED_UNFILLED' => 'canceled',
            'CANCELED_PARTIALLY_FILLED' => 'canceled',
        );
        return $this->safe_string($statuses, $status, $status);
    }

    public function parse_order($order, $market = null) {
        $id = $this->safe_string($order, 'order_id');
        $marketId = $this->safe_string($order, 'pair');
        $symbol = null;
        if ($marketId && !$market && (is_array($this->markets_by_id) && array_key_exists($marketId, $this->markets_by_id))) {
            $market = $this->markets_by_id[$marketId];
        }
        if ($market !== null) {
            $symbol = $market['symbol'];
        }
        $timestamp = $this->safe_integer($order, 'ordered_at');
        $price = $this->safe_number($order, 'price');
        $amount = $this->safe_number($order, 'start_amount');
        $filled = $this->safe_number($order, 'executed_amount');
        $remaining = $this->safe_number($order, 'remaining_amount');
        $average = $this->safe_number($order, 'average_price');
        $status = $this->parse_order_status($this->safe_string($order, 'status'));
        $type = $this->safe_string_lower($order, 'type');
        $side = $this->safe_string_lower($order, 'side');
        return $this->safe_order(array(
            'id' => $id,
            'clientOrderId' => null,
            'datetime' => $this->iso8601($timestamp),
            'timestamp' => $timestamp,
            'lastTradeTimestamp' => null,
            'status' => $status,
            'symbol' => $symbol,
            'type' => $type,
            'timeInForce' => null,
            'postOnly' => null,
            'side' => $side,
            'price' => $price,
            'stopPrice' => null,
            'cost' => null,
            'average' => $average,
            'amount' => $amount,
            'filled' => $filled,
            'remaining' => $remaining,
            'trades' => null,
            'fee' => null,
            'info' => $order,
        ));
    }

    public function create_order($symbol, $type, $side, $amount, $price = null, $params = array ()) {
        yield $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'pair' => $market['id'],
            'amount' => $this->amount_to_precision($symbol, $amount),
            'side' => $side,
            'type' => $type,
        );
        if ($type === 'limit') {
            $request['price'] = $this->price_to_precision($symbol, $price);
        }
        $response = yield $this->privatePostUserSpotOrder (array_merge($request, $params));
        $data = $this->safe_value($response, 'data');
        return $this->parse_order($data, $market);
    }

    public function cancel_order($id, $symbol = null, $params = array ()) {
        yield $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'order_id' => $id,
            'pair' => $market['id'],
        );
        $response = yield $this->privatePostUserSpotCancelOrder (array_merge($request, $params));
        $data = $this->safe_value($response, 'data');
        return $data;
    }

    public function fetch_order($id, $symbol = null, $params = array ()) {
        yield $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'order_id' => $id,
            'pair' => $market['id'],
        );
        $response = yield $this->privateGetUserSpotOrder (array_merge($request, $params));
        $data = $this->safe_value($response, 'data');
        return $this->parse_order($data, $market);
    }

    public function fetch_open_orders($symbol = null, $since = null, $limit = null, $params = array ()) {
        yield $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'pair' => $market['id'],
        );
        if ($limit !== null) {
            $request['count'] = $limit;
        }
        if ($since !== null) {
            $request['since'] = intval($since / 1000);
        }
        $response = yield $this->privateGetUserSpotActiveOrders (array_merge($request, $params));
        $data = $this->safe_value($response, 'data', array());
        $orders = $this->safe_value($data, 'orders', array());
        return $this->parse_orders($orders, $market, $since, $limit);
    }

    public function fetch_my_trades($symbol = null, $since = null, $limit = null, $params = array ()) {
        yield $this->load_markets();
        $market = null;
        if ($symbol !== null) {
            $market = $this->market($symbol);
        }
        $request = array();
        if ($market !== null) {
            $request['pair'] = $market['id'];
        }
        if ($limit !== null) {
            $request['count'] = $limit;
        }
        if ($since !== null) {
            $request['since'] = intval($since / 1000);
        }
        $response = yield $this->privateGetUserSpotTradeHistory (array_merge($request, $params));
        $data = $this->safe_value($response, 'data', array());
        $trades = $this->safe_value($data, 'trades', array());
        return $this->parse_trades($trades, $market, $since, $limit);
    }

    public function fetch_deposit_address($code, $params = array ()) {
        yield $this->load_markets();
        $currency = $this->currency($code);
        $request = array(
            'asset' => $currency['id'],
        );
        $response = yield $this->privateGetUserWithdrawalAccount (array_merge($request, $params));
        $data = $this->safe_value($response, 'data', array());
        // Not sure about this if there could be more than one account...
        $accounts = $this->safe_value($data, 'accounts', array());
        $firstAccount = $this->safe_value($accounts, 0, array());
        $address = $this->safe_string($firstAccount, 'address');
        return array(
            'currency' => $currency,
            'address' => $address,
            'tag' => null,
            'info' => $response,
        );
    }

    public function withdraw($code, $amount, $address, $tag = null, $params = array ()) {
        if (!(is_array($params) && array_key_exists('uuid', $params))) {
            throw new ExchangeError($this->id . ' uuid is required for withdrawal');
        }
        yield $this->load_markets();
        $currency = $this->currency($code);
        $request = array(
            'asset' => $currency['id'],
            'amount' => $amount,
        );
        $response = yield $this->privatePostUserRequestWithdrawal (array_merge($request, $params));
        $data = $this->safe_value($response, 'data', array());
        $txid = $this->safe_string($data, 'txid');
        return array(
            'info' => $response,
            'id' => $txid,
        );
    }

    public function nonce() {
        return $this->milliseconds();
    }

    public function sign($path, $api = 'public', $method = 'GET', $params = array (), $headers = null, $body = null) {
        $query = $this->omit($params, $this->extract_params($path));
        $url = $this->implode_hostname($this->urls['api'][$api]) . '/';
        if (($api === 'public') || ($api === 'markets')) {
            $url .= $this->implode_params($path, $params);
            if ($query) {
                $url .= '?' . $this->urlencode($query);
            }
        } else {
            $this->check_required_credentials();
            $nonce = (string) $this->nonce();
            $auth = $nonce;
            $url .= $this->version . '/' . $this->implode_params($path, $params);
            if ($method === 'POST') {
                $body = $this->json($query);
                $auth .= $body;
            } else {
                $auth .= '/' . $this->version . '/' . $path;
                if ($query) {
                    $query = $this->urlencode($query);
                    $url .= '?' . $query;
                    $auth .= '?' . $query;
                }
            }
            $headers = array(
                'Content-Type' => 'application/json',
                'ACCESS-KEY' => $this->apiKey,
                'ACCESS-NONCE' => $nonce,
                'ACCESS-SIGNATURE' => $this->hmac($this->encode($auth), $this->encode($this->secret)),
            );
        }
        return array( 'url' => $url, 'method' => $method, 'body' => $body, 'headers' => $headers );
    }

    public function request($path, $api = 'public', $method = 'GET', $params = array (), $headers = null, $body = null, $config = array (), $context = array ()) {
        $response = yield $this->fetch2($path, $api, $method, $params, $headers, $body, $config, $context);
        $success = $this->safe_integer($response, 'success');
        $data = $this->safe_value($response, 'data');
        if (!$success || !$data) {
            $errorMessages = array(
                '10000' => 'URL does not exist',
                '10001' => 'A system error occurred. Please contact support',
                '10002' => 'Invalid JSON format. Please check the contents of transmission',
                '10003' => 'A system error occurred. Please contact support',
                '10005' => 'A timeout error occurred. Please wait for a while and try again',
                '20001' => 'API authentication failed',
                '20002' => 'Illegal API key',
                '20003' => 'API key does not exist',
                '20004' => 'API Nonce does not exist',
                '20005' => 'API signature does not exist',
                '20011' => 'Two-step verification failed',
                '20014' => 'SMS authentication failed',
                '30001' => 'Please specify the order quantity',
                '30006' => 'Please specify the order ID',
                '30007' => 'Please specify the order ID array',
                '30009' => 'Please specify the stock',
                '30012' => 'Please specify the order price',
                '30013' => 'Trade Please specify either',
                '30015' => 'Please specify the order type',
                '30016' => 'Please specify asset name',
                '30019' => 'Please specify uuid',
                '30039' => 'Please specify the amount to be withdrawn',
                '40001' => 'The order quantity is invalid',
                '40006' => 'Count value is invalid',
                '40007' => 'End time is invalid',
                '40008' => 'end_id Value is invalid',
                '40009' => 'The from_id value is invalid',
                '40013' => 'The order ID is invalid',
                '40014' => 'The order ID array is invalid',
                '40015' => 'Too many specified orders',
                '40017' => 'Incorrect issue name',
                '40020' => 'The order price is invalid',
                '40021' => 'The trading classification is invalid',
                '40022' => 'Start date is invalid',
                '40024' => 'The order type is invalid',
                '40025' => 'Incorrect asset name',
                '40028' => 'uuid is invalid',
                '40048' => 'The amount of withdrawal is illegal',
                '50003' => 'Currently, this account is in a state where you can not perform the operation you specified. Please contact support',
                '50004' => 'Currently, this account is temporarily registered. Please try again after registering your account',
                '50005' => 'Currently, this account is locked. Please contact support',
                '50006' => 'Currently, this account is locked. Please contact support',
                '50008' => 'User identification has not been completed',
                '50009' => 'Your order does not exist',
                '50010' => 'Can not cancel specified order',
                '50011' => 'API not found',
                '60001' => 'The number of possessions is insufficient',
                '60002' => 'It exceeds the quantity upper limit of the tender buying order',
                '60003' => 'The specified quantity exceeds the limit',
                '60004' => 'The specified quantity is below the threshold',
                '60005' => 'The specified price is above the limit',
                '60006' => 'The specified price is below the lower limit',
                '70001' => 'A system error occurred. Please contact support',
                '70002' => 'A system error occurred. Please contact support',
                '70003' => 'A system error occurred. Please contact support',
                '70004' => 'We are unable to accept orders as the transaction is currently suspended',
                '70005' => 'Order can not be accepted because purchase order is currently suspended',
                '70006' => 'We can not accept orders because we are currently unsubscribed ',
                '70009' => 'We are currently temporarily restricting orders to be carried out. Please use the limit order.',
                '70010' => 'We are temporarily raising the minimum order quantity as the system load is now rising.',
            );
            $errorClasses = $this->exceptions;
            $code = $this->safe_string($data, 'code');
            $message = $this->safe_string($errorMessages, $code, 'Error');
            $ErrorClass = $this->safe_value($errorClasses, $code);
            if ($ErrorClass !== null) {
                throw new $ErrorClass($message);
            } else {
                throw new ExchangeError($this->id . ' ' . $this->json($response));
            }
        }
        return $response;
    }
}
