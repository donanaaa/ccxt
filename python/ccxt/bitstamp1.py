# -*- coding: utf-8 -*-

# PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
# https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

from ccxt.base.exchange import Exchange
import hashlib
from ccxt.base.errors import ExchangeError
from ccxt.base.errors import BadSymbol
from ccxt.base.decimal_to_precision import TICK_SIZE
from ccxt.base.precise import Precise


class bitstamp1(Exchange):

    def describe(self):
        return self.deep_extend(super(bitstamp1, self).describe(), {
            'id': 'bitstamp1',
            'name': 'Bitstamp',
            'countries': ['GB'],
            'rateLimit': 1000,
            'version': 'v1',
            'has': {
                'CORS': True,
                'spot': True,
                'margin': False,
                'swap': False,
                'future': False,
                'option': False,
                'addMargin': False,
                'cancelOrder': True,
                'createOrder': True,
                'createReduceOnlyOrder': False,
                'createStopLimitOrder': False,
                'createStopMarketOrder': False,
                'createStopOrder': False,
                'fetchBalance': True,
                'fetchBorrowRate': False,
                'fetchBorrowRateHistories': False,
                'fetchBorrowRateHistory': False,
                'fetchBorrowRates': False,
                'fetchBorrowRatesPerSymbol': False,
                'fetchFundingHistory': False,
                'fetchFundingRate': False,
                'fetchFundingRateHistory': False,
                'fetchFundingRates': False,
                'fetchIndexOHLCV': False,
                'fetchLeverage': False,
                'fetchMarginMode': False,
                'fetchMarkOHLCV': False,
                'fetchMyTrades': True,
                'fetchOpenInterestHistory': False,
                'fetchOrder': False,
                'fetchOrderBook': True,
                'fetchPosition': False,
                'fetchPositionMode': False,
                'fetchPositions': False,
                'fetchPositionsRisk': False,
                'fetchPremiumIndexOHLCV': False,
                'fetchTicker': True,
                'fetchTrades': True,
                'reduceMargin': False,
                'setLeverage': False,
                'setMarginMode': False,
                'setPositionMode': False,
            },
            'urls': {
                'logo': 'https://user-images.githubusercontent.com/1294454/27786377-8c8ab57e-5fe9-11e7-8ea4-2b05b6bcceec.jpg',
                'api': {
                    'rest': 'https://www.bitstamp.net/api',
                },
                'www': 'https://www.bitstamp.net',
                'doc': 'https://www.bitstamp.net/api',
            },
            'requiredCredentials': {
                'apiKey': True,
                'secret': True,
                'uid': True,
            },
            'api': {
                'public': {
                    'get': [
                        'ticker',
                        'ticker_hour',
                        'order_book',
                        'transactions',
                        'eur_usd',
                    ],
                },
                'private': {
                    'post': [
                        'balance',
                        'user_transactions',
                        'open_orders',
                        'order_status',
                        'cancel_order',
                        'cancel_all_orders',
                        'buy',
                        'sell',
                        'bitcoin_deposit_address',
                        'unconfirmed_btc',
                        'ripple_withdrawal',
                        'ripple_address',
                        'withdrawal_requests',
                        'bitcoin_withdrawal',
                    ],
                },
            },
            'precisionMode': TICK_SIZE,
            'markets': {
                'BTC/USD': {'id': 'btcusd', 'symbol': 'BTC/USD', 'base': 'BTC', 'quote': 'USD', 'baseId': 'btc', 'quoteId': 'usd', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'BTC/EUR': {'id': 'btceur', 'symbol': 'BTC/EUR', 'base': 'BTC', 'quote': 'EUR', 'baseId': 'btc', 'quoteId': 'eur', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'EUR/USD': {'id': 'eurusd', 'symbol': 'EUR/USD', 'base': 'EUR', 'quote': 'USD', 'baseId': 'eur', 'quoteId': 'usd', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'XRP/USD': {'id': 'xrpusd', 'symbol': 'XRP/USD', 'base': 'XRP', 'quote': 'USD', 'baseId': 'xrp', 'quoteId': 'usd', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'XRP/EUR': {'id': 'xrpeur', 'symbol': 'XRP/EUR', 'base': 'XRP', 'quote': 'EUR', 'baseId': 'xrp', 'quoteId': 'eur', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'XRP/BTC': {'id': 'xrpbtc', 'symbol': 'XRP/BTC', 'base': 'XRP', 'quote': 'BTC', 'baseId': 'xrp', 'quoteId': 'btc', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'LTC/USD': {'id': 'ltcusd', 'symbol': 'LTC/USD', 'base': 'LTC', 'quote': 'USD', 'baseId': 'ltc', 'quoteId': 'usd', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'LTC/EUR': {'id': 'ltceur', 'symbol': 'LTC/EUR', 'base': 'LTC', 'quote': 'EUR', 'baseId': 'ltc', 'quoteId': 'eur', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'LTC/BTC': {'id': 'ltcbtc', 'symbol': 'LTC/BTC', 'base': 'LTC', 'quote': 'BTC', 'baseId': 'ltc', 'quoteId': 'btc', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'ETH/USD': {'id': 'ethusd', 'symbol': 'ETH/USD', 'base': 'ETH', 'quote': 'USD', 'baseId': 'eth', 'quoteId': 'usd', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'ETH/EUR': {'id': 'etheur', 'symbol': 'ETH/EUR', 'base': 'ETH', 'quote': 'EUR', 'baseId': 'eth', 'quoteId': 'eur', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
                'ETH/BTC': {'id': 'ethbtc', 'symbol': 'ETH/BTC', 'base': 'ETH', 'quote': 'BTC', 'baseId': 'eth', 'quoteId': 'btc', 'maker': 0.005, 'taker': 0.005, 'type': 'spot', 'spot': True},
            },
        })

    def fetch_order_book(self, symbol, limit=None, params={}):
        """
        fetches information on open orders with bid(buy) and ask(sell) prices, volumes and other data
        :param str symbol: unified symbol of the market to fetch the order book for
        :param int|None limit: the maximum amount of order book entries to return
        :param dict params: extra parameters specific to the bitstamp1 api endpoint
        :returns dict: A dictionary of `order book structures <https://docs.ccxt.com/#/?id=order-book-structure>` indexed by market symbols
        """
        if symbol != 'BTC/USD':
            raise ExchangeError(self.id + ' ' + self.version + " fetchOrderBook doesn't support " + symbol + ', use it for BTC/USD only')
        self.load_markets()
        orderbook = self.publicGetOrderBook(params)
        timestamp = self.safe_timestamp(orderbook, 'timestamp')
        return self.parse_order_book(orderbook, symbol, timestamp)

    def parse_ticker(self, ticker, market=None):
        #
        # {
        #     "volume": "2836.47827985",
        #     "last": "36544.93",
        #     "timestamp": "1643372072",
        #     "bid": "36535.79",
        #     "vwap":"36594.20",
        #     "high": "37534.15",
        #     "low": "35511.32",
        #     "ask": "36548.47",
        #     "open": 37179.62
        # }
        #
        symbol = self.safe_symbol(None, market)
        timestamp = self.safe_timestamp(ticker, 'timestamp')
        vwap = self.safe_string(ticker, 'vwap')
        baseVolume = self.safe_string(ticker, 'volume')
        quoteVolume = Precise.string_mul(baseVolume, vwap)
        last = self.safe_string(ticker, 'last')
        return self.safe_ticker({
            'symbol': symbol,
            'timestamp': timestamp,
            'datetime': self.iso8601(timestamp),
            'high': self.safe_string(ticker, 'high'),
            'low': self.safe_string(ticker, 'low'),
            'bid': self.safe_string(ticker, 'bid'),
            'bidVolume': None,
            'ask': self.safe_string(ticker, 'ask'),
            'askVolume': None,
            'vwap': vwap,
            'open': self.safe_string(ticker, 'open'),
            'close': last,
            'last': last,
            'previousClose': None,
            'change': None,
            'percentage': None,
            'average': None,
            'baseVolume': baseVolume,
            'quoteVolume': quoteVolume,
            'info': ticker,
        }, market)

    def fetch_ticker(self, symbol, params={}):
        """
        fetches a price ticker, a statistical calculation with the information calculated over the past 24 hours for a specific market
        :param str symbol: unified symbol of the market to fetch the ticker for
        :param dict params: extra parameters specific to the bitstamp1 api endpoint
        :returns dict: a `ticker structure <https://docs.ccxt.com/#/?id=ticker-structure>`
        """
        if symbol != 'BTC/USD':
            raise ExchangeError(self.id + ' ' + self.version + " fetchTicker doesn't support " + symbol + ', use it for BTC/USD only')
        self.load_markets()
        market = self.market(symbol)
        ticker = self.publicGetTicker(params)
        #
        # {
        #     "volume": "2836.47827985",
        #     "last": "36544.93",
        #     "timestamp": "1643372072",
        #     "bid": "36535.79",
        #     "vwap":"36594.20",
        #     "high": "37534.15",
        #     "low": "35511.32",
        #     "ask": "36548.47",
        #     "open": 37179.62
        # }
        #
        return self.parse_ticker(ticker, market)

    def parse_trade(self, trade, market=None):
        timestamp = self.safe_timestamp_2(trade, 'date', 'datetime')
        side = 'buy' if (trade['type'] == 0) else 'sell'
        orderId = self.safe_string(trade, 'order_id')
        id = self.safe_string(trade, 'tid')
        price = self.safe_string(trade, 'price')
        amount = self.safe_string(trade, 'amount')
        marketId = self.safe_string(trade, 'currency_pair')
        market = self.safe_market(marketId, market)
        return self.safe_trade({
            'id': id,
            'info': trade,
            'timestamp': timestamp,
            'datetime': self.iso8601(timestamp),
            'symbol': market['symbol'],
            'order': orderId,
            'type': None,
            'side': side,
            'takerOrMaker': None,
            'price': price,
            'amount': amount,
            'cost': None,
            'fee': None,
        }, market)

    def fetch_trades(self, symbol, since=None, limit=None, params={}):
        """
        get the list of most recent trades for a particular symbol
        :param str symbol: unified symbol of the market to fetch trades for
        :param int|None since: timestamp in ms of the earliest trade to fetch
        :param int|None limit: the maximum amount of trades to fetch
        :param dict params: extra parameters specific to the bitstamp1 api endpoint
        :returns [dict]: a list of `trade structures <https://docs.ccxt.com/en/latest/manual.html?#public-trades>`
        """
        if symbol != 'BTC/USD':
            raise BadSymbol(self.id + ' ' + self.version + " fetchTrades doesn't support " + symbol + ', use it for BTC/USD only')
        self.load_markets()
        market = self.market(symbol)
        request = {
            'time': 'minute',
        }
        response = self.publicGetTransactions(self.extend(request, params))
        return self.parse_trades(response, market, since, limit)

    def parse_balance(self, response):
        result = {'info': response}
        codes = list(self.currencies.keys())
        for i in range(0, len(codes)):
            code = codes[i]
            currency = self.currency(code)
            currencyId = currency['id']
            account = self.account()
            account['free'] = self.safe_string(response, currencyId + '_available')
            account['used'] = self.safe_string(response, currencyId + '_reserved')
            account['total'] = self.safe_string(response, currencyId + '_balance')
            result[code] = account
        return self.safe_balance(result)

    def fetch_balance(self, params={}):
        """
        query for balance and get the amount of funds available for trading or funds locked in orders
        :param dict params: extra parameters specific to the bitstamp1 api endpoint
        :returns dict: a `balance structure <https://docs.ccxt.com/en/latest/manual.html?#balance-structure>`
        """
        response = self.privatePostBalance(params)
        return self.parse_balance(response)

    def create_order(self, symbol, type, side, amount, price=None, params={}):
        """
        create a trade order
        :param str symbol: unified symbol of the market to create an order in
        :param str type: 'market' or 'limit'
        :param str side: 'buy' or 'sell'
        :param float amount: how much of currency you want to trade in units of base currency
        :param float|None price: the price at which the order is to be fullfilled, in units of the quote currency, ignored in market orders
        :param dict params: extra parameters specific to the bitstamp1 api endpoint
        :returns dict: an `order structure <https://docs.ccxt.com/#/?id=order-structure>`
        """
        if type != 'limit':
            raise ExchangeError(self.id + ' ' + self.version + ' accepts limit orders only')
        if symbol != 'BTC/USD':
            raise ExchangeError(self.id + ' v1 supports BTC/USD orders only')
        self.load_markets()
        method = 'privatePost' + self.capitalize(side)
        request = {
            'amount': amount,
            'price': price,
        }
        response = getattr(self, method)(self.extend(request, params))
        id = self.safe_string(response, 'id')
        return self.safe_order({
            'info': response,
            'id': id,
        })

    def cancel_order(self, id, symbol=None, params={}):
        """
        cancels an open order
        :param str id: order id
        :param str|None symbol: unified symbol of the market the order was made in
        :param dict params: extra parameters specific to the bitstamp1 api endpoint
        :returns dict: An `order structure <https://docs.ccxt.com/#/?id=order-structure>`
        """
        return self.privatePostCancelOrder({'id': id})

    def parse_order_status(self, status):
        statuses = {
            'In Queue': 'open',
            'Open': 'open',
            'Finished': 'closed',
            'Canceled': 'canceled',
        }
        return self.safe_string(statuses, status, status)

    def fetch_order_status(self, id, symbol=None, params={}):
        self.load_markets()
        request = {
            'id': id,
        }
        response = self.privatePostOrderStatus(self.extend(request, params))
        return self.parse_order_status(response)

    def fetch_my_trades(self, symbol=None, since=None, limit=None, params={}):
        """
        fetch all trades made by the user
        :param str|None symbol: unified market symbol
        :param int|None since: the earliest time in ms to fetch trades for
        :param int|None limit: the maximum number of trades structures to retrieve
        :param dict params: extra parameters specific to the bitstamp1 api endpoint
        :returns [dict]: a list of `trade structures <https://docs.ccxt.com/#/?id=trade-structure>`
        """
        self.load_markets()
        market = None
        if symbol is not None:
            market = self.market(symbol)
        response = self.privatePostUserTransactions(params)
        return self.parse_trades(response, market, since, limit)

    def sign(self, path, api='public', method='GET', params={}, headers=None, body=None):
        url = self.urls['api']['rest'] + '/' + self.implode_params(path, params)
        query = self.omit(params, self.extract_params(path))
        if api == 'public':
            if query:
                url += '?' + self.urlencode(query)
        else:
            self.check_required_credentials()
            nonce = str(self.nonce())
            auth = nonce + self.uid + self.apiKey
            signature = self.hmac(self.encode(auth), self.encode(self.secret), hashlib.sha256)
            query = self.extend({
                'key': self.apiKey,
                'signature': signature.upper(),
                'nonce': nonce,
            }, query)
            body = self.urlencode(query)
            headers = {
                'Content-Type': 'application/x-www-form-urlencoded',
            }
        return {'url': url, 'method': method, 'body': body, 'headers': headers}

    def handle_errors(self, httpCode, reason, url, method, headers, body, response, requestHeaders, requestBody):
        if response is None:
            return
        status = self.safe_string(response, 'status')
        if status == 'error':
            raise ExchangeError(self.id + ' ' + self.json(response))
