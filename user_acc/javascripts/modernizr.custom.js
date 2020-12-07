window.Modernizr=function(e,t,n){function r(e){b.cssText=e}function o(e,t){return r(w.join(e+";")+(t||""))}function a(e,t){return typeof e===t}function i(e,t){return!!~(""+e).indexOf(t)}function c(e,t){for(var r in e){var o=e[r];if(!i(o,"-")&&b[o]!==n)return"pfx"==t?o:!0}return!1}function s(e,t,r){for(var o in e){var i=t[e[o]];if(i!==n)return r===!1?e[o]:a(i,"function")?i.bind(r||t):i}return!1}function u(e,t,n){var r=e.charAt(0).toUpperCase()+e.slice(1),o=(e+" "+k.join(r+" ")+r).split(" ");return a(t,"string")||a(t,"undefined")?c(o,t):(o=(e+" "+S.join(r+" ")+r).split(" "),s(o,t,n))}function l(){m.input=function(n){for(var r=0,o=n.length;o>r;r++)P[n[r]]=n[r]in E;return P.list&&(P.list=!!t.createElement("datalist")&&!!e.HTMLDataListElement),P}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),m.inputtypes=function(e){for(var r,o,a,i=0,c=e.length;c>i;i++)E.setAttribute("type",o=e[i]),r="text"!==E.type,r&&(E.value=x,E.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(o)&&E.style.WebkitAppearance!==n?(g.appendChild(E),a=t.defaultView,r=a.getComputedStyle&&"textfield"!==a.getComputedStyle(E,null).WebkitAppearance&&0!==E.offsetHeight,g.removeChild(E)):/^(search|tel)$/.test(o)||(r=/^(url|email)$/.test(o)?E.checkValidity&&E.checkValidity()===!1:E.value!=x)),j[e[i]]=!!r;return j}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var f,d,p="2.6.2",m={},h=!0,g=t.documentElement,y="modernizr",v=t.createElement(y),b=v.style,E=t.createElement("input"),x=":)",w=({}.toString," -webkit- -moz- -o- -ms- ".split(" ")),C="Webkit Moz O ms",k=C.split(" "),S=C.toLowerCase().split(" "),T={},j={},P={},M=[],N=M.slice,A=function(e,n,r,o){var a,i,c,s,u=t.createElement("div"),l=t.body,f=l||t.createElement("body");if(parseInt(r,10))for(;r--;)c=t.createElement("div"),c.id=o?o[r]:y+(r+1),u.appendChild(c);return a=["&#173;",'<style id="s',y,'">',e,"</style>"].join(""),u.id=y,(l?u:f).innerHTML+=a,f.appendChild(u),l||(f.style.background="",f.style.overflow="hidden",s=g.style.overflow,g.style.overflow="hidden",g.appendChild(f)),i=n(u,e),l?u.parentNode.removeChild(u):(f.parentNode.removeChild(f),g.style.overflow=s),!!i},$=function(){function e(e,o){o=o||t.createElement(r[e]||"div"),e="on"+e;var i=e in o;return i||(o.setAttribute||(o=t.createElement("div")),o.setAttribute&&o.removeAttribute&&(o.setAttribute(e,""),i=a(o[e],"function"),a(o[e],"undefined")||(o[e]=n),o.removeAttribute(e))),o=null,i}var r={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return e}(),F={}.hasOwnProperty;d=a(F,"undefined")||a(F.call,"undefined")?function(e,t){return t in e&&a(e.constructor.prototype[t],"undefined")}:function(e,t){return F.call(e,t)},Function.prototype.bind||(Function.prototype.bind=function(e){var t=this;if("function"!=typeof t)throw new TypeError;var n=N.call(arguments,1),r=function(){if(this instanceof r){var o=function(){};o.prototype=t.prototype;var a=new o,i=t.apply(a,n.concat(N.call(arguments)));return Object(i)===i?i:a}return t.apply(e,n.concat(N.call(arguments)))};return r}),T.flexbox=function(){return u("flexWrap")},T.flexboxlegacy=function(){return u("boxDirection")},T.canvas=function(){var e=t.createElement("canvas");return!!e.getContext&&!!e.getContext("2d")},T.canvastext=function(){return!!m.canvas&&!!a(t.createElement("canvas").getContext("2d").fillText,"function")},T.postmessage=function(){return!!e.postMessage},T.websqldatabase=function(){return!!e.openDatabase},T.indexedDB=function(){return!!u("indexedDB",e)},T.hashchange=function(){return $("hashchange",e)&&(t.documentMode===n||t.documentMode>7)},T.history=function(){return!!e.history&&!!history.pushState},T.draganddrop=function(){var e=t.createElement("div");return"draggable"in e||"ondragstart"in e&&"ondrop"in e},T.websockets=function(){return"WebSocket"in e||"MozWebSocket"in e},T.rgba=function(){return r("background-color:rgba(150,255,150,.5)"),i(b.backgroundColor,"rgba")},T.hsla=function(){return r("background-color:hsla(120,40%,100%,.5)"),i(b.backgroundColor,"rgba")||i(b.backgroundColor,"hsla")},T.multiplebgs=function(){return r("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(b.background)},T.backgroundsize=function(){return u("backgroundSize")},T.borderimage=function(){return u("borderImage")},T.borderradius=function(){return u("borderRadius")},T.boxshadow=function(){return u("boxShadow")},T.textshadow=function(){return""===t.createElement("div").style.textShadow},T.opacity=function(){return o("opacity:.55"),/^0.55$/.test(b.opacity)},T.cssanimations=function(){return u("animationName")},T.csscolumns=function(){return u("columnCount")},T.cssgradients=function(){var e="background-image:",t="gradient(linear,left top,right bottom,from(#9f9),to(white));",n="linear-gradient(left top,#9f9, white);";return r((e+"-webkit- ".split(" ").join(t+e)+w.join(n+e)).slice(0,-e.length)),i(b.backgroundImage,"gradient")},T.cssreflections=function(){return u("boxReflect")},T.csstransforms=function(){return!!u("transform")},T.csstransforms3d=function(){var e=!!u("perspective");return e&&"webkitPerspective"in g.style&&A("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(t){e=9===t.offsetLeft&&3===t.offsetHeight}),e},T.csstransitions=function(){return u("transition")},T.fontface=function(){var e;return A('@font-face {font-family:"font";src:url("https://")}',function(n,r){var o=t.getElementById("smodernizr"),a=o.sheet||o.styleSheet,i=a?a.cssRules&&a.cssRules[0]?a.cssRules[0].cssText:a.cssText||"":"";e=/src/i.test(i)&&0===i.indexOf(r.split(" ")[0])}),e},T.generatedcontent=function(){var e;return A(["#",y,"{font:0/0 a}#",y,':after{content:"',x,'";visibility:hidden;font:3px/1 a}'].join(""),function(t){e=t.offsetHeight>=3}),e},T.video=function(){var e=t.createElement("video"),n=!1;try{(n=!!e.canPlayType)&&(n=new Boolean(n),n.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),n.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),n.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""))}catch(r){}return n},T.audio=function(){var e=t.createElement("audio"),n=!1;try{(n=!!e.canPlayType)&&(n=new Boolean(n),n.ogg=e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),n.mp3=e.canPlayType("audio/mpeg;").replace(/^no$/,""),n.wav=e.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),n.m4a=(e.canPlayType("audio/x-m4a;")||e.canPlayType("audio/aac;")).replace(/^no$/,""))}catch(r){}return n},T.localstorage=function(){try{return localStorage.setItem(y,y),localStorage.removeItem(y),!0}catch(e){return!1}},T.sessionstorage=function(){try{return sessionStorage.setItem(y,y),sessionStorage.removeItem(y),!0}catch(e){return!1}},T.webworkers=function(){return!!e.Worker},T.applicationcache=function(){return!!e.applicationCache};for(var z in T)d(T,z)&&(f=z.toLowerCase(),m[f]=T[z](),M.push((m[f]?"":"no-")+f));return m.input||l(),m.addTest=function(e,t){if("object"==typeof e)for(var r in e)d(e,r)&&m.addTest(r,e[r]);else{if(e=e.toLowerCase(),m[e]!==n)return m;t="function"==typeof t?t():t,"undefined"!=typeof h&&h&&(g.className+=" "+(t?"":"no-")+e),m[e]=t}return m},r(""),v=E=null,function(e,t){function n(e,t){var n=e.createElement("p"),r=e.getElementsByTagName("head")[0]||e.documentElement;return n.innerHTML="x<style>"+t+"</style>",r.insertBefore(n.lastChild,r.firstChild)}function r(){var e=y.elements;return"string"==typeof e?e.split(" "):e}function o(e){var t=g[e[m]];return t||(t={},h++,e[m]=h,g[h]=t),t}function a(e,n,r){if(n||(n=t),l)return n.createElement(e);r||(r=o(n));var a;return a=r.cache[e]?r.cache[e].cloneNode():p.test(e)?(r.cache[e]=r.createElem(e)).cloneNode():r.createElem(e),a.canHaveChildren&&!d.test(e)?r.frag.appendChild(a):a}function i(e,n){if(e||(e=t),l)return e.createDocumentFragment();n=n||o(e);for(var a=n.frag.cloneNode(),i=0,c=r(),s=c.length;s>i;i++)a.createElement(c[i]);return a}function c(e,t){t.cache||(t.cache={},t.createElem=e.createElement,t.createFrag=e.createDocumentFragment,t.frag=t.createFrag()),e.createElement=function(n){return y.shivMethods?a(n,e,t):t.createElem(n)},e.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+r().join().replace(/\w+/g,function(e){return t.createElem(e),t.frag.createElement(e),'c("'+e+'")'})+");return n}")(y,t.frag)}function s(e){e||(e=t);var r=o(e);return y.shivCSS&&!u&&!r.hasCSS&&(r.hasCSS=!!n(e,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),l||c(e,r),e}var u,l,f=e.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,p=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,m="_html5shiv",h=0,g={};!function(){try{var e=t.createElement("a");e.innerHTML="<xyz></xyz>",u="hidden"in e,l=1==e.childNodes.length||function(){t.createElement("a");var e=t.createDocumentFragment();return"undefined"==typeof e.cloneNode||"undefined"==typeof e.createDocumentFragment||"undefined"==typeof e.createElement}()}catch(n){u=!0,l=!0}}();var y={elements:f.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:f.shivCSS!==!1,supportsUnknownElements:l,shivMethods:f.shivMethods!==!1,type:"default",shivDocument:s,createElement:a,createDocumentFragment:i};e.html5=y,s(t)}(this,t),m._version=p,m._prefixes=w,m._domPrefixes=S,m._cssomPrefixes=k,m.hasEvent=$,m.testProp=function(e){return c([e])},m.testAllProps=u,m.testStyles=A,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(h?" js "+M.join(" "):""),m}(this,this.document),function(e,t,n){function r(e){return"[object Function]"==g.call(e)}function o(e){return"string"==typeof e}function a(){}function i(e){return!e||"loaded"==e||"complete"==e||"uninitialized"==e}function c(){var e=y.shift();v=1,e?e.t?m(function(){("c"==e.t?d.injectCss:d.injectJs)(e.s,0,e.a,e.x,e.e,1)},0):(e(),c()):v=0}function s(e,n,r,o,a,s,u){function l(t){if(!p&&i(f.readyState)&&(b.r=p=1,!v&&c(),f.onload=f.onreadystatechange=null,t)){"img"!=e&&m(function(){x.removeChild(f)},50);for(var r in T[n])T[n].hasOwnProperty(r)&&T[n][r].onload()}}var u=u||d.errorTimeout,f=t.createElement(e),p=0,g=0,b={t:r,s:n,e:a,a:s,x:u};1===T[n]&&(g=1,T[n]=[]),"object"==e?f.data=n:(f.src=n,f.type=e),f.width=f.height="0",f.onerror=f.onload=f.onreadystatechange=function(){l.call(this,g)},y.splice(o,0,b),"img"!=e&&(g||2===T[n]?(x.insertBefore(f,E?null:h),m(l,u)):T[n].push(f))}function u(e,t,n,r,a){return v=0,t=t||"j",o(e)?s("c"==t?C:w,e,t,this.i++,n,r,a):(y.splice(this.i++,0,e),1==y.length&&c()),this}function l(){var e=d;return e.loader={load:u,i:0},e}var f,d,p=t.documentElement,m=e.setTimeout,h=t.getElementsByTagName("script")[0],g={}.toString,y=[],v=0,b="MozAppearance"in p.style,E=b&&!!t.createRange().compareNode,x=E?p:h.parentNode,p=e.opera&&"[object Opera]"==g.call(e.opera),p=!!t.attachEvent&&!p,w=b?"object":p?"script":"img",C=p?"script":w,k=Array.isArray||function(e){return"[object Array]"==g.call(e)},S=[],T={},j={timeout:function(e,t){return t.length&&(e.timeout=t[0]),e}};d=function(e){function t(e){var t,n,r,e=e.split("!"),o=S.length,a=e.pop(),i=e.length,a={url:a,origUrl:a,prefixes:e};for(n=0;i>n;n++)r=e[n].split("="),(t=j[r.shift()])&&(a=t(a,r));for(n=0;o>n;n++)a=S[n](a);return a}function i(e,o,a,i,c){var s=t(e),u=s.autoCallback;s.url.split(".").pop().split("?").shift(),s.bypass||(o&&(o=r(o)?o:o[e]||o[i]||o[e.split("/").pop().split("?")[0]]),s.instead?s.instead(e,o,a,i,c):(T[s.url]?s.noexec=!0:T[s.url]=1,a.load(s.url,s.forceCSS||!s.forceJS&&"css"==s.url.split(".").pop().split("?").shift()?"c":n,s.noexec,s.attrs,s.timeout),(r(o)||r(u))&&a.load(function(){l(),o&&o(s.origUrl,c,i),u&&u(s.origUrl,c,i),T[s.url]=2})))}function c(e,t){function n(e,n){if(e){if(o(e))n||(f=function(){var e=[].slice.call(arguments);d.apply(this,e),p()}),i(e,f,t,0,u);else if(Object(e)===e)for(s in c=function(){var t,n=0;for(t in e)e.hasOwnProperty(t)&&n++;return n}(),e)e.hasOwnProperty(s)&&(!n&&!--c&&(r(f)?f=function(){var e=[].slice.call(arguments);d.apply(this,e),p()}:f[s]=function(e){return function(){var t=[].slice.call(arguments);e&&e.apply(this,t),p()}}(d[s])),i(e[s],f,t,s,u))}else!n&&p()}var c,s,u=!!e.test,l=e.load||e.both,f=e.callback||a,d=f,p=e.complete||a;n(u?e.yep:e.nope,!!l),l&&n(l)}var s,u,f=this.yepnope.loader;if(o(e))i(e,0,f,0);else if(k(e))for(s=0;s<e.length;s++)u=e[s],o(u)?i(u,0,f,0):k(u)?d(u):Object(u)===u&&c(u,f);else Object(e)===e&&c(e,f)},d.addPrefix=function(e,t){j[e]=t},d.addFilter=function(e){S.push(e)},d.errorTimeout=1e4,null==t.readyState&&t.addEventListener&&(t.readyState="loading",t.addEventListener("DOMContentLoaded",f=function(){t.removeEventListener("DOMContentLoaded",f,0),t.readyState="complete"},0)),e.yepnope=l(),e.yepnope.executeStack=c,e.yepnope.injectJs=function(e,n,r,o,s,u){var l,f,p=t.createElement("script"),o=o||d.errorTimeout;p.src=e;for(f in r)p.setAttribute(f,r[f]);n=u?c:n||a,p.onreadystatechange=p.onload=function(){!l&&i(p.readyState)&&(l=1,n(),p.onload=p.onreadystatechange=null)},m(function(){l||(l=1,n(1))},o),s?p.onload():h.parentNode.insertBefore(p,h)},e.yepnope.injectCss=function(e,n,r,o,i,s){var u,o=t.createElement("link"),n=s?c:n||a;o.href=e,o.rel="stylesheet",o.type="text/css";for(u in r)o.setAttribute(u,r[u]);i||(h.parentNode.insertBefore(o,h),m(n,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};