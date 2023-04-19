// ----------------------------------------------------------------------------

// PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
// https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code
// EDIT THE CORRESPONDENT .ts FILE INSTEAD

import testMarket from './base/test.market.js';
async function testLoadMarkets(exchange) {
    const method = 'loadMarkets';
    const markets = await exchange.loadMarkets();
    const marketValues = Object.values(markets);
    for (let i = 0; i < marketValues.length; i++) {
        testMarket(exchange, method, marketValues[i]);
    }
}
export default testLoadMarkets;
