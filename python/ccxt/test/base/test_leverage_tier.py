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


def test_leverage_tier(exchange, skipped_properties, method, entry):
    format = {
        'tier': exchange.parse_number('1'),
        'minNotional': exchange.parse_number('0'),
        'maxNotional': exchange.parse_number('5000'),
        'maintenanceMarginRate': exchange.parse_number('0.01'),
        'maxLeverage': exchange.parse_number('25'),
        'info': {},
    }
    empty_allowed_for = ['maintenanceMarginRate']
    test_shared_methods.assert_structure(exchange, skipped_properties, method, entry, format, empty_allowed_for)
    #
    test_shared_methods.assert_greater_or_equal(exchange, skipped_properties, method, entry, 'tier', '0')
    test_shared_methods.assert_greater_or_equal(exchange, skipped_properties, method, entry, 'minNotional', '0')
    test_shared_methods.assert_greater_or_equal(exchange, skipped_properties, method, entry, 'maxNotional', '0')
    test_shared_methods.assert_greater_or_equal(exchange, skipped_properties, method, entry, 'maxLeverage', '1')
    test_shared_methods.assert_less_or_equal(exchange, skipped_properties, method, entry, 'maintenanceMarginRate', '1')
