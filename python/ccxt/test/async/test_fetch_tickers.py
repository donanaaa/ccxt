import os
import sys

root = os.path.dirname(os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__)))))
sys.path.append(root)

# ----------------------------------------------------------------------------

# PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
# https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

# ----------------------------------------------------------------------------
# -*- coding: utf-8 -*-

import asyncio
from ccxt.test.base import test_ticker  # noqa E402


async def test_fetch_tickers(exchange, skipped_properties, symbol):
    without_symbol = test_fetch_tickers_helper(exchange, skipped_properties, None)
    with_symbol = test_fetch_tickers_helper(exchange, skipped_properties, [symbol])
    await asyncio.gather(*[with_symbol, without_symbol])


async def test_fetch_tickers_helper(exchange, skipped_properties, arg_symbols, arg_params={}):
    method = 'fetchTickers'
    response = await exchange.fetch_tickers(arg_symbols, arg_params)
    assert isinstance(response, dict), exchange.id + ' ' + method + ' ' + exchange.json(arg_symbols) + ' must return an object. ' + exchange.json(response)
    values = list(response.values())
    checked_symbol = None
    if arg_symbols is not None and len(arg_symbols) == 1:
        checked_symbol = arg_symbols[0]
    for i in range(0, len(values)):
        # todo: symbol check here
        ticker = values[i]
        test_ticker(exchange, skipped_properties, method, ticker, checked_symbol)
