'use strict';

Object.defineProperty(exports, '__esModule', { value: true });

var platform = require('./functions/platform.js');
var generic = require('./functions/generic.js');
var string = require('./functions/string.js');
var type = require('./functions/type.js');
var number = require('./functions/number.js');
var encode = require('./functions/encode.js');
var crypto = require('./functions/crypto.js');
var time = require('./functions/time.js');
var throttle = require('./functions/throttle.js');
var misc = require('./functions/misc.js');

/*  ------------------------------------------------------------------------ */
/*  ------------------------------------------------------------------------ */

exports.isBrowser = platform.isBrowser;
exports.isElectron = platform.isElectron;
exports.isNode = platform.isNode;
exports.isWebWorker = platform.isWebWorker;
exports.isWindows = platform.isWindows;
exports.arrayConcat = generic.arrayConcat;
exports.clone = generic.clone;
exports.deepExtend = generic.deepExtend;
exports.extend = generic.extend;
exports.filterBy = generic.filterBy;
exports.flatten = generic.flatten;
exports.groupBy = generic.groupBy;
exports.inArray = generic.inArray;
exports.index = generic.index;
exports.indexBy = generic.indexBy;
exports.isEmpty = generic.isEmpty;
exports.keys = generic.keys;
exports.keysort = generic.keysort;
exports.merge = generic.merge;
exports.omit = generic.omit;
exports.ordered = generic.ordered;
exports.pluck = generic.pluck;
exports.sortBy = generic.sortBy;
exports.sortBy2 = generic.sortBy2;
exports.sum = generic.sum;
exports.toArray = generic.toArray;
exports.unique = generic.unique;
exports.values = generic.values;
exports.capitalize = string.capitalize;
exports.strip = string.strip;
exports.unCamelCase = string.unCamelCase;
exports.uuid = string.uuid;
exports.uuid16 = string.uuid16;
exports.uuid22 = string.uuid22;
exports.asFloat = type.asFloat;
exports.asInteger = type.asInteger;
exports.hasProps = type.hasProps;
exports.isArray = type.isArray;
exports.isDictionary = type.isDictionary;
exports.isInteger = type.isInteger;
exports.isNumber = type.isNumber;
exports.isObject = type.isObject;
exports.isString = type.isString;
exports.isStringCoercible = type.isStringCoercible;
exports.prop = type.prop;
exports.safeFloat = type.safeFloat;
exports.safeFloat2 = type.safeFloat2;
exports.safeFloatN = type.safeFloatN;
exports.safeInteger = type.safeInteger;
exports.safeInteger2 = type.safeInteger2;
exports.safeIntegerN = type.safeIntegerN;
exports.safeIntegerProduct = type.safeIntegerProduct;
exports.safeIntegerProduct2 = type.safeIntegerProduct2;
exports.safeIntegerProductN = type.safeIntegerProductN;
exports.safeString = type.safeString;
exports.safeString2 = type.safeString2;
exports.safeStringLower = type.safeStringLower;
exports.safeStringLower2 = type.safeStringLower2;
exports.safeStringLowerN = type.safeStringLowerN;
exports.safeStringN = type.safeStringN;
exports.safeStringUpper = type.safeStringUpper;
exports.safeStringUpper2 = type.safeStringUpper2;
exports.safeStringUpperN = type.safeStringUpperN;
exports.safeTimestamp = type.safeTimestamp;
exports.safeTimestamp2 = type.safeTimestamp2;
exports.safeTimestampN = type.safeTimestampN;
exports.safeValue = type.safeValue;
exports.safeValue2 = type.safeValue2;
exports.safeValueN = type.safeValueN;
exports.DECIMAL_PLACES = number.DECIMAL_PLACES;
exports.NO_PADDING = number.NO_PADDING;
exports.PAD_WITH_ZERO = number.PAD_WITH_ZERO;
exports.ROUND = number.ROUND;
exports.ROUND_DOWN = number.ROUND_DOWN;
exports.ROUND_UP = number.ROUND_UP;
exports.SIGNIFICANT_DIGITS = number.SIGNIFICANT_DIGITS;
exports.TICK_SIZE = number.TICK_SIZE;
exports.TRUNCATE = number.TRUNCATE;
exports.decimalToPrecision = number.decimalToPrecision;
exports.numberToString = number.numberToString;
exports.omitZero = number.omitZero;
exports.precisionConstants = number.precisionConstants;
exports.precisionFromString = number.precisionFromString;
exports.truncate = number.truncate;
exports.truncate_to_string = number.truncate_to_string;
exports.base16ToBinary = encode.base16ToBinary;
exports.base58ToBinary = encode.base58ToBinary;
exports.base64ToBinary = encode.base64ToBinary;
exports.base64ToString = encode.base64ToString;
exports.binaryConcat = encode.binaryConcat;
exports.binaryConcatArray = encode.binaryConcatArray;
exports.binaryToBase16 = encode.binaryToBase16;
exports.binaryToBase58 = encode.binaryToBase58;
exports.binaryToBase64 = encode.binaryToBase64;
exports.binaryToString = encode.binaryToString;
exports.decode = encode.decode;
exports.encode = encode.encode;
exports.isJsonEncodedObject = encode.isJsonEncodedObject;
exports.json = encode.json;
exports.numberToBE = encode.numberToBE;
exports.numberToLE = encode.numberToLE;
exports.rawencode = encode.rawencode;
exports.stringToBase64 = encode.stringToBase64;
exports.stringToBinary = encode.stringToBinary;
exports.urlencode = encode.urlencode;
exports.urlencodeBase64 = encode.urlencodeBase64;
exports.urlencodeNested = encode.urlencodeNested;
exports.urlencodeWithArrayRepeat = encode.urlencodeWithArrayRepeat;
exports.crc32 = crypto.crc32;
exports.ecdsa = crypto.ecdsa;
exports.eddsa = crypto.eddsa;
exports.hash = crypto.hash;
exports.hmac = crypto.hmac;
exports.TimedOut = time.TimedOut;
exports.iso8601 = time.iso8601;
exports.mdy = time.mdy;
exports.microseconds = time.microseconds;
exports.milliseconds = time.milliseconds;
exports.now = time.now;
exports.parse8601 = time.parse8601;
exports.parseDate = time.parseDate;
exports.rfc2616 = time.rfc2616;
exports.seconds = time.seconds;
exports.setTimeout_safe = time.setTimeout_safe;
exports.sleep = time.sleep;
exports.timeout = time.timeout;
exports.uuidv1 = time.uuidv1;
exports.ymd = time.ymd;
exports.ymdhms = time.ymdhms;
exports.yymmdd = time.yymmdd;
exports.yyyymmdd = time.yyyymmdd;
exports.Throttler = throttle.Throttler;
exports.aggregate = misc.aggregate;
exports.buildOHLCVC = misc.buildOHLCVC;
exports.extractParams = misc.extractParams;
exports.implodeParams = misc.implodeParams;
exports.parseTimeframe = misc.parseTimeframe;
exports.roundTimeframe = misc.roundTimeframe;
exports.vwap = misc.vwap;
