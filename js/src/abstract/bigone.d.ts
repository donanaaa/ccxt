import { implicitReturnType } from '../base/types.js';
import { Exchange as _Exchange } from '../base/Exchange.js';
export default abstract class Exchange extends _Exchange {
    abstract publicGetPing(params?: {}): Promise<implicitReturnType>;
    abstract publicGetAssetPairs(params?: {}): Promise<implicitReturnType>;
    abstract publicGetAssetPairsAssetPairNameDepth(params?: {}): Promise<implicitReturnType>;
    abstract publicGetAssetPairsAssetPairNameTrades(params?: {}): Promise<implicitReturnType>;
    abstract publicGetAssetPairsAssetPairNameTicker(params?: {}): Promise<implicitReturnType>;
    abstract publicGetAssetPairsAssetPairNameCandles(params?: {}): Promise<implicitReturnType>;
    abstract publicGetAssetPairsTickers(params?: {}): Promise<implicitReturnType>;
    abstract privateGetAccounts(params?: {}): Promise<implicitReturnType>;
    abstract privateGetFundAccounts(params?: {}): Promise<implicitReturnType>;
    abstract privateGetAssetsAssetSymbolAddress(params?: {}): Promise<implicitReturnType>;
    abstract privateGetOrders(params?: {}): Promise<implicitReturnType>;
    abstract privateGetOrdersId(params?: {}): Promise<implicitReturnType>;
    abstract privateGetOrdersMulti(params?: {}): Promise<implicitReturnType>;
    abstract privateGetTrades(params?: {}): Promise<implicitReturnType>;
    abstract privateGetWithdrawals(params?: {}): Promise<implicitReturnType>;
    abstract privateGetDeposits(params?: {}): Promise<implicitReturnType>;
    abstract privatePostOrders(params?: {}): Promise<implicitReturnType>;
    abstract privatePostOrdersIdCancel(params?: {}): Promise<implicitReturnType>;
    abstract privatePostOrdersCancel(params?: {}): Promise<implicitReturnType>;
    abstract privatePostWithdrawals(params?: {}): Promise<implicitReturnType>;
    abstract privatePostTransfer(params?: {}): Promise<implicitReturnType>;
}
