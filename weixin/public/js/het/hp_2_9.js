define("/hp/hp_2.js",[],function (require) {
var win = window;
var doc = document;

function getScrollTop(){    //返回现有位置里顶部的高度
	return doc.documentElement.scrollTop || doc.body.scrollTop;
}
function getWindowHeight(){    //返回当前窗口的高度
	return win.innerHeight || doc.documentElement.clientHeight;
};	
function getDocumentHeight(){    //返回网页高度
	return doc.body.scrollHeight;
};
function isScrollEnd(){    //判断是否到底了
  	return (getScrollTop() + getWindowHeight()) == getDocumentHeight();
}

var modInit = function(opts) {
	var pageInfo = [{begin:5}];

	var namespace = opts.container;
	var cid = 0;
	$(namespace).on('click', '.tab_hd .item', function() {
		var index = $(this).data('index')*1;
		cid = index;
		$(namespace).find('.tab_hd .item').removeClass('active');
		$(this).addClass('active');
		$(namespace).find('.article_list').hide();
		$(namespace).find('.article_list_'+index).show();
		onScroll();
	});

	var cloneDom = $(namespace).find(".js_post").eq(0).clone();

    var onScroll = function(){
    	var idx = cid || 0;

    	pageInfo[idx] = pageInfo[idx] || {};
    	var info = pageInfo[idx];
    	var count = 5;
    	var begin = info.begin || 0;
		var listDom = $(namespace).find('.article_list_'+idx);

	    if (isScrollEnd() && !info.isEnd && !info.isLoading){
			//console.log("show loading");
			listDom.find(".js_loading").remove();
			listDom.append('<div class="js_loading list-loading"><i class="icon_loading"></i>加载中…</div>');
	    	var url = location.href;
	    	url = url.replace(/&begin=\d+/, "").replace(/&count=\d+/, "").replace("#wechat_redirect", "");
	    	info.isLoading = true;
	    	//setTimeout(function(){
		    	$.ajax({
		    		url:url + "&cid=" + idx + "&begin=" + begin + "&count=" + count + "&action=appmsg_list&f=json&r=" + Math.random(),
		    		type:"POST",
		    		dataType:"json",
		    		success:function(json){
	    				listDom.find(".js_loading").hide();
		    			if (json && json.base_resp && json.base_resp.ret == 0){
		    				var appmsg_list = json.appmsg_list;
			    			info.begin = begin + count;
			    			//console.log(json);
			    			
			    			var i, len = appmsg_list.length;
			    			if (len == 0){
			    				info.isEnd = true;
			    				//$(window).off('scroll', onScroll);
			    			}else{
			    				for (i = 0; i < len; ++i){
			    					var itemDom = cloneDom.clone();
			    					var item = appmsg_list[i];
		    						itemDom.attr("href", item.link);
			    					itemDom.find(".js_img").attr("src", item.cover);
			    					itemDom.find(".js_title").text(item.title);
			    					itemDom.find(".desc").text(item.digest);
			    					listDom.append(itemDom);
			    				}
	    						info.isLoading = false;
		    					onScroll();
			    			}
			    			
			    			pageInfo[idx] = info;
		    			}
		    		},
		    		complete:function(){
		    			//hide loading
	    				//console.log("hide loading");
	    				info.isLoading = false;
	    				listDom.find(".js_loading").remove();
		    		}
		    	//}, 5000);
	    	})
	    	//console.log("end");
	    }
    };

    if (cloneDom.length > 0){
		$(window).on('scroll', onScroll);

		setTimeout(function(){
			onScroll();
		}, 1000);
    }
	// console.log('run hp_2.js, name:', opts.container);
};
return modInit;
})//# sourceURL=/hp/hp_2_9.js
//@ sourceURL=/hp/hp_2_9.js