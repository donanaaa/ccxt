import os
import sys

root = os.path.dirname(os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__)))))
sys.path.append(root)

# ----------------------------------------------------------------------------

# PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
# https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

# ----------------------------------------------------------------------------
# -*- coding: utf-8 -*-

from ccxt.test.base import test_deposit_withdrawal  # noqa E402
from ccxt.test.base import test_shared_methods  # noqa E402


def test_fetch_deposits(exchange, skipped_properties, code):
    method = 'fetchDeposits'
    transactions = exchange.fetch_deposits(code)
    assert isinstance(transactions, list), exchange.id + ' ' + method + ' ' + code + ' must return an array. ' + exchange.json(transactions)
    now = exchange.milliseconds()
    for i in range(0, len(transactions)):
        test_deposit_withdrawal(exchange, skipped_properties, method, transactions[i], code, now)
    test_shared_methods.assert_timestamp_order(exchange, method, code, transactions)
