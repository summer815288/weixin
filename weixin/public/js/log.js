(function () {

    function getQueryString(name) {
        var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
        var r = window.location.search.substr(1).match(reg);
        if (r != null) {
            return unescape(r[2]);
        }
        return "";
    }
    function setCookie(name, value){
        var Days = 30; //此 cookie 将被保存 30 天
        var exp = new Date();
        exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/;domain=.mtedu.com";
    }
    function getCookie(name){
        var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
        if (arr = document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return "";
    }


    var params = {};
    //Document对象数据
    if(document) {
        params.domain = document.domain || ''; 
        params.url = document.URL || ''; 
 //       params.title = document.title || ''; 
        params.referrer = document.referrer || ''; 
    }   
    //Window对象数据
    if(window && window.screen) {
        params.sh = window.screen.height || 0;
        params.sw = window.screen.width || 0;
        params.cd = window.screen.colorDepth || 0;
    }   
    //navigator对象数据
    if(navigator) {
        params.lang = navigator.language || ''; 
    }   
    //解析_maq配置
    if(_maq) {
        for(var i in _maq) {
            switch(_maq[i][0]) {
                case '_setAccount':
                    params.account = _maq[i][1];
                    break;
                default:
                    break;
            }   
        }   
    }   
    if(getCookie("mt_uid") != null){
       params.uid = getCookie("mt_uid");
    }else{
       params.uid='';
    }

    var f = getQueryString("f");
    if(f){
        setCookie("mt_f",f);
    }
    params.f=getCookie("mt_f");

    //拼接参数串
    var args = ''; 
    for(var i in params) {
        if(args != '') {
            args += '&';
        }   
        args += i + '=' + encodeURIComponent(params[i]);
    } 

    args += '&'+Math.random();
  
    //通过Image对象请求后端脚本
    var img = new Image(1, 1); 
    img.src = 'http://log.stat.mtedu.com/1.gif?' + args;
})();
