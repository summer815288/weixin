var isold = 0;
var oldmobile = 0;
function checkForm() {
	var price = $(".shiji").html();
	if ($.trim($("#mobile").val()) == ""
			|| !checkMobile($.trim($("#mobile").val()))) {
		showError("手机格式不正确", "mobile");
		//            alert("手机格式不正确");
		//            location.hash = "#mobile";
		//        $("#mobile").focus();
		return false;
	}
	if ($.trim($("#wechat").val()) == "") {
		showError("微信ID为必填项", "wechat");
		//        alert("微信ID为必填项");
		//        location.hash = "#wechat";
		//        $("#wechat").focus();
		return false;
	}
	if ($.trim($("#name").val()) == "") {
		showError("姓名不能为空", "name");
		return false;
	}
	if ($.trim($("#company").val()) == "") {
		showError("公司不能为空", "company");
		return false;
	}
	if ($.trim($("#jobtitle").val()) == "") {
		showError("职位不能为空", "jobtitle");
		return false;
	}
	if ($.trim($("#second_city").val()) == "") {
		showError("城市不能为空", "second_city");
		return false;
	}
	var city = $("#second_city option:checked").attr("value");
	var data = {
		waresId : waresId,
		name : $.trim($("#name").val()),
		mobile : $.trim($("#mobile").val()),
		wechat : $.trim($("#wechat").val()),
		company : $.trim($("#company").val()),
		jobtitle : $.trim($("#jobtitle").val()),
		city : city,
		openid : $("#openid").val(),
		from : from,
		isold : isold,
		oldmobile : oldmobile
	};
	$
			.ajax({
				url : "/sell/topay/",
				data : data,
				dataType : 'json',
				type : 'post',
				success : function(response) {
					if (response.code == "1") {
						window.location.href = "/sell/newpay/" + response.text;
					} else if (response.code == "-1") {
						showAlert(response.text, "danger");
					} else if (response.code == "-2") {
						showAlert(response.text, "danger");
						setTimeout(
								function() {
									window.location.href = "http://pass.mtedu.com/mobile/login?backurl="
											+ window.location.href;
								}, 3000);
					} else if (response.code == "-3") {
						alert(response.text);
						setTimeout(function() {
							window.location.href = '/userinfo';
						}, 1000);
					}else if(response.code=="2"){
						window.location.href="/sell/newsuccess/"+response.text;
					}
				},
				error : function() {
					showAlert("提交失败", "danger");
				}
			});
}

//$(".guanbi").click(function(){
//	$(".maskd").addClass("hide");
//	$(".gouwuche").addClass("hide");
//});
//$(".queren").click(function(){
//	oldmobile=$.trim($(".yanzheng input").val());
//	if(oldmobile=="" || oldmobile==null || oldmobile==undefined || !checkMobile(oldmobile)){
//		alert("手机号未填写或者格式不正确");
//		return false;
//	}
//	$.ajax({
//		url:'/sell/isold',
//		data:{
//			mobile:oldmobile
//		},
//		type:'post',
//		dataType:'json',
//		success:function(response){
//			if(response.code=="1"){
//				isold=1;
//				//是老学员
//				$(".yanzheng").addClass("hide");
//				$(".yzsuccess").removeClass("hide");
//				$(".youhui").removeClass("hide");
//				$(".gprice").html(parseInt($(".gprice").html())-50);
//			}else{
//				alert(response.text);
//			}
//			
//		},
//		error:function(){
//		}
//	});
//});
function showError(text, obj) {
	alert(text);
	location.hash = "#" + obj;
	$("#" + obj).focus();
}
function get_citys(pid) {
	$.ajax({
		url : '/city/getlist/' + pid,
		type : "get",
		dataType : 'json',
		success : function(response) {
			if (response.code == "1") {
				var citys = response.text;
				var str = "";
				for (var i = 0; i < citys.length; i++) {
					if (citys[i].id == city) {
						str += '<option value="' + citys[i].id + '" selected>'
								+ citys[i].name + '</option>';
					} else {
						str += '<option value="' + citys[i].id + '">'
								+ citys[i].name + '</option>';
					}
				}
				$("#second_city").html(str);
			} else {
				showAlert(response.text, "danger");
			}
		},
		error : function() {
			showAlert("获取城市列表失败", "danger");
		}
	});
}
function isAndroid() {
	var u = navigator.userAgent;
	var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;
	return isAndroid;
}
$(function() {
	//maxheight
	if (isAndroid()) {
		$(".zhezhao").addClass("maxheight");
		$(".tijiao").addClass("fixtijiao");
		$(".moren").attr("style", "margin-bottom:1.26rem !important;");
	}
	var pid = $(this).find("option:checked").attr("value");
	get_citys(pid);
	$("#first_city").change(function() {
		var pid = $(this).find("option:checked").attr("value");
		get_citys(pid);
	});
});