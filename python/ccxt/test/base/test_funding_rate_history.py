import os
import sys

root = os.path.dirname(os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__)))))
sys.path.append(root)

# ----------------------------------------------------------------------------

# PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
# https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

# ----------------------------------------------------------------------------
# -*- coding: utf-8 -*-

from ccxt.test.base import test_shared_methods  # noqa E402


def test_funding_rate_history(exchange, skipped_properties, method, entry, symbol):
    format = {
        'info': {},
        'symbol': 'BTC/USDT:USDT',
        'timestamp': 1638230400000,
        'datetime': '2021-11-30T00:00:00.000Z',
        'fundingRate': exchange.parse_number('0.0006'),
    }
    test_shared_methods.assert_structure(exchange, skipped_properties, method, entry, format)
    test_shared_methods.assert_symbol(exchange, skipped_properties, method, entry, 'symbol', symbol)
    test_shared_methods.assert_timestamp_and_datetime(exchange, skipped_properties, method, entry)
    test_shared_methods.assert_greater(exchange, skipped_properties, method, entry, 'fundingRate', '-100')
    test_shared_methods.assert_less(exchange, skipped_properties, method, entry, 'fundingRate', '100')
