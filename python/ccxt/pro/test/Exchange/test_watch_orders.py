import os
import sys

root = os.path.dirname(os.path.dirname(os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))))
sys.path.append(root)

# ----------------------------------------------------------------------------

# PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
# https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

# ----------------------------------------------------------------------------
# -*- coding: utf-8 -*-

from ccxt.test.base import test_order  # noqa E402
from ccxt.test.base import test_shared_methods  # noqa E402


async def test_watch_orders(exchange, skipped_properties, symbol):
    method = 'watchOrders'
    now = exchange.milliseconds()
    ends = now + 15000
    while now < ends:
        response = None
        try:
            response = await exchange.watch_orders(symbol)
        except Exception as e:
            if not test_shared_methods.is_temporary_failure(e):
                raise e
            now = exchange.milliseconds()
            continue
        assert isinstance(response, list), exchange.id + ' ' + method + ' ' + symbol + ' must return an array. ' + exchange.json(response)
        now = exchange.milliseconds()
        for i in range(0, len(response)):
            test_order(exchange, skipped_properties, method, response[i], symbol, now)
        test_shared_methods.assert_timestamp_order(exchange, method, symbol, response)
