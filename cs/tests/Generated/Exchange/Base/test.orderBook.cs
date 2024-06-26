using ccxt;
namespace Tests;

// PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
// https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code


public partial class testMainClass : BaseTest
{
    public static void testOrderBook(Exchange exchange, object skippedProperties, object method, object orderbook, object symbol)
    {
        object format = new Dictionary<string, object>() {
            { "symbol", "ETH/BTC" },
            { "asks", new List<object>() {new List<object> {exchange.parseNumber("1.24"), exchange.parseNumber("0.453")}, new List<object> {exchange.parseNumber("1.25"), exchange.parseNumber("0.157")}} },
            { "bids", new List<object>() {new List<object> {exchange.parseNumber("1.23"), exchange.parseNumber("0.123")}, new List<object> {exchange.parseNumber("1.22"), exchange.parseNumber("0.543")}} },
            { "timestamp", 1504224000000 },
            { "datetime", "2017-09-01T00:00:00" },
            { "nonce", 134234234 },
        };
        object emptyAllowedFor = new List<object>() {"symbol", "nonce", "datetime", "timestamp"}; // todo: make timestamp required
        testSharedMethods.assertStructure(exchange, skippedProperties, method, orderbook, format, emptyAllowedFor);
        // testSharedMethods.assertTimestampAndDatetime (exchange, skippedProperties, method, orderbook);
        testSharedMethods.assertSymbol(exchange, skippedProperties, method, orderbook, "symbol", symbol);
        object logText = testSharedMethods.logTemplate(exchange, method, orderbook);
        //
        if (isTrue(isTrue((inOp(skippedProperties, "bid"))) || isTrue((inOp(skippedProperties, "ask")))))
        {
            return;
        }
        object bids = getValue(orderbook, "bids");
        object bidsLength = getArrayLength(bids);
        for (object i = 0; isLessThan(i, bidsLength); postFixIncrement(ref i))
        {
            object currentBidString = exchange.safeString(getValue(bids, i), 0);
            object nextI = add(i, 1);
            if (isTrue(isGreaterThan(bidsLength, nextI)))
            {
                object nextBidString = exchange.safeString(getValue(bids, nextI), 0);
                object hasCorrectOrder = Precise.stringGt(currentBidString, nextBidString);
                assert(hasCorrectOrder, add(add(add(add("current bid should be > than the next one: ", currentBidString), ">"), nextBidString), logText));
            }
            testSharedMethods.assertGreater(exchange, skippedProperties, method, getValue(bids, i), 0, "0");
            testSharedMethods.assertGreater(exchange, skippedProperties, method, getValue(bids, i), 1, "0");
        }
        object asks = getValue(orderbook, "asks");
        object asksLength = getArrayLength(asks);
        for (object i = 0; isLessThan(i, asksLength); postFixIncrement(ref i))
        {
            object currentAskString = exchange.safeString(getValue(asks, i), 0);
            object nextI = add(i, 1);
            if (isTrue(isGreaterThan(asksLength, nextI)))
            {
                object nextAskString = exchange.safeString(getValue(asks, nextI), 0);
                object hasCorrectOrder = Precise.stringLt(currentAskString, nextAskString);
                assert(hasCorrectOrder, add(add(add(add("current ask should be < than the next one: ", currentAskString), "<"), nextAskString), logText));
            }
            testSharedMethods.assertGreater(exchange, skippedProperties, method, getValue(asks, i), 0, "0");
            testSharedMethods.assertGreater(exchange, skippedProperties, method, getValue(asks, i), 1, "0");
        }
        if (!isTrue((inOp(skippedProperties, "spread"))))
        {
            if (isTrue(isTrue(bidsLength) && isTrue(asksLength)))
            {
                object firstBid = exchange.safeString(getValue(bids, 0), 0);
                object firstAsk = exchange.safeString(getValue(asks, 0), 0);
                // check bid-ask spread
                assert(Precise.stringLt(firstBid, firstAsk), add(add(add(add(add("bids[0][0] (", firstAsk), ") should be < than asks[0][0] ("), firstAsk), ")"), logText));
            }
        }
    }

}