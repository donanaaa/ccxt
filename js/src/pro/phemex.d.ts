import phemexRest from '../phemex.js';
import { Int } from '../base/types.js';
import Client from '../base/ws/Client.js';
export default class phemex extends phemexRest {
    describe(): any;
    fromEn(en: any, scale: any): string;
    fromEp(ep: any, market?: any): any;
    fromEv(ev: any, market?: any): any;
    fromEr(er: any, market?: any): any;
    requestId(): any;
    parseSwapTicker(ticker: any, market?: any): {
        symbol: any;
        timestamp: number;
        datetime: string;
        high: number;
        low: number;
        bid: any;
        bidVolume: any;
        ask: any;
        askVolume: any;
        vwap: any;
        open: number;
        close: number;
        last: number;
        previousClose: any;
        change: any;
        percentage: any;
        average: any;
        baseVolume: number;
        quoteVolume: number;
        info: any;
    };
    parsePerpetualTicker(ticker: any, market?: any): {
        symbol: any;
        timestamp: any;
        datetime: any;
        high: number;
        low: number;
        bid: any;
        bidVolume: any;
        ask: any;
        askVolume: any;
        vwap: any;
        open: number;
        close: number;
        last: number;
        previousClose: any;
        change: any;
        percentage: any;
        average: any;
        baseVolume: number;
        quoteVolume: number;
        info: any;
    };
    handleTicker(client: Client, message: any): void;
    watchBalance(params?: {}): Promise<any>;
    handleBalance(type: any, client: any, message: any): void;
    handleTrades(client: Client, message: any): void;
    handleOHLCV(client: Client, message: any): void;
    watchTicker(symbol: string, params?: {}): Promise<any>;
    watchTrades(symbol: string, since?: Int, limit?: Int, params?: {}): Promise<any>;
    watchOrderBook(symbol: string, limit?: Int, params?: {}): Promise<any>;
    watchOHLCV(symbol: string, timeframe?: string, since?: Int, limit?: Int, params?: {}): Promise<any>;
    handleDelta(bookside: any, delta: any, market?: any): void;
    handleDeltas(bookside: any, deltas: any, market?: any): void;
    handleOrderBook(client: Client, message: any): void;
    watchMyTrades(symbol?: string, since?: Int, limit?: Int, params?: {}): Promise<any>;
    handleMyTrades(client: Client, message: any): void;
    watchOrders(symbol?: string, since?: Int, limit?: Int, params?: {}): Promise<any>;
    handleOrders(client: Client, message: any): void;
    parseWSSwapOrder(order: any, market?: any): any;
    handleMessage(client: Client, message: any): any;
    handleAuthenticate(client: Client, message: any): void;
    subscribePrivate(type: any, messageHash: any, params?: {}): Promise<any>;
    authenticate(params?: {}): Promise<any>;
}
