<?php
namespace ccxt;
use \ccxt\Precise;

// ----------------------------------------------------------------------------

// PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
// https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

// -----------------------------------------------------------------------------
include_once __DIR__ . '/../base/test_market.php';

function test_fetch_markets($exchange) {
    $method = 'fetchMarkets';
    $markets = $exchange->fetch_markets();
    assert(is_array($markets), $exchange->id . ' ' . $method . ' must return an object. ' . $exchange->json($markets));
    $market_values = is_array($markets) ? array_values($markets) : array();
    for ($i = 0; $i < count($market_values); $i++) {
        test_market($exchange, $method, $market_values[$i]);
    }
}
