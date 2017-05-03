!function(o){
var n={},e={},t={},s={},a={
js:0,
"css.js":0,
"moon.js":0
};
n.requiredNum=a;
var r=function(n,t,s){
if(!e[n]){
e[n]=s;
var r;
for(var c in soon.map)if(soon.map[c][n]){
r=c;
break;
}
if(r){
a[r]++;
for(var i=3;i--;)try{
soon.setItem(n,s.toString()),soon.setItem(n+"_ver",soon.map[r][n]);
break;
}catch(l){
soon.clearItems();
}
if("css.js"==r){
var u=s(),f=o.document.createElement("style");
f.type="text/css",f.rel="stylesheet",f.innerHTML=u,o.document.head.appendChild(f);
}
soonDefineCallback&&soonDefineCallback(r);
}
}
},c=function(o){
if(!o||!e[o])return null;
var n=e[o];
return t[o]||(t[o]=!0,s[o]=null,"function"==typeof n&&(s[o]=n(c))),s[o];
};
n.run=function(){
if(n.__useInfo.modName&&soon.loadStatus.js==soon.STATUS_LOADED&&soon.loadStatus["moon.js"]==soon.STATUS_LOADED){
var o=c(n.__useInfo.modName);
"function"==typeof n.__useInfo.callback&&n.__useInfo.callback(o);
}
},n.__useInfo={},n.use=function(o,e){
n.__useInfo={
modName:o,
callback:e
},n.run();
},o.define=r,o.seajs=n;
}(window),function(o){
function n(o,n){
var e=o.replace(/\.[^\.]+&/i,"").split("_"),t=e.pop(),s=e.join("_")+"."+n;
return[s,t];
}
function e(o){
var n=l.unload[o];
if(!n||0==n.length)return[];
var e="",t="",s=location.protocol+"//res.wx.qq.com",a=[];
"moon.js"==o&&(s=location.protocol+"//res.wx.qq.com"),e=n[0];
for(var r=1;r<n.length;r++)t=e+","+n[r],t.length>1204?(a.push(s+e),e=n[r]):e=t;
return a.push(s+e),a;
}
function t(o){
var e,t,s=/(http(s)?:)?\/\/res\.wx\.qq\.com/i;
if("moon.js"==o){
if(moon_map)for(var a in moon_map)l.map["moon.js"][a]=moon_map[a].replace(s,"");
}else for(var r=0;r<soonMap[o].length;r++)t=soonMap[o][r].replace(s,""),e=n(t,o),
l.map[o][e[0]]=t;
}
function s(n){
var e,t,s,a,c;
for(e in l.map[n])if(t=l.map[n][e],s=t,a=r&&r.getItem(l.prefix+e),c=r&&r.getItem(l.prefix+e+"_ver"),
a&&c==s)try{
if("js"==n||"moon.js"==n){
var i="//# sourceURL="+t+"\n//@ sourceURL="+t;
o.eval.call(o,'define("'+e+'",[],'+a+")"+i);
}else"css.js"==n&&o.eval.call(o,'define("'+e+'",[],'+a+")");
}catch(u){
l.unload[n].push(t);
}else l.unload[n].push(t);
}
function a(n){
var t=e(n);
if(0==t.length)return l.loadStatus[n]=l.STATUS_LOADED,void seajs.run();
l.loadStatus[n]=l.STATUS_LOADING;
for(var s=0,a=0;a<t.length;a++)!function(e){
var a=t[e],r=o.document.createElement("script");
r.src=a,r.type="text/javascript",r.async=!0,"undefined"!=typeof moon_crossorigin&&moon_crossorigin&&r.setAttribute("crossorigin",!0),
r.onload=r.onreadystatechange=function(){
!r||r.readyState&&!/loaded|complete/.test(r.readyState)||(s++,r.onload=r.onreadystatechange=null,
s==t.length&&(l.loadStatus[n]=l.STATUS_LOADED,seajs.run()));
},r.onerror=function(){
throw"Fail to load "+t[e];
},r&&c.appendChild(r);
}(a);
}
var r,c=o.document.head||o.document.getElementsByTagName("head")[0];
try{
r=o.localStorage;
}catch(i){
r={
getItem:function(){
return void 0;
},
setItem:function(){},
removeItem:function(){},
key:function(){
return"";
}
};
}
var l={
prefix:"__SOON__",
map:{
js:{},
"css.js":{},
"moon.js":{}
},
unload:{
js:[],
"css.js":[],
"moon.js":[]
},
loaded:{
js:[],
"css.js":[],
"moon.js":[]
},
STATUS_UNLOAD:0,
STATUS_LOADING:1,
STATUS_LOADED:2,
loadStatus:{
js:0,
"css.js":0,
"moon.js":0
},
init:function(){
t("moon.js"),t("js"),t("css.js"),s("moon.js"),s("js"),s("css.js"),a("moon.js"),a("js"),
a("css.js");
},
setItem:function(o,n){
r&&r.setItem(l.prefix+o,n);
},
clearItems:function(){
if(r)for(var o,n=0;n<r.length;n++)o=r.key(n),o.indexOf(l.prefix)>=0&&r.removeItem(o);
}
};
o.soon=l;
}(window),window.soon.init();