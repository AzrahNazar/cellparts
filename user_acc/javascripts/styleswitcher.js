function getCookie(e){var t=new RegExp(e+"=[^;]+","i");return document.cookie.match(t)?document.cookie.match(t)[0].split("=")[1]:null}function setCookie(e,t,o){var n=new Date;"undefined"!=typeof o?n.setDate(n.getDate()+parseInt(o)):n.setDate(n.getDate()-5),document.cookie=e+"="+t+"; expires="+n.toGMTString()+"; path=/"}function deleteCookie(e){setCookie(e,"moot")}function setStylesheet(e,t){var o,n,s=[""];for(o=0;n=document.getElementsByTagName("link")[o];o++)"alternate stylesheet"==n.getAttribute("rel").toLowerCase()&&n.getAttribute("title")&&(n.disabled=!0,s.push(n),n.getAttribute("title")==e&&(n.disabled=!1));if("undefined"!=typeof t){var a=Math.floor(Math.random()*s.length);s[a].disabled=!1}return"undefined"!=typeof t&&""!=s[a]?s[a].getAttribute("title"):""}function chooseStyle(e,t){document.getElementById&&(setStylesheet(e),setCookie("mysheet",e,t))}function indicateSelected(e){if(null!=selectedtitle&&(void 0==e.type||"select-one"==e.type))for(var e="select-one"==e.type?e.options:e,t=0;t<e.length;t++)if(e[t].value==selectedtitle){"OPTION"==e[t].tagName?e[t].selected=!0:e[t].checked=!0;break}}var manual_or_random="manual",randomsetting="3 days";if("manual"==manual_or_random){var selectedtitle=getCookie("mysheet");document.getElementById&&null!=selectedtitle&&setStylesheet(selectedtitle)}else"random"==manual_or_random&&("eachtime"==randomsetting?setStylesheet("","random"):"sessiononly"==randomsetting?null==getCookie("mysheet_s")?document.cookie="mysheet_s="+setStylesheet("","random")+"; path=/":setStylesheet(getCookie("mysheet_s")):-1!=randomsetting.search(/^[1-9]+ days/i)&&(null==getCookie("mysheet_r")||parseInt(getCookie("mysheet_r_days"))!=parseInt(randomsetting)?(setCookie("mysheet_r",setStylesheet("","random"),parseInt(randomsetting)),setCookie("mysheet_r_days",randomsetting,parseInt(randomsetting))):setStylesheet(getCookie("mysheet_r"))));