# -*- coding: utf-8 -*-

# PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
# https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

from ccxt.base.exchange import Exchange
from ccxt.base.errors import ExchangeError
from ccxt.base.precise import Precise


class paymium(Exchange):

    def describe(self):
        return self.deep_extend(super(paymium, self).describe(), {
            'id': 'paymium',
            'name': 'Paymium',
            'countries': ['FR', 'EU'],
            'rateLimit': 2000,
            'version': 'v1',
            'has': {
                'CORS': True,
                'fetchBalance': True,
                'fetchTicker': True,
                'fetchTrades': True,
                'fetchOrderBook': True,
                'createOrder': True,
                'cancelOrder': True,
            },
            'urls': {
                'logo': 'https://user-images.githubusercontent.com/51840849/87153930-f0f02200-c2c0-11ea-9c0a-40337375ae89.jpg',
                'api': 'https://paymium.com/api',
                'www': 'https://www.paymium.com',
                'fees': 'https://www.paymium.com/page/help/fees',
                'doc': [
                    'https://github.com/Paymium/api-documentation',
                    'https://www.paymium.com/page/developers',
                ],
                'referral': 'https://www.paymium.com/page/sign-up?referral=eDAzPoRQFMvaAB8sf-qj',
            },
            'api': {
                'public': {
                    'get': [
                        'countries',
                        'data/{currency}/ticker',
                        'data/{currency}/trades',
                        'data/{currency}/depth',
                        'bitcoin_charts/{id}/trades',
                        'bitcoin_charts/{id}/depth',
                    ],
                },
                'private': {
                    'get': [
                        'user',
                        'user/addresses',
                        'user/addresses/{address}',
                        'user/orders',
                        'user/orders/{uuid}',
                        'user/price_alerts',
                        'merchant/get_payment/{uuid}',
                    ],
                    'post': [
                        'user/addresses',
                        'user/orders',
                        'user/withdrawals',
                        'user/email_transfers',
                        'user/payment_requests',
                        'user/price_alerts',
                        'merchant/create_payment',
                    ],
                    'delete': [
                        'user/orders/{uuid}',
                        'user/orders/{uuid}/cancel',
                        'user/price_alerts/{id}',
                    ],
                },
            },
            'markets': {
                'BTC/EUR': {'id': 'eur', 'symbol': 'BTC/EUR', 'base': 'BTC', 'quote': 'EUR', 'baseId': 'btc', 'quoteId': 'eur'},
            },
            'fees': {
                'trading': {
                    'maker': self.parse_number('0.002'),
                    'taker': self.parse_number('0.002'),
                },
            },
        })

    def fetch_balance(self, params={}):
        self.load_markets()
        response = self.privateGetUser(params)
        result = {'info': response}
        currencies = list(self.currencies.keys())
        for i in range(0, len(currencies)):
            code = currencies[i]
            currency = self.currency(code)
            currencyId = currency['id']
            free = 'balance_' + currencyId
            if free in response:
                account = self.account()
                used = 'locked_' + currencyId
                account['free'] = self.safe_string(response, free)
                account['used'] = self.safe_string(response, used)
                result[code] = account
        return self.parse_balance(result)

    def fetch_order_book(self, symbol, limit=None, params={}):
        self.load_markets()
        request = {
            'currency': self.market_id(symbol),
        }
        response = self.publicGetDataCurrencyDepth(self.extend(request, params))
        return self.parse_order_book(response, symbol, None, 'bids', 'asks', 'price', 'amount')

    def fetch_ticker(self, symbol, params={}):
        self.load_markets()
        request = {
            'currency': self.market_id(symbol),
        }
        ticker = self.publicGetDataCurrencyTicker(self.extend(request, params))
        timestamp = self.safe_timestamp(ticker, 'at')
        vwap = self.safe_number(ticker, 'vwap')
        baseVolume = self.safe_number(ticker, 'volume')
        quoteVolume = None
        if baseVolume is not None and vwap is not None:
            quoteVolume = baseVolume * vwap
        last = self.safe_number(ticker, 'price')
        return {
            'symbol': symbol,
            'timestamp': timestamp,
            'datetime': self.iso8601(timestamp),
            'high': self.safe_number(ticker, 'high'),
            'low': self.safe_number(ticker, 'low'),
            'bid': self.safe_number(ticker, 'bid'),
            'bidVolume': None,
            'ask': self.safe_number(ticker, 'ask'),
            'askVolume': None,
            'vwap': vwap,
            'open': self.safe_number(ticker, 'open'),
            'close': last,
            'last': last,
            'previousClose': None,
            'change': None,
            'percentage': self.safe_number(ticker, 'variation'),
            'average': None,
            'baseVolume': baseVolume,
            'quoteVolume': quoteVolume,
            'info': ticker,
        }

    def parse_trade(self, trade, market):
        timestamp = self.safe_timestamp(trade, 'created_at_int')
        id = self.safe_string(trade, 'uuid')
        symbol = None
        if market is not None:
            symbol = market['symbol']
        side = self.safe_string(trade, 'side')
        priceString = self.safe_string(trade, 'price')
        amountField = 'traded_' + market['base'].lower()
        amountString = self.safe_string(trade, amountField)
        price = self.parse_number(priceString)
        amount = self.parse_number(amountString)
        cost = self.parse_number(Precise.string_mul(priceString, amountString))
        return {
            'info': trade,
            'id': id,
            'order': None,
            'timestamp': timestamp,
            'datetime': self.iso8601(timestamp),
            'symbol': symbol,
            'type': None,
            'side': side,
            'takerOrMaker': None,
            'price': price,
            'amount': amount,
            'cost': cost,
            'fee': None,
        }

    def fetch_trades(self, symbol, since=None, limit=None, params={}):
        self.load_markets()
        market = self.market(symbol)
        request = {
            'currency': market['id'],
        }
        response = self.publicGetDataCurrencyTrades(self.extend(request, params))
        return self.parse_trades(response, market, since, limit)

    def create_order(self, symbol, type, side, amount, price=None, params={}):
        self.load_markets()
        request = {
            'type': self.capitalize(type) + 'Order',
            'currency': self.market_id(symbol),
            'direction': side,
            'amount': amount,
        }
        if type != 'market':
            request['price'] = price
        response = self.privatePostUserOrders(self.extend(request, params))
        return {
            'info': response,
            'id': response['uuid'],
        }

    def cancel_order(self, id, symbol=None, params={}):
        request = {
            'uuid': id,
        }
        return self.privateDeleteUserOrdersUuidCancel(self.extend(request, params))

    def sign(self, path, api='public', method='GET', params={}, headers=None, body=None):
        url = self.urls['api'] + '/' + self.version + '/' + self.implode_params(path, params)
        query = self.omit(params, self.extract_params(path))
        if api == 'public':
            if query:
                url += '?' + self.urlencode(query)
        else:
            self.check_required_credentials()
            nonce = str(self.nonce())
            auth = nonce + url
            headers = {
                'Api-Key': self.apiKey,
                'Api-Nonce': nonce,
            }
            if method == 'POST':
                if query:
                    body = self.json(query)
                    auth += body
                    headers['Content-Type'] = 'application/json'
            else:
                if query:
                    queryString = self.urlencode(query)
                    auth += queryString
                    url += '?' + queryString
            headers['Api-Signature'] = self.hmac(self.encode(auth), self.encode(self.secret))
        return {'url': url, 'method': method, 'body': body, 'headers': headers}

    def request(self, path, api='public', method='GET', params={}, headers=None, body=None, context={}, config={}):
        response = self.fetch2(path, api, method, params, headers, body, config, context)
        if 'errors' in response:
            raise ExchangeError(self.id + ' ' + self.json(response))
        return response
