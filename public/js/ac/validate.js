//获取字符串长度
function strlen(str) {
    var len = 0
    for (i = 0; i < str.length; i++) {
        if (str.charCodeAt(i) > 255) {
            len += 2;
        } else {
            len++;
        }
    }
    return len;
}
//检测手机
function ismob(str) {
    var reg = /^1[3|4|5|6|7|8|9][0-9]{9}$/;
    return reg.test(str);
}
//检测座机
function istel(str) {
    var reg = /^(([0\+]\d{2,3}-)?(0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/;
    return reg.test(str);
}
//检测信箱
function isemail(str) {
    var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
    return reg.test(str);
}
//检测网站
function isurl(str) {
    var reg = /http(s)?:\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;
    return reg.test(str);
}
//检测数字
function isnumber(str) {
    var reg = /^([+-]?)\d*\.?\d+$/;
    return reg.test(str);
}
//检测整数
function isint(str) {
    var reg = /^-?[1-9]\d*$/;
    return reg.test(str);
}
//检测中文
function ischinese(str) {
    var reg = /^[\u4E00-\u9FA5\uF900-\uFA2D]+$/;
    return reg.test(str);
}
//检查身份证
var city = {11: '北京', 12: '天津', 13: '河北', 14: '山西', 15: '内蒙古', 21: '辽宁', 22: '吉林', 23: '黑龙江', 31: '上海', 32: '江苏', 33: '浙江', 34: '安徽', 35: '福建', 36: '江西', 37: '山东', 41: '河南', 42: '湖北', 43: '湖南', 44: '广东', 45: '广西', 46: '海南', 50: '重庆', 51: '四川', 52: '贵州', 53: '云南', 54: '西藏', 61: '陕西', 62: '甘肃', 63: '青海', 64: '宁夏', 65: '新疆', 71: '台湾', 81: '香港', 82: '澳门', 91: '国外'}
function isidcard(str) {
    if (!/^\d{17}(\d|x)$/i.test(str))
        return false;
    str = str.replace(/x$/i, 'a');
    if (city[parseInt(str.substr(0, 2))] == null)
        return false;
    day = str.substr(6, 4) + '-' + Number(str.substr(10, 2)) + '-' + Number(str.substr(12, 2));
    var d = new Date(day.replace(/-/g, '/'));
    if (day != (d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate()))
        return false;
    var sum = 0;
    for (var i = 17; i >= 0; i--) {
        sum += (Math.pow(2, i) % 11) * parseInt(str.charAt(17 - i), 11);
    }
    if (sum % 11 != 1)
        return false;
    return true;
}
//AJAX提交数据
function post(url, data) {
    var defer = $.Deferred();
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: 'json',
        success: function (msg) {
            defer.resolve(msg);
        }
    });
    return defer.promise();
}
//判断是否存在于数组中
function in_array(search, array) {
    for (var i in array) {
        if (array[i] == search) {
            return true;
        }
    }
    return false;
}
//查询在数组中出现了多少次
function num_count(search, array) {
    var count = 0;
    for (var i in array) {
        if (array[i] == search) {
            count++;
        }
    }
    return count;
}
//重新加载当前网址参数加时间戳
function reload(url, key) {
    var key = (key || 't') + '=';
    var reg = new RegExp(key + '\\d+');
    var timestamp = +new Date();
    if (url.indexOf(key) > -1) {
        return url.replace(reg, key + timestamp);
    } else {
        if (url.indexOf('\?') > -1) {
            var urlArr = url.split('\?');
            if (urlArr[1]) {
                return urlArr[0] + '?' + urlArr[1] + '&' + key + timestamp;
            } else {
                return urlArr[0] + '?' + key + timestamp;
            }
        } else {
            if (url.indexOf('#') > -1) {
                return url.split('#')[0] + '?' + key + timestamp + location.hash;
            } else {
                return url + '?' + key + timestamp;
            }
        }
    }
}
//获取地址栏参数
function query(name, def) {
    if (typeof (def) == 'undefined') {
        def = null;
    }
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null)
        return unescape(r[2]);
    return def;
}
//fastclick
function fastClick() {
    var supportTouch = function () {
        try {
            document.createEvent("TouchEvent");
            return true;
        } catch (e) {
            return false;
        }
    }();
    var _old$On = $.fn.on;
    $.fn.on = function () {
        if (/click/.test(arguments[0]) && typeof arguments[1] == 'function' && supportTouch) { // 只扩展支持touch的当前元素的click事件
            var touchStartY, callback = arguments[1];
            _old$On.apply(this, ['touchstart', function (e) {
                    touchStartY = e.changedTouches[0].clientY;
                }]);
            _old$On.apply(this, ['touchend', function (e) {
                    if (Math.abs(e.changedTouches[0].clientY - touchStartY) > 10)
                        return;

                    e.preventDefault();
                    callback.apply(this, [e]);
                }]);
        } else {
            _old$On.apply(this, arguments);
        }
        return this;
    };
}
//fastClick();
//Android 手机下输入框获取焦点时, 输入法挡住输入框的 bug
function androidInputBugFix() {
    if (/Android/gi.test(navigator.userAgent)) {
        window.addEventListener('resize', function () {
            if (document.activeElement.tagName == 'INPUT' || document.activeElement.tagName == 'TEXTAREA') {
                window.setTimeout(function () {
                    document.activeElement.scrollIntoViewIfNeeded();
                }, 0);
            }
        })
    }
}
androidInputBugFix();
//自动播放背景音乐
function autoPlayMusic() {
    function musicInWeixinHandler() {
        musicPlay(true);
        document.addEventListener("WeixinJSBridgeReady", function () {
            musicPlay(true);
        }, false);
        document.removeEventListener('DOMContentLoaded', musicInWeixinHandler);
    }
    document.addEventListener('DOMContentLoaded', musicInWeixinHandler);
}
//控制背景音乐状态
function musicPlay(isPlay) {
    var audio = document.getElementById('audio');
    if (isPlay && audio.paused) {
        audio.play();
    }
    if (!isPlay && !audio.paused) {
        audio.pause();
    }
}