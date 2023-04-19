import Exchange from './abstract/delta.js';
import { Int, OrderSide } from './base/types.js';
export default class delta extends Exchange {
    describe(): any;
    fetchTime(params?: {}): Promise<number>;
    fetchStatus(params?: {}): Promise<{
        status: string;
        updated: number;
        eta: any;
        url: any;
        info: any;
    }>;
    fetchCurrencies(params?: {}): Promise<{}>;
    loadMarkets(reload?: boolean, params?: {}): Promise<import("./base/types.js").Dictionary<import("./base/types.js").Market>>;
    fetchMarkets(params?: {}): Promise<any[]>;
    parseTicker(ticker: any, market?: any): import("./base/types.js").Ticker;
    fetchTicker(symbol: string, params?: {}): Promise<import("./base/types.js").Ticker>;
    fetchTickers(symbols?: string[], params?: {}): Promise<any>;
    fetchOrderBook(symbol: string, limit?: Int, params?: {}): Promise<import("./base/types.js").OrderBook>;
    parseTrade(trade: any, market?: any): import("./base/types.js").Trade;
    fetchTrades(symbol: string, since?: Int, limit?: Int, params?: {}): Promise<import("./base/types.js").Trade[]>;
    parseOHLCV(ohlcv: any, market?: any): number[];
    fetchOHLCV(symbol: string, timeframe?: string, since?: Int, limit?: Int, params?: {}): Promise<import("./base/types.js").OHLCV[]>;
    parseBalance(response: any): import("./base/types.js").Balances;
    fetchBalance(params?: {}): Promise<import("./base/types.js").Balances>;
    fetchPosition(symbol: string, params?: {}): Promise<{
        info: any;
        id: any;
        symbol: any;
        notional: any;
        marginMode: any;
        liquidationPrice: number;
        entryPrice: number;
        unrealizedPnl: any;
        percentage: any;
        contracts: number;
        contractSize: number;
        markPrice: any;
        side: any;
        hedged: any;
        timestamp: number;
        datetime: string;
        maintenanceMargin: any;
        maintenanceMarginPercentage: any;
        collateral: any;
        initialMargin: any;
        initialMarginPercentage: any;
        leverage: any;
        marginRatio: any;
    }>;
    fetchPositions(symbols?: string[], params?: {}): Promise<any>;
    parsePosition(position: any, market?: any): {
        info: any;
        id: any;
        symbol: any;
        notional: any;
        marginMode: any;
        liquidationPrice: number;
        entryPrice: number;
        unrealizedPnl: any;
        percentage: any;
        contracts: number;
        contractSize: number;
        markPrice: any;
        side: any;
        hedged: any;
        timestamp: number;
        datetime: string;
        maintenanceMargin: any;
        maintenanceMarginPercentage: any;
        collateral: any;
        initialMargin: any;
        initialMarginPercentage: any;
        leverage: any;
        marginRatio: any;
    };
    parseOrderStatus(status: any): string;
    parseOrder(order: any, market?: any): any;
    createOrder(symbol: string, type: any, side: OrderSide, amount: any, price?: any, params?: {}): Promise<any>;
    editOrder(id: string, symbol: any, type: any, side: any, amount: any, price?: any, params?: {}): Promise<any>;
    cancelOrder(id: string, symbol?: string, params?: {}): Promise<any>;
    cancelAllOrders(symbol?: string, params?: {}): Promise<any>;
    fetchOpenOrders(symbol?: string, since?: Int, limit?: Int, params?: {}): Promise<import("./base/types.js").Order[]>;
    fetchClosedOrders(symbol?: string, since?: Int, limit?: Int, params?: {}): Promise<import("./base/types.js").Order[]>;
    fetchOrdersWithMethod(method: any, symbol?: string, since?: Int, limit?: Int, params?: {}): Promise<import("./base/types.js").Order[]>;
    fetchMyTrades(symbol?: string, since?: Int, limit?: Int, params?: {}): Promise<import("./base/types.js").Trade[]>;
    fetchLedger(code?: string, since?: Int, limit?: Int, params?: {}): Promise<any>;
    parseLedgerEntryType(type: any): string;
    parseLedgerEntry(item: any, currency?: any): {
        info: any;
        id: string;
        direction: any;
        account: any;
        referenceId: string;
        referenceAccount: any;
        type: string;
        currency: any;
        amount: number;
        before: number;
        after: number;
        status: string;
        timestamp: number;
        datetime: string;
        fee: any;
    };
    fetchDepositAddress(code: string, params?: {}): Promise<{
        currency: any;
        address: string;
        tag: string;
        network: string;
        info: any;
    }>;
    parseDepositAddress(depositAddress: any, currency?: any): {
        currency: any;
        address: string;
        tag: string;
        network: string;
        info: any;
    };
    sign(path: any, api?: string, method?: string, params?: {}, headers?: any, body?: any): {
        url: string;
        method: string;
        body: any;
        headers: any;
    };
    handleErrors(code: any, reason: any, url: any, method: any, headers: any, body: any, response: any, requestHeaders: any, requestBody: any): void;
}
