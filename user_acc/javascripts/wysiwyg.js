/*
 * jQuery Hotkeys Plugin
 * Copyright 2010, John Resig
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Based upon the plugin by Tzury Bar Yochay:
 * http://github.com/tzuryby/hotkeys
 *
 * Original idea by:
 * Binny V A, http://www.openjs.com/scripts/events/keyboard_shortcuts/
*/
!function(t){function e(e){if("string"==typeof e.data&&(e.data={keys:e.data}),e.data&&e.data.keys&&"string"==typeof e.data.keys){var a=e.handler,n=e.data.keys.toLowerCase().split(" "),o=["text","password","number","email","url","range","date","month","week","time","datetime","datetime-local","search","color","tel"];e.handler=function(e){if(this===e.target||!(/textarea|select/i.test(e.target.nodeName)||t.inArray(e.target.type,o)>-1)){var i=t.hotkeys.specialKeys[e.keyCode],r="keypress"===e.type&&String.fromCharCode(e.which).toLowerCase(),s="",l={};e.altKey&&"alt"!==i&&(s+="alt+"),e.ctrlKey&&"ctrl"!==i&&(s+="ctrl+"),e.metaKey&&!e.ctrlKey&&"meta"!==i&&(s+="meta+"),e.shiftKey&&"shift"!==i&&(s+="shift+"),i&&(l[s+i]=!0),r&&(l[s+r]=!0,l[s+t.hotkeys.shiftNums[r]]=!0,"shift+"===s&&(l[t.hotkeys.shiftNums[r]]=!0));for(var c=0,d=n.length;d>c;c++)if(l[n[c]])return a.apply(this,arguments)}}}}t.hotkeys={version:"0.8",specialKeys:{8:"backspace",9:"tab",10:"return",13:"return",16:"shift",17:"ctrl",18:"alt",19:"pause",20:"capslock",27:"esc",32:"space",33:"pageup",34:"pagedown",35:"end",36:"home",37:"left",38:"up",39:"right",40:"down",45:"insert",46:"del",96:"0",97:"1",98:"2",99:"3",100:"4",101:"5",102:"6",103:"7",104:"8",105:"9",106:"*",107:"+",109:"-",110:".",111:"/",112:"f1",113:"f2",114:"f3",115:"f4",116:"f5",117:"f6",118:"f7",119:"f8",120:"f9",121:"f10",122:"f11",123:"f12",144:"numlock",145:"scroll",186:";",191:"/",220:"\\",222:"'",224:"meta"},shiftNums:{"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":": ","'":'"',",":"<",".":">","/":"?","\\":"|"}},t.each(["keydown","keyup","keypress"],function(){t.event.special[this]={add:e}})}(this.jQuery),function(t){"use strict";var e=function(e){var a=t.Deferred(),n=new FileReader;return n.onload=function(t){a.resolve(t.target.result)},n.onerror=a.reject,n.onprogress=a.notify,n.readAsDataURL(e),a.promise()};t.fn.cleanHtml=function(){var e=t(this).html();return e&&e.replace(/(<br>|\s|<div><br><\/div>|&nbsp;)*$/,"")},t.fn.wysiwyg=function(a){var n,o,i,r=this,s=function(){o.activeToolbarClass&&t(o.toolbarSelector).find(i).each(function(){var e=t(this).data(o.commandRole);document.queryCommandState(e)?t(this).addClass(o.activeToolbarClass):t(this).removeClass(o.activeToolbarClass)})},l=function(t,e){var a=t.split(" "),n=a.shift(),o=a.join(" ")+(e||"");document.execCommand(n,0,o),s()},c=function(e){t.each(e,function(t,e){r.keydown(t,function(t){r.attr("contenteditable")&&r.is(":visible")&&(t.preventDefault(),t.stopPropagation(),l(e))}).keyup(t,function(t){r.attr("contenteditable")&&r.is(":visible")&&(t.preventDefault(),t.stopPropagation())})})},d=function(){var t=window.getSelection();return t.getRangeAt&&t.rangeCount?t.getRangeAt(0):void 0},f=function(){n=d()},u=function(){var t=window.getSelection();if(n){try{t.removeAllRanges()}catch(e){document.body.createTextRange().select(),document.selection.empty()}t.addRange(n)}},m=function(a){r.focus(),t.each(a,function(a,n){/^image\//.test(n.type)?t.when(e(n)).done(function(t){l("insertimage",t)}).fail(function(t){o.fileUploadError("file-reader",t)}):o.fileUploadError("unsupported-file-type",n.type)})},h=function(t,e){u(),document.queryCommandSupported("hiliteColor")&&document.execCommand("hiliteColor",0,e||"transparent"),f(),t.data(o.selectionMarker,e)},p=function(e,a){e.find(i).click(function(){u(),r.focus(),l(t(this).data(a.commandRole)),f()}),e.find("[data-toggle=dropdown]").click(u),e.find("input[type=text][data-"+a.commandRole+"]").on("webkitspeechchange change",function(){var e=this.value;this.value="",u(),e&&(r.focus(),l(t(this).data(a.commandRole),e)),f()}).on("focus",function(){var e=t(this);e.data(a.selectionMarker)||(h(e,a.selectionColor),e.focus())}).on("blur",function(){var e=t(this);e.data(a.selectionMarker)&&h(e,!1)}),e.find("input[type=file][data-"+a.commandRole+"]").change(function(){u(),"file"===this.type&&this.files&&this.files.length>0&&m(this.files),f(),this.value=""})},y=function(){r.on("dragenter dragover",!1).on("drop",function(t){var e=t.originalEvent.dataTransfer;t.stopPropagation(),t.preventDefault(),e&&e.files&&e.files.length>0&&m(e.files)})};return o=t.extend({},t.fn.wysiwyg.defaults,a),i="a[data-"+o.commandRole+"],button[data-"+o.commandRole+"],input[type=button][data-"+o.commandRole+"]",c(o.hotKeys),o.dragAndDropImages&&y(),p(t(o.toolbarSelector),o),r.attr("contenteditable",!0).on("mouseup keyup mouseout",function(){f(),s()}),t(window).bind("touchend",function(t){var e=r.is(t.target)||r.has(t.target).length>0,a=d(),n=a&&a.startContainer===a.endContainer&&a.startOffset===a.endOffset;(!n||e)&&(f(),s())}),this},t.fn.wysiwyg.defaults={hotKeys:{"ctrl+b meta+b":"bold","ctrl+i meta+i":"italic","ctrl+u meta+u":"underline","ctrl+z meta+z":"undo","ctrl+y meta+y meta+shift+z":"redo","ctrl+l meta+l":"justifyleft","ctrl+r meta+r":"justifyright","ctrl+e meta+e":"justifycenter","ctrl+j meta+j":"justifyfull","shift+tab":"outdent",tab:"indent"},toolbarSelector:"[data-role=editor-toolbar]",commandRole:"edit",activeToolbarClass:"btn-info",selectionMarker:"edit-focus-marker",selectionColor:"darkgrey",dragAndDropImages:!0,fileUploadError:function(t,e){console.log("File upload error",t,e)}}}(window.jQuery);