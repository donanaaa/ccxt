'use strict';

class ArrayCache extends Array {

    constructor (maxSize = undefined) {
        super ()
        Object.defineProperty (this, 'maxSize', {
            __proto__: null, // make it invisible
            value: maxSize,
            writable: true,
        })
        Object.defineProperty (this, 'newUpdatesBySymbol', {
            __proto__: null, // make it invisible
            value: {},
            writable: true,
        })
        Object.defineProperty (this, 'clearUpdatesBySymbol', {
            __proto__: null, // make it invisible
            value: {},
            writable: true,
        })
    }

    getLimit (symbol, limit) {
        if (symbol === undefined) {
            symbol = 'all';
        }
        this.clearUpdatesBySymbol[symbol] = true
        if (limit === undefined) {
            return this.newUpdatesBySymbol[symbol]
        } else if (this.newUpdatesBySymbol[symbol] === undefined) {
            return limit
        } else {
            return Math.min (this.newUpdates, limit)
        }
    }

    append (item) {
        // maxSize may be 0 when initialized by a .filter() copy-construction
        if (this.maxSize && (this.length === this.maxSize)) {
            this.shift ()
        }
        this.push (item)
        if (this.clearUpdatesBySymbol[item.symbol]) {
            this.clearUpdatesBySymbol[item.symbol] = false
            this.newUpdatesBySymbol[item.symbol] = 0
        }
        if (this.clearUpdatesBySymbol['all']) {
            this.clearUpdatesBySymbol['all'] = false
            this.newUpdatesBySymbol['all'] = 0
        }
        this.newUpdatesBySymbol[item.symbol] = (this.newUpdatesBySymbol[item.symbol] || 0) + 1
        this.newUpdatesBySymbol['all'] = (this.newUpdatesBySymbol['all'] || 0) + 1
    }

    clear () {
        this.length = 0
    }
}

class ArrayCacheByTimestamp extends ArrayCache {

    constructor (maxSize = undefined) {
        super (maxSize)
        Object.defineProperty (this, 'hashmap', {
            __proto__: null, // make it invisible
            value: {},
            writable: true,
        })
        Object.defineProperty (this, 'sizeTrackerBySymbol', {
            __proto__: null, // make it invisible
            value: new Set (),
            writable: true,
        })
    }

    append (item) {
        if (item[0] in this.hashmap) {
            const reference = this.hashmap[item[0]]
            if (reference !== item) {
                for (const prop in item) {
                    reference[prop] = item[prop]
                }
            }
        } else {
            this.hashmap[item[0]] = item
            if (this.maxSize && (this.length === this.maxSize)) {
                const deleteReference = this.shift ()
                delete this.hashmap[deleteReference[0]]
            }
            this.push (item)
        }
        if (this.clearUpdatesBySymbol[item.symbol]) {
            this.sizeTrackerBySymbol[item.symbol] = (this.sizeTrackerBySymbol[item.symbol] || new Set ())
            this.sizeTrackerBySymbol[item.symbol].clear ()
        }
        if (this.clearUpdatesBySymbol['all']) {
            this.sizeTrackerBySymbol['all'] = (this.sizeTrackerBySymbol['all'] || new Set ())
            this.sizeTrackerBySymbol['all'].clear ()
        }
        this.sizeTrackerBySymbol[item.symbol].add (item[0])
        this.sizeTrackerBySymbol['all'].add (item[0])
        this.newUpdatesBySymbol[item.symbol] = this.sizeTrackerBySymbol[item.symbol].size
        this.newUpdatesBySymbol['all'] = this.sizeTrackerBySymbol[item.symbol].size
    }
}

class ArrayCacheBySymbolById extends ArrayCacheByTimestamp {

    constructor (maxSize = undefined) {
        super (maxSize)
    }

    append (item) {
        const byId = this.hashmap[item.symbol] = this.hashmap[item.symbol] || {}
        if (item.id in byId) {
            const reference = byId[item.id]
            if (reference !== item) {
                for (const prop in item) {
                    reference[prop] = item[prop]
                }
            }
            item = reference
            const index = this.findIndex (x => x.id === item.id)
            // move the order to the end of the array
            this.splice (index, 1)
        } else {
            byId[item.id] = item
        }
        if (this.maxSize && (this.length === this.maxSize)) {
            const deleteReference = this.shift ()
            delete this.hashmap[deleteReference.symbol][deleteReference.id]
        }
        this.push (item)
        if (this.clearUpdatesBySymbol[item.symbol]) {
            this.clearUpdatesBySymbol[item.symbol] = false
            this.newUpdatesBySymbol[item.symbol] = 0
        }
        if (this.clearUpdatesBySymbol['all']) {
            this.clearUpdatesBySymbol['all'] = false
            this.newUpdatesBySymbol['all'] = 0
        }
        this.newUpdatesBySymbol[item.symbol] = (this.newUpdatesBySymbol[item.symbol] || 0) + 1
        this.newUpdatesBySymbol['all'] = (this.newUpdatesBySymbol['all'] || 0) + 1
    }
}

module.exports = {
    ArrayCache,
    ArrayCacheByTimestamp,
    ArrayCacheBySymbolById,
}
