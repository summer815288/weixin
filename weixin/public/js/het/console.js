!function(){
function o(o,t,n,i){
for(var s="",r=e(i),l=0;l<n.length;l++)s+="object"==typeof n[l]?" "+JSON.stringify(n[l]):"function"==typeof n[l]?" "+n[l].toString():" "+n[l];
var a=document.createElement("p");
if(a.innerHTML=s,a.className="__type_"+t,_("__wx_console_log_"+o).appendChild(a),
_("__wx_console_log").scrollTop=_("__wx_console_log").scrollHeight,u&&u[t])try{
u[t].apply(u,n);
}catch(d){}
f.push({
tab:o,
type:t,
time:r.time,
msg:n
});
}
function e(o){
var e=o>0?new Date(o):new Date,t=e.getDay()<10?"0"+e.getDay():e.getDay(),n=e.getMonth()<9?"0"+(e.getMonth()+1):e.getMonth()+1,i=e.getFullYear(),_=e.getHours()<10?"0"+e.getHours():e.getHours(),s=e.getMinutes()<10?"0"+e.getMinutes():e.getMinutes(),r=e.getSeconds()<10?"0"+e.getSeconds():e.getSeconds(),l=e.getMilliseconds()<10?"0"+e.getMilliseconds():e.getMilliseconds();
return 100>l&&(l="0"+l),{
time:+e,
year:i,
month:n,
day:t,
hour:_,
minute:s,
second:r,
millisecond:l
};
}
function t(o){
var e="; "+document.cookie,t=e.split("; "+o+"=");
return 2==t.length?t.pop().split(";").shift():void 0;
}
function n(o,e,t){
var n="";
if(t){
var i=new Date;
i.setTime(i.getTime()+1e3*t),n="; expires="+i.toGMTString();
}
document.cookie=o+"="+e+n+"; path=/";
}
function i(o){
n(o,"",-1);
}
function _(o){
return document.getElementById(o);
}
function s(o){
for(var e=_("__wx_console_log_"+o),t=e.childNodes,n=t.length,i=n-1;i>=0;i--)"p"==t[i].nodeName.toLowerCase()&&e.removeChild(t[i]);
}
function r(){
_("__wx_console").className="minimized";
}
function l(){
window.console={
log:function(){
o("default","log",arguments);
},
info:function(){
o("default","info",arguments);
},
warn:function(){
o("default","warn",arguments);
},
error:function(){
o("default","error",arguments);
},
debug:function(){
o("default","debug",arguments);
},
assert:function(){
o("default","error",["console.assert() is not support."]);
},
count:function(){
o("default","error",["console.count() is not support."]);
},
dir:function(){
o("default","error",["console.dir() is not support."]);
},
group:function(){
o("default","error",["console.group() is not support."]);
},
table:function(){
o("default","error",["console.table() is not support."]);
},
time:function(){
o("default","error",["console.time() is not support."]);
},
timeEnd:function(){
o("default","error",["console.timeEnd() is not support."]);
},
trace:function(){
o("default","error",["console.trace() is not support."]);
}
};
}
function a(){
var o="#__wx_console { font-size: 12px; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.5); z-index:999999; }#__wx_console.minimized { top:100%; left:100%; right:0; bottom:0; background:transparent; }#__wx_console_max { display:none; position:fixed; right:5px; bottom:5px; padding:0 15px; line-height:30px; color:#FFF; background:#04BE02; border:1px solid #DDD; border-radius:4px; box-shadow:0 0 15px rgba(0,0,0,0.15); }.minimized #__wx_console_max { display:block; }#__wx_console_body { position:absolute; top:100px; left:5px; right:5px; bottom:5px; background:#FFF; border:1px solid #DDD; border-radius:4px; }.minimized #__wx_console_body { display:none; }#__wx_console_footer { color:#000; position:absolute; bottom:0; left:0; right:0; overflow:hidden; border-top:1px solid #DDD; }#__wx_console_off, #__wx_console_min { color:#04BE02; float:right; line-height:30px; padding:0 15px; border-left:1px solid #DDD; }#__wx_console_tab { border-bottom:1px solid #DDD; height:30px; }#__wx_console_tab .__tab { color:#444; line-height:30px; float:left; padding:0 15px; border-right:1px solid #DDD; border-bottom:1px solid transparent; }#__wx_console_tab .__tab.active { color:#04BE02; border-bottom:1px solid #FFF; }#__wx_console_log { position:absolute; top:30px; bottom:31px; left:0; right:0; overflow:scroll; -webkit-overflow-scrolling:touch; }#__wx_console_log .__opt { border-bottom:1px solid #DDD; background:#FFF; overflow:hidden; position:fixed; top:132px; left:5px; right:5px; }#__wx_console_log .__opt a { float:left; line-height:22px; padding:0 7px; margin:5px 0 5px 4px; color:#444; border-radius:4px; }#__wx_console_log .__opt a.active { background-color:#04BE02; color:#FFF; }#__wx_console_log .__box { display:none; position:relative; }#__wx_console_log .__box.show { display:block; }#__wx_console_log .__box.__has_opt { padding-top:33px; }#__wx_console_log p { line-height:16px; margin:4px; padding:4px 5px; border-bottom:1px dashed #D9D9D9; word-break:break-word; }#__wx_console_log p i { line-height:18px; background-color:#6A5ACD; color:#FFF; padding:0 4px; border-radius:3px; }#__wx_console_log i { font-style:normal; }#__wx_console_log .__type_log { color:#000; }#__wx_console_log .__type_info { color:#6A5ACD; }#__wx_console_log .__type_error { color:#DC143C; background:#FFE4E1; }#__wx_console_log .__type_warn { color:#FFA500; background:#FFFACD; }#__wx_console_log .__type_debug { color:#DAA520; }#__wx_console_log .__date { color:#666; }",e='<div id="__wx_console"><div id="__wx_console_body"><div id="__wx_console_tab"><div class="__tab active" data-name="default">鏃ュ織</div><div class="__tab" data-name="system">绯荤粺</div><div class="__tab" data-name="res">璧勬簮</div></div><div id="__wx_console_log"><div id="__wx_console_log_default" class="__box show"></div><div id="__wx_console_log_system" class="__box"></div><div id="__wx_console_log_res" class="__box __has_opt"><div id="__wx_console_opt_res" class="__opt"><a data-filter="all">鍏ㄩ儴</a><a data-filter="xhr">XHR</a><a data-filter="js">鑴氭湰</a></div><p>璇烽€夋嫨涓€涓垎绫�</p></div></div><div id="__wx_console_footer"><div id="__wx_console_off">鍏抽棴</div><div id="__wx_console_min">鏈€灏忓寲</div></div></div><div id="__wx_console_max">鏄剧ず鏃ュ織</div></div>',n=document.createElement("style");
n.innerHTML=o,document.body.appendChild(n);
var i=document.createElement("div");
i.innerHTML=e,document.body.appendChild(i),"1"==t("DEBUG_SWITCH_MINIMIZED")&&r();
}
function d(){
_("__wx_console_tab").addEventListener("click",function(o){
var e=o.target;
if(!(e.className.indexOf("__tab")<0||e.className.indexOf("active")>-1)){
for(var t=_("__wx_console_tab").children,n=_("__wx_console_log").children,i=0;i<t.length;i++)t[i].className=t[i].className.replace(/ ?active/,"");
for(var i=0;i<n.length;i++)n[i].className=n[i].className.replace(/ ?show/,"");
var s=e.dataset.name;
e.className+=" active",x=s,_("__wx_console_log_"+s).className+=" show",_("__wx_console_log").scrollTop=_("__wx_console_log").scrollHeight;
}
}),_("__wx_console_opt_res").addEventListener("click",function(e){
var t=e.target;
if("a"==t.nodeName.toLowerCase()){
for(var n=t.parentNode.children,i=0;i<n.length;i++)n[i].className="";
if(t.className="active",s("res"),!window.__DEBUGINFO)return void o("res","error",["__DEBUGINFO is undefined"]);
for(var _=t.dataset.filter,r=[],i=0;i<window.__DEBUGINFO.res_list.length;i++){
var l=window.__DEBUGINFO.res_list[i];
("all"==_||l.type==_)&&(l.duration=l.end?(l.end-l.start)/1e3:0,r.push(l));
}
if(0==r.length)return void o("res","log",["娌℃湁绗﹀悎鏉′欢鐨勮祫婧�"]);
for(var i=0;i<r.length;i++){
var a=r[i].url;
a=a.replace(/http(s)?\:\/\/[\.\d]+\:8080/,""),a=a.replace(/http(s)?\:\/\/dev(.+)\.com\:8080(\/mmbizwap\/zh_CN\/htmledition)?/,""),
a=a.replace(/http(s)?\:\/\/res\.wx\.qq\.com(\/mmbizwap\/zh_CN\/htmledition)?/,""),
a=a.replace(/http(s)?\:\/\/mp\.weixin\.qq\.com/,"");
var d=[];
"all"==_&&d.push("<i>"+r[i].type+"</i>"),d.push("<i>"+r[i].status+"</i>"),r[i].duration>0&&d.push("<i>"+Math.ceil(r[i].duration)+"ms</i>"),
d.push(a);
var c="log",p=r[i].status;
"pendding"==p||1*p>=200&&400>1*p||(c="error"),o("res",c,d);
}
}
}),_("__wx_console").addEventListener("click",function(o){
"__wx_console"==o.target.id&&r();
}),_("__wx_console_min").addEventListener("click",function(){
r(),n("DEBUG_SWITCH_MINIMIZED","1",900);
}),_("__wx_console_max").addEventListener("click",function(){
_("__wx_console").className="",i("DEBUG_SWITCH_MINIMIZED");
}),_("__wx_console_off").addEventListener("click",function(){
var o=confirm("纭鍏抽棴鏃ュ織鍚楋紵");
o&&(i("DEBUG_SWITCH"),i("DEBUG_SWITCH_MINIMIZED"),_("__wx_console").parentNode.removeChild(_("__wx_console")));
});
}
function c(){
for(var e=0,t=m.length;t>e;++e){
var n=m[e];
o("default",n.type,n.msg||[],n.time);
}
}
function p(){
var t=navigator.userAgent,n=[],i=e();
o("system","info",["鏃ュ織鏃堕棿:",i.year+"-"+i.month+"-"+i.day+" "+i.hour+":"+i.minute+":"+i.second+" "+i.millisecond]),
n=["绯荤粺鐗堟湰:","涓嶆槑"];
var _=t.match(/(ipod).*\s([\d_]+)/i),s=t.match(/(ipad).*\s([\d_]+)/i),r=t.match(/(iphone)\sos\s([\d_]+)/i),l=t.match(/(android)\s([\d\.]+)/i);
l?n[1]="Android "+l[2]:r?n[1]="iPhone, iOS "+r[2].replace(/_/g,"."):s?n[1]="iPad, iOS "+s[2].replace(/_/g,"."):_&&(n[1]="iPod, iOS "+_[2].replace(/_/g,".")),
o("system","info",n);
var a=t.match(/MicroMessenger\/([\d\.]+)/i);
n=["寰俊鐗堟湰:","涓嶆槑"],a&&a[1]&&(n[1]=a[1]),o("system","info",n);
var d=t.toLowerCase().match(/ nettype\/([^ ]+)/g);
n=["缃戠粶绫诲瀷:","涓嶆槑"],d&&d[0]&&(d=d[0].split("/"),n[1]=d[1]),o("system","info",n),n=["缃戝潃鍗忚:","涓嶆槑"],
"https:"==location.protocol?n[1]="HTTPS":"http:"==location.protocol&&(n[1]="HTTP"),
o("system","info",n),n=["鐧诲綍鐘舵€�:","鏈夌櫥褰曟€�"],window.uin&&window.key||(n[1]="window瀵硅薄鏈敞鍏ョ櫥褰曟€�"),
o("system","info",n),window.addEventListener("load",function(){
var e=window.performance||window.msPerformance||window.webkitPerformance;
if(e&&e.memory,e&&e.timing){
var t=e.timing,n=t.navigationStart;
o("system","info",["杩炴帴缁撴潫鐐�:",t.connectEnd-n+"ms"]),o("system","info",["鍥炲寘缁撴潫鐐�:",t.responseEnd-n+"ms"]),
t.secureConnectionStart>0&&o("system","info",["ssl鑰楁椂:",t.connectEnd-t.secureConnectionStart+"ms"]),
o("system","info",["dom娓叉煋鑰楁椂:",t.domComplete-t.domLoading+"ms"]);
}
});
}
function g(){
l(),a(),d(),c(),p();
}
if(window==window.top&&!(location.href.indexOf("t=debug/index")>-1)){
if("undefined"==typeof moon)return void(console&&console.error("No moon.js"));
var u=window._console||window.console,m=window.__consoleList||[],f=[],x="default";
g();
}
}();