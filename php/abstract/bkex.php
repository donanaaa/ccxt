<?php

namespace ccxt\abstract;

// PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
// https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code


abstract class bkex extends \ccxt\Exchange {
    public function public_spot_get_common_symbols($params = array()) {
        return $this->request('/common/symbols', array('public', 'spot'), 'GET', $params);
    }
    public function public_spot_get_common_currencys($params = array()) {
        return $this->request('/common/currencys', array('public', 'spot'), 'GET', $params);
    }
    public function public_spot_get_common_timestamp($params = array()) {
        return $this->request('/common/timestamp', array('public', 'spot'), 'GET', $params);
    }
    public function public_spot_get_q_kline($params = array()) {
        return $this->request('/q/kline', array('public', 'spot'), 'GET', $params);
    }
    public function public_spot_get_q_tickers($params = array()) {
        return $this->request('/q/tickers', array('public', 'spot'), 'GET', $params);
    }
    public function public_spot_get_q_ticker_price($params = array()) {
        return $this->request('/q/ticker/price', array('public', 'spot'), 'GET', $params);
    }
    public function public_spot_get_q_depth($params = array()) {
        return $this->request('/q/depth', array('public', 'spot'), 'GET', $params);
    }
    public function public_spot_get_q_deals($params = array()) {
        return $this->request('/q/deals', array('public', 'spot'), 'GET', $params);
    }
    public function public_swap_get_market_candle($params = array()) {
        return $this->request('/market/candle', array('public', 'swap'), 'GET', $params);
    }
    public function public_swap_get_market_deals($params = array()) {
        return $this->request('/market/deals', array('public', 'swap'), 'GET', $params);
    }
    public function public_swap_get_market_depth($params = array()) {
        return $this->request('/market/depth', array('public', 'swap'), 'GET', $params);
    }
    public function public_swap_get_market_fundingrate($params = array()) {
        return $this->request('/market/fundingRate', array('public', 'swap'), 'GET', $params);
    }
    public function public_swap_get_market_index($params = array()) {
        return $this->request('/market/index', array('public', 'swap'), 'GET', $params);
    }
    public function public_swap_get_market_risklimit($params = array()) {
        return $this->request('/market/riskLimit', array('public', 'swap'), 'GET', $params);
    }
    public function public_swap_get_market_symbols($params = array()) {
        return $this->request('/market/symbols', array('public', 'swap'), 'GET', $params);
    }
    public function public_swap_get_market_ticker_price($params = array()) {
        return $this->request('/market/ticker/price', array('public', 'swap'), 'GET', $params);
    }
    public function public_swap_get_market_tickers($params = array()) {
        return $this->request('/market/tickers', array('public', 'swap'), 'GET', $params);
    }
    public function public_swap_get_server_ping($params = array()) {
        return $this->request('/server/ping', array('public', 'swap'), 'GET', $params);
    }
    public function private_spot_get_u_api_info($params = array()) {
        return $this->request('/u/api/info', array('private', 'spot'), 'GET', $params);
    }
    public function private_spot_get_u_account_balance($params = array()) {
        return $this->request('/u/account/balance', array('private', 'spot'), 'GET', $params);
    }
    public function private_spot_get_u_wallet_address($params = array()) {
        return $this->request('/u/wallet/address', array('private', 'spot'), 'GET', $params);
    }
    public function private_spot_get_u_wallet_depositrecord($params = array()) {
        return $this->request('/u/wallet/depositRecord', array('private', 'spot'), 'GET', $params);
    }
    public function private_spot_get_u_wallet_withdrawrecord($params = array()) {
        return $this->request('/u/wallet/withdrawRecord', array('private', 'spot'), 'GET', $params);
    }
    public function private_spot_get_u_order_openorders($params = array()) {
        return $this->request('/u/order/openOrders', array('private', 'spot'), 'GET', $params);
    }
    public function private_spot_get_u_order_openorder_detail($params = array()) {
        return $this->request('/u/order/openOrder/detail', array('private', 'spot'), 'GET', $params);
    }
    public function private_spot_get_u_order_historyorders($params = array()) {
        return $this->request('/u/order/historyOrders', array('private', 'spot'), 'GET', $params);
    }
    public function private_spot_post_u_account_transfer($params = array()) {
        return $this->request('/u/account/transfer', array('private', 'spot'), 'POST', $params);
    }
    public function private_spot_post_u_wallet_withdraw($params = array()) {
        return $this->request('/u/wallet/withdraw', array('private', 'spot'), 'POST', $params);
    }
    public function private_spot_post_u_order_create($params = array()) {
        return $this->request('/u/order/create', array('private', 'spot'), 'POST', $params);
    }
    public function private_spot_post_u_order_cancel($params = array()) {
        return $this->request('/u/order/cancel', array('private', 'spot'), 'POST', $params);
    }
    public function private_spot_post_u_order_batchcreate($params = array()) {
        return $this->request('/u/order/batchCreate', array('private', 'spot'), 'POST', $params);
    }
    public function private_spot_post_u_order_batchcancel($params = array()) {
        return $this->request('/u/order/batchCancel', array('private', 'spot'), 'POST', $params);
    }
    public function private_swap_get_account_balance($params = array()) {
        return $this->request('/account/balance', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_get_account_balancerecord($params = array()) {
        return $this->request('/account/balanceRecord', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_get_account_order($params = array()) {
        return $this->request('/account/order', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_get_account_orderforced($params = array()) {
        return $this->request('/account/orderForced', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_get_account_position($params = array()) {
        return $this->request('/account/position', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_get_entrust_finished($params = array()) {
        return $this->request('/entrust/finished', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_get_entrust_unfinish($params = array()) {
        return $this->request('/entrust/unFinish', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_get_order_finished($params = array()) {
        return $this->request('/order/finished', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_get_order_finishedinfo($params = array()) {
        return $this->request('/order/finishedInfo', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_get_order_unfinish($params = array()) {
        return $this->request('/order/unFinish', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_get_position_info($params = array()) {
        return $this->request('/position/info', array('private', 'swap'), 'GET', $params);
    }
    public function private_swap_post_account_setleverage($params = array()) {
        return $this->request('/account/setLeverage', array('private', 'swap'), 'POST', $params);
    }
    public function private_swap_post_entrust_add($params = array()) {
        return $this->request('/entrust/add', array('private', 'swap'), 'POST', $params);
    }
    public function private_swap_post_entrust_cancel($params = array()) {
        return $this->request('/entrust/cancel', array('private', 'swap'), 'POST', $params);
    }
    public function private_swap_post_order_batchcancel($params = array()) {
        return $this->request('/order/batchCancel', array('private', 'swap'), 'POST', $params);
    }
    public function private_swap_post_order_batchopen($params = array()) {
        return $this->request('/order/batchOpen', array('private', 'swap'), 'POST', $params);
    }
    public function private_swap_post_order_cancel($params = array()) {
        return $this->request('/order/cancel', array('private', 'swap'), 'POST', $params);
    }
    public function private_swap_post_order_close($params = array()) {
        return $this->request('/order/close', array('private', 'swap'), 'POST', $params);
    }
    public function private_swap_post_order_closeall($params = array()) {
        return $this->request('/order/closeAll', array('private', 'swap'), 'POST', $params);
    }
    public function private_swap_post_order_open($params = array()) {
        return $this->request('/order/open', array('private', 'swap'), 'POST', $params);
    }
    public function private_swap_post_position_setspsl($params = array()) {
        return $this->request('/position/setSpSl', array('private', 'swap'), 'POST', $params);
    }
    public function private_swap_post_position_update($params = array()) {
        return $this->request('/position/update', array('private', 'swap'), 'POST', $params);
    }
    public function publicSpotGetCommonSymbols($params = array()) {
        return $this->request('/common/symbols', array('public', 'spot'), 'GET', $params);
    }
    public function publicSpotGetCommonCurrencys($params = array()) {
        return $this->request('/common/currencys', array('public', 'spot'), 'GET', $params);
    }
    public function publicSpotGetCommonTimestamp($params = array()) {
        return $this->request('/common/timestamp', array('public', 'spot'), 'GET', $params);
    }
    public function publicSpotGetQKline($params = array()) {
        return $this->request('/q/kline', array('public', 'spot'), 'GET', $params);
    }
    public function publicSpotGetQTickers($params = array()) {
        return $this->request('/q/tickers', array('public', 'spot'), 'GET', $params);
    }
    public function publicSpotGetQTickerPrice($params = array()) {
        return $this->request('/q/ticker/price', array('public', 'spot'), 'GET', $params);
    }
    public function publicSpotGetQDepth($params = array()) {
        return $this->request('/q/depth', array('public', 'spot'), 'GET', $params);
    }
    public function publicSpotGetQDeals($params = array()) {
        return $this->request('/q/deals', array('public', 'spot'), 'GET', $params);
    }
    public function publicSwapGetMarketCandle($params = array()) {
        return $this->request('/market/candle', array('public', 'swap'), 'GET', $params);
    }
    public function publicSwapGetMarketDeals($params = array()) {
        return $this->request('/market/deals', array('public', 'swap'), 'GET', $params);
    }
    public function publicSwapGetMarketDepth($params = array()) {
        return $this->request('/market/depth', array('public', 'swap'), 'GET', $params);
    }
    public function publicSwapGetMarketFundingRate($params = array()) {
        return $this->request('/market/fundingRate', array('public', 'swap'), 'GET', $params);
    }
    public function publicSwapGetMarketIndex($params = array()) {
        return $this->request('/market/index', array('public', 'swap'), 'GET', $params);
    }
    public function publicSwapGetMarketRiskLimit($params = array()) {
        return $this->request('/market/riskLimit', array('public', 'swap'), 'GET', $params);
    }
    public function publicSwapGetMarketSymbols($params = array()) {
        return $this->request('/market/symbols', array('public', 'swap'), 'GET', $params);
    }
    public function publicSwapGetMarketTickerPrice($params = array()) {
        return $this->request('/market/ticker/price', array('public', 'swap'), 'GET', $params);
    }
    public function publicSwapGetMarketTickers($params = array()) {
        return $this->request('/market/tickers', array('public', 'swap'), 'GET', $params);
    }
    public function publicSwapGetServerPing($params = array()) {
        return $this->request('/server/ping', array('public', 'swap'), 'GET', $params);
    }
    public function privateSpotGetUApiInfo($params = array()) {
        return $this->request('/u/api/info', array('private', 'spot'), 'GET', $params);
    }
    public function privateSpotGetUAccountBalance($params = array()) {
        return $this->request('/u/account/balance', array('private', 'spot'), 'GET', $params);
    }
    public function privateSpotGetUWalletAddress($params = array()) {
        return $this->request('/u/wallet/address', array('private', 'spot'), 'GET', $params);
    }
    public function privateSpotGetUWalletDepositRecord($params = array()) {
        return $this->request('/u/wallet/depositRecord', array('private', 'spot'), 'GET', $params);
    }
    public function privateSpotGetUWalletWithdrawRecord($params = array()) {
        return $this->request('/u/wallet/withdrawRecord', array('private', 'spot'), 'GET', $params);
    }
    public function privateSpotGetUOrderOpenOrders($params = array()) {
        return $this->request('/u/order/openOrders', array('private', 'spot'), 'GET', $params);
    }
    public function privateSpotGetUOrderOpenOrderDetail($params = array()) {
        return $this->request('/u/order/openOrder/detail', array('private', 'spot'), 'GET', $params);
    }
    public function privateSpotGetUOrderHistoryOrders($params = array()) {
        return $this->request('/u/order/historyOrders', array('private', 'spot'), 'GET', $params);
    }
    public function privateSpotPostUAccountTransfer($params = array()) {
        return $this->request('/u/account/transfer', array('private', 'spot'), 'POST', $params);
    }
    public function privateSpotPostUWalletWithdraw($params = array()) {
        return $this->request('/u/wallet/withdraw', array('private', 'spot'), 'POST', $params);
    }
    public function privateSpotPostUOrderCreate($params = array()) {
        return $this->request('/u/order/create', array('private', 'spot'), 'POST', $params);
    }
    public function privateSpotPostUOrderCancel($params = array()) {
        return $this->request('/u/order/cancel', array('private', 'spot'), 'POST', $params);
    }
    public function privateSpotPostUOrderBatchCreate($params = array()) {
        return $this->request('/u/order/batchCreate', array('private', 'spot'), 'POST', $params);
    }
    public function privateSpotPostUOrderBatchCancel($params = array()) {
        return $this->request('/u/order/batchCancel', array('private', 'spot'), 'POST', $params);
    }
    public function privateSwapGetAccountBalance($params = array()) {
        return $this->request('/account/balance', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapGetAccountBalanceRecord($params = array()) {
        return $this->request('/account/balanceRecord', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapGetAccountOrder($params = array()) {
        return $this->request('/account/order', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapGetAccountOrderForced($params = array()) {
        return $this->request('/account/orderForced', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapGetAccountPosition($params = array()) {
        return $this->request('/account/position', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapGetEntrustFinished($params = array()) {
        return $this->request('/entrust/finished', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapGetEntrustUnFinish($params = array()) {
        return $this->request('/entrust/unFinish', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapGetOrderFinished($params = array()) {
        return $this->request('/order/finished', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapGetOrderFinishedInfo($params = array()) {
        return $this->request('/order/finishedInfo', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapGetOrderUnFinish($params = array()) {
        return $this->request('/order/unFinish', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapGetPositionInfo($params = array()) {
        return $this->request('/position/info', array('private', 'swap'), 'GET', $params);
    }
    public function privateSwapPostAccountSetLeverage($params = array()) {
        return $this->request('/account/setLeverage', array('private', 'swap'), 'POST', $params);
    }
    public function privateSwapPostEntrustAdd($params = array()) {
        return $this->request('/entrust/add', array('private', 'swap'), 'POST', $params);
    }
    public function privateSwapPostEntrustCancel($params = array()) {
        return $this->request('/entrust/cancel', array('private', 'swap'), 'POST', $params);
    }
    public function privateSwapPostOrderBatchCancel($params = array()) {
        return $this->request('/order/batchCancel', array('private', 'swap'), 'POST', $params);
    }
    public function privateSwapPostOrderBatchOpen($params = array()) {
        return $this->request('/order/batchOpen', array('private', 'swap'), 'POST', $params);
    }
    public function privateSwapPostOrderCancel($params = array()) {
        return $this->request('/order/cancel', array('private', 'swap'), 'POST', $params);
    }
    public function privateSwapPostOrderClose($params = array()) {
        return $this->request('/order/close', array('private', 'swap'), 'POST', $params);
    }
    public function privateSwapPostOrderCloseAll($params = array()) {
        return $this->request('/order/closeAll', array('private', 'swap'), 'POST', $params);
    }
    public function privateSwapPostOrderOpen($params = array()) {
        return $this->request('/order/open', array('private', 'swap'), 'POST', $params);
    }
    public function privateSwapPostPositionSetSpSl($params = array()) {
        return $this->request('/position/setSpSl', array('private', 'swap'), 'POST', $params);
    }
    public function privateSwapPostPositionUpdate($params = array()) {
        return $this->request('/position/update', array('private', 'swap'), 'POST', $params);
    }
}