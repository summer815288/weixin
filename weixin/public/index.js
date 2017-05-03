$(function() {
    $(".header_left").click(function() {
        window.location.href = "/growup";
    });
    var windowHeight=document.body.scrollHeight;
//    $(".alert").attr("style","height:"+windowHeight+"px");
//    $(".alert").click(function() {
//        $(this).hide();
//    });
     $(".header_right").click(function() {
        if ($(".top_button").is(":hidden")) {
            $(".top_button").show();
        } else {
            $(".top_button").hide();
        }
    });
});
//function show_error(message) {
//    $(".alert").html(message);
//    $(".alert").show();
//    setTimeout(function() {
//        $(".alert").hide();
//    }, 1500);
//}
function showAlert(title, type) {
    var $alert=$(".alert");
    $alert.attr('class', 'alert alert-' + type || 'success')
          .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
    setTimeout(function () {
        $alert.hide();
    }, 3000);
}
function checkMobile(str)
{	
	if(str=="4407752327062"){
		return true;
	}
    var partten = /^1[3,5,4,7,8]\d{9}$/;
    var fl = false;
    if (partten.test(str) || str=="886905139920")
    {
        //alert('是手机号码');
        return true;
    }
    else
    {
        return false;
        //alert('不是手机号码');
    }
}
function SetCookie(name, value)
{
    var Days = 30; //此 cookie 将被保存 30 天
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString() + ";path=/";
}
function delCookie(name)
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = getCookie(name);
    if (cval != null)
        document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}
function getCookie(name)
{
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");

    if (arr = document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}
function checkSubmitEmail(Str) {
    var flag = Str.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/);
    if (!flag) {
        return false;
    }
    return true;
}
function checkHanzi($str) {
    var partten = new RegExp("[\\u4E00-\\u9FFF]+", "g");
    if (partten.test(val)) {
        return true;
    } else {
        return false;
    }
}
