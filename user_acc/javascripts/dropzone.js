!function(){function e(t,i,n){var r=e.resolve(t);if(null==r){n=n||t,i=i||"root";var s=new Error('Failed to require "'+n+'" from "'+i+'"');throw s.path=n,s.parent=i,s.require=!0,s}var o=e.modules[r];if(!o._resolving&&!o.exports){var l={};l.exports={},l.client=l.component=!0,o._resolving=!0,o.call(this,l.exports,e.relative(r),l),delete o._resolving,o.exports=l.exports}return o.exports}e.modules={},e.aliases={},e.resolve=function(t){"/"===t.charAt(0)&&(t=t.slice(1));for(var i=[t,t+".js",t+".json",t+"/index.js",t+"/index.json"],n=0;n<i.length;n++){var t=i[n];if(e.modules.hasOwnProperty(t))return t;if(e.aliases.hasOwnProperty(t))return e.aliases[t]}},e.normalize=function(e,t){var i=[];if("."!=t.charAt(0))return t;e=e.split("/"),t=t.split("/");for(var n=0;n<t.length;++n)".."==t[n]?e.pop():"."!=t[n]&&""!=t[n]&&i.push(t[n]);return e.concat(i).join("/")},e.register=function(t,i){e.modules[t]=i},e.alias=function(t,i){if(!e.modules.hasOwnProperty(t))throw new Error('Failed to alias "'+t+'", it does not exist');e.aliases[i]=t},e.relative=function(t){function i(e,t){for(var i=e.length;i--;)if(e[i]===t)return i;return-1}function n(i){var r=n.resolve(i);return e(r,t,i)}var r=e.normalize(t,"..");return n.resolve=function(n){var s=n.charAt(0);if("/"==s)return n.slice(1);if("."==s)return e.normalize(r,n);var o=t.split("/"),l=i(o,"deps")+1;return l||(l=0),n=o.slice(0,l+1).join("/")+"/deps/"+n},n.exists=function(t){return e.modules.hasOwnProperty(n.resolve(t))},n},e.register("component-emitter/index.js",function(e,t,i){function n(e){return e?r(e):void 0}function r(e){for(var t in n.prototype)e[t]=n.prototype[t];return e}i.exports=n,n.prototype.on=function(e,t){return this._callbacks=this._callbacks||{},(this._callbacks[e]=this._callbacks[e]||[]).push(t),this},n.prototype.once=function(e,t){function i(){n.off(e,i),t.apply(this,arguments)}var n=this;return this._callbacks=this._callbacks||{},t._off=i,this.on(e,i),this},n.prototype.off=n.prototype.removeListener=n.prototype.removeAllListeners=function(e,t){this._callbacks=this._callbacks||{};var i=this._callbacks[e];if(!i)return this;if(1==arguments.length)return delete this._callbacks[e],this;var n=i.indexOf(t._off||t);return~n&&i.splice(n,1),this},n.prototype.emit=function(e){this._callbacks=this._callbacks||{};var t=[].slice.call(arguments,1),i=this._callbacks[e];if(i){i=i.slice(0);for(var n=0,r=i.length;r>n;++n)i[n].apply(this,t)}return this},n.prototype.listeners=function(e){return this._callbacks=this._callbacks||{},this._callbacks[e]||[]},n.prototype.hasListeners=function(e){return!!this.listeners(e).length}}),e.register("dropzone/index.js",function(e,t,i){i.exports=t("./lib/dropzone.js")}),e.register("dropzone/lib/dropzone.js",function(e,t,i){/*
#
# More info at [www.dropzonejs.com](http://www.dropzonejs.com)
#
# Copyright (c) 2012, Matias Meno
#
# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:
#
# The above copyright notice and this permission notice shall be included in
# all copies or substantial portions of the Software.
#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
# THE SOFTWARE.
#
*/
!function(){var e,n,r,s,o,l,a={}.hasOwnProperty,p=function(e,t){function i(){this.constructor=e}for(var n in t)a.call(t,n)&&(e[n]=t[n]);return i.prototype=t.prototype,e.prototype=new i,e.__super__=t.prototype,e},u=[].slice;n="undefined"!=typeof Emitter&&null!==Emitter?Emitter:t("emitter"),o=function(){},e=function(e){function t(e,n){var r,s,o;if(this.element=e,this.version=t.version,this.defaultOptions.previewTemplate=this.defaultOptions.previewTemplate.replace(/\n*/g,""),this.clickableElements=[],this.listeners=[],this.files=[],"string"==typeof this.element&&(this.element=document.querySelector(this.element)),!this.element||null==this.element.nodeType)throw new Error("Invalid dropzone element.");if(this.element.dropzone)throw new Error("Dropzone already attached.");if(t.instances.push(this),this.element.dropzone=this,r=null!=(o=t.optionsForElement(this.element))?o:{},this.options=i({},this.defaultOptions,r,null!=n?n:{}),this.options.forceFallback||!t.isBrowserSupported())return this.options.fallback.call(this);if(null==this.options.url&&(this.options.url=this.element.getAttribute("action")),!this.options.url)throw new Error("No URL provided.");if(this.options.acceptedFiles&&this.options.acceptedMimeTypes)throw new Error("You can't provide both 'acceptedFiles' and 'acceptedMimeTypes'. 'acceptedMimeTypes' is deprecated.");this.options.acceptedMimeTypes&&(this.options.acceptedFiles=this.options.acceptedMimeTypes,delete this.options.acceptedMimeTypes),this.options.method=this.options.method.toUpperCase(),(s=this.getExistingFallback())&&s.parentNode&&s.parentNode.removeChild(s),this.previewsContainer=this.options.previewsContainer?t.getElement(this.options.previewsContainer,"previewsContainer"):this.element,this.options.clickable&&(this.clickableElements=this.options.clickable===!0?[this.element]:t.getElements(this.options.clickable,"clickable")),this.init()}var i;return p(t,e),t.prototype.events=["drop","dragstart","dragend","dragenter","dragover","dragleave","selectedfiles","addedfile","removedfile","thumbnail","error","errormultiple","processing","processingmultiple","uploadprogress","totaluploadprogress","sending","sendingmultiple","success","successmultiple","canceled","canceledmultiple","complete","completemultiple","reset","maxfilesexceeded"],t.prototype.defaultOptions={url:null,method:"post",withCredentials:!1,parallelUploads:2,uploadMultiple:!1,maxFilesize:256,paramName:"file",createImageThumbnails:!0,maxThumbnailFilesize:10,thumbnailWidth:100,thumbnailHeight:100,maxFiles:null,params:{},clickable:!0,ignoreHiddenFiles:!0,acceptedFiles:null,acceptedMimeTypes:null,autoProcessQueue:!0,addRemoveLinks:!1,previewsContainer:null,dictDefaultMessage:"Drop files here to upload",dictFallbackMessage:"Your browser does not support drag'n'drop file uploads.",dictFallbackText:"Please use the fallback form below to upload your files like in the olden days.",dictFileTooBig:"File is too big ({{filesize}}MB). Max filesize: {{maxFilesize}}MB.",dictInvalidFileType:"You can't upload files of this type.",dictResponseError:"Server responded with {{statusCode}} code.",dictCancelUpload:"Cancel upload",dictCancelUploadConfirmation:"Are you sure you want to cancel this upload?",dictRemoveFile:"Remove file",dictRemoveFileConfirmation:null,dictMaxFilesExceeded:"You can only upload {{maxFiles}} files.",accept:function(e,t){return t()},init:function(){return o},forceFallback:!1,fallback:function(){var e,i,n,r,s,o;for(this.element.className=""+this.element.className+" dz-browser-not-supported",o=this.element.getElementsByTagName("div"),r=0,s=o.length;s>r;r++)e=o[r],/(^| )dz-message($| )/.test(e.className)&&(i=e,e.className="dz-message");return i||(i=t.createElement('<div class="dz-message"><span></span></div>'),this.element.appendChild(i)),n=i.getElementsByTagName("span")[0],n&&(n.textContent=this.options.dictFallbackMessage),this.element.appendChild(this.getFallbackForm())},resize:function(e){var t,i,n;return t={srcX:0,srcY:0,srcWidth:e.width,srcHeight:e.height},i=e.width/e.height,n=this.options.thumbnailWidth/this.options.thumbnailHeight,e.height<this.options.thumbnailHeight||e.width<this.options.thumbnailWidth?(t.trgHeight=t.srcHeight,t.trgWidth=t.srcWidth):i>n?(t.srcHeight=e.height,t.srcWidth=t.srcHeight*n):(t.srcWidth=e.width,t.srcHeight=t.srcWidth/n),t.srcX=(e.width-t.srcWidth)/2,t.srcY=(e.height-t.srcHeight)/2,t},drop:function(){return this.element.classList.remove("dz-drag-hover")},dragstart:o,dragend:function(){return this.element.classList.remove("dz-drag-hover")},dragenter:function(){return this.element.classList.add("dz-drag-hover")},dragover:function(){return this.element.classList.add("dz-drag-hover")},dragleave:function(){return this.element.classList.remove("dz-drag-hover")},selectedfiles:function(){return this.element===this.previewsContainer?this.element.classList.add("dz-started"):void 0},reset:function(){return this.element.classList.remove("dz-started")},addedfile:function(e){var i,n,r,s,o,l,a,p=this;for(e.previewElement=t.createElement(this.options.previewTemplate.trim()),e.previewTemplate=e.previewElement,this.previewsContainer.appendChild(e.previewElement),l=e.previewElement.querySelectorAll("[data-dz-name]"),n=0,s=l.length;s>n;n++)i=l[n],i.textContent=e.name;for(a=e.previewElement.querySelectorAll("[data-dz-size]"),r=0,o=a.length;o>r;r++)i=a[r],i.innerHTML=this.filesize(e.size);return this.options.addRemoveLinks&&(e._removeLink=t.createElement('<a class="dz-remove" href="javascript:undefined;">'+this.options.dictRemoveFile+"</a>"),e._removeLink.addEventListener("click",function(i){return i.preventDefault(),i.stopPropagation(),e.status===t.UPLOADING?t.confirm(p.options.dictCancelUploadConfirmation,function(){return p.removeFile(e)}):p.options.dictRemoveFileConfirmation?t.confirm(p.options.dictRemoveFileConfirmation,function(){return p.removeFile(e)}):p.removeFile(e)}),e.previewElement.appendChild(e._removeLink)),this._updateMaxFilesReachedClass()},removedfile:function(e){var t;return null!=(t=e.previewElement)&&t.parentNode.removeChild(e.previewElement),this._updateMaxFilesReachedClass()},thumbnail:function(e,t){var i,n,r,s,o;for(e.previewElement.classList.remove("dz-file-preview"),e.previewElement.classList.add("dz-image-preview"),s=e.previewElement.querySelectorAll("[data-dz-thumbnail]"),o=[],n=0,r=s.length;r>n;n++)i=s[n],i.alt=e.name,o.push(i.src=t);return o},error:function(e,t){var i,n,r,s,o;for(e.previewElement.classList.add("dz-error"),s=e.previewElement.querySelectorAll("[data-dz-errormessage]"),o=[],n=0,r=s.length;r>n;n++)i=s[n],o.push(i.textContent=t);return o},errormultiple:o,processing:function(e){return e.previewElement.classList.add("dz-processing"),e._removeLink?e._removeLink.textContent=this.options.dictCancelUpload:void 0},processingmultiple:o,uploadprogress:function(e,t){var i,n,r,s,o;for(s=e.previewElement.querySelectorAll("[data-dz-uploadprogress]"),o=[],n=0,r=s.length;r>n;n++)i=s[n],o.push(i.style.width=""+t+"%");return o},totaluploadprogress:o,sending:o,sendingmultiple:o,success:function(e){return e.previewElement.classList.add("dz-success")},successmultiple:o,canceled:function(e){return this.emit("error",e,"Upload canceled.")},canceledmultiple:o,complete:function(e){return e._removeLink?e._removeLink.textContent=this.options.dictRemoveFile:void 0},completemultiple:o,maxfilesexceeded:o,previewTemplate:'<div class="dz-preview dz-file-preview">\n  <div class="dz-details">\n    <div class="dz-filename"><span data-dz-name></span></div>\n    <div class="dz-size" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\n  <div class="dz-success-mark"><span>✔</span></div>\n  <div class="dz-error-mark"><span>✘</span></div>\n  <div class="dz-error-message"><span data-dz-errormessage></span></div>\n</div>'},i=function(){var e,t,i,n,r,s,o;for(n=arguments[0],i=2<=arguments.length?u.call(arguments,1):[],s=0,o=i.length;o>s;s++){t=i[s];for(e in t)r=t[e],n[e]=r}return n},t.prototype.getAcceptedFiles=function(){var e,t,i,n,r;for(n=this.files,r=[],t=0,i=n.length;i>t;t++)e=n[t],e.accepted&&r.push(e);return r},t.prototype.getRejectedFiles=function(){var e,t,i,n,r;for(n=this.files,r=[],t=0,i=n.length;i>t;t++)e=n[t],e.accepted||r.push(e);return r},t.prototype.getQueuedFiles=function(){var e,i,n,r,s;for(r=this.files,s=[],i=0,n=r.length;n>i;i++)e=r[i],e.status===t.QUEUED&&s.push(e);return s},t.prototype.getUploadingFiles=function(){var e,i,n,r,s;for(r=this.files,s=[],i=0,n=r.length;n>i;i++)e=r[i],e.status===t.UPLOADING&&s.push(e);return s},t.prototype.init=function(){var e,i,n,r,s,o,l,a=this;for("form"===this.element.tagName&&this.element.setAttribute("enctype","multipart/form-data"),this.element.classList.contains("dropzone")&&!this.element.querySelector(".dz-message")&&this.element.appendChild(t.createElement('<div class="dz-default dz-message"><span>'+this.options.dictDefaultMessage+"</span></div>")),this.clickableElements.length&&(n=function(){return a.hiddenFileInput&&document.body.removeChild(a.hiddenFileInput),a.hiddenFileInput=document.createElement("input"),a.hiddenFileInput.setAttribute("type","file"),(null==a.options.maxFiles||a.options.maxFiles>1)&&a.hiddenFileInput.setAttribute("multiple","multiple"),null!=a.options.acceptedFiles&&a.hiddenFileInput.setAttribute("accept",a.options.acceptedFiles),a.hiddenFileInput.style.visibility="hidden",a.hiddenFileInput.style.position="absolute",a.hiddenFileInput.style.top="0",a.hiddenFileInput.style.left="0",a.hiddenFileInput.style.height="0",a.hiddenFileInput.style.width="0",document.body.appendChild(a.hiddenFileInput),a.hiddenFileInput.addEventListener("change",function(){var e;return e=a.hiddenFileInput.files,e.length&&(a.emit("selectedfiles",e),a.handleFiles(e)),n()})},n()),this.URL=null!=(o=window.URL)?o:window.webkitURL,l=this.events,r=0,s=l.length;s>r;r++)e=l[r],this.on(e,this.options[e]);return this.on("uploadprogress",function(){return a.updateTotalUploadProgress()}),this.on("removedfile",function(){return a.updateTotalUploadProgress()}),this.on("canceled",function(e){return a.emit("complete",e)}),i=function(e){return e.stopPropagation(),e.preventDefault?e.preventDefault():e.returnValue=!1},this.listeners=[{element:this.element,events:{dragstart:function(e){return a.emit("dragstart",e)},dragenter:function(e){return i(e),a.emit("dragenter",e)},dragover:function(e){return i(e),a.emit("dragover",e)},dragleave:function(e){return a.emit("dragleave",e)},drop:function(e){return i(e),a.drop(e)},dragend:function(e){return a.emit("dragend",e)}}}],this.clickableElements.forEach(function(e){return a.listeners.push({element:e,events:{click:function(i){return e!==a.element||i.target===a.element||t.elementInside(i.target,a.element.querySelector(".dz-message"))?a.hiddenFileInput.click():void 0}}})}),this.enable(),this.options.init.call(this)},t.prototype.destroy=function(){var e;return this.disable(),this.removeAllFiles(!0),(null!=(e=this.hiddenFileInput)?e.parentNode:void 0)&&(this.hiddenFileInput.parentNode.removeChild(this.hiddenFileInput),this.hiddenFileInput=null),delete this.element.dropzone},t.prototype.updateTotalUploadProgress=function(){var e,t,i,n,r,s,o,l;if(n=0,i=0,e=this.getAcceptedFiles(),e.length){for(l=this.getAcceptedFiles(),s=0,o=l.length;o>s;s++)t=l[s],n+=t.upload.bytesSent,i+=t.upload.total;r=100*n/i}else r=100;return this.emit("totaluploadprogress",r,i,n)},t.prototype.getFallbackForm=function(){var e,i,n,r;return(e=this.getExistingFallback())?e:(n='<div class="dz-fallback">',this.options.dictFallbackText&&(n+="<p>"+this.options.dictFallbackText+"</p>"),n+='<input type="file" name="'+this.options.paramName+(this.options.uploadMultiple?"[]":"")+'" '+(this.options.uploadMultiple?'multiple="multiple"':void 0)+' /><input type="submit" value="Upload!"></div>',i=t.createElement(n),"FORM"!==this.element.tagName?(r=t.createElement('<form action="'+this.options.url+'" enctype="multipart/form-data" method="'+this.options.method+'"></form>'),r.appendChild(i)):(this.element.setAttribute("enctype","multipart/form-data"),this.element.setAttribute("method",this.options.method)),null!=r?r:i)},t.prototype.getExistingFallback=function(){var e,t,i,n,r,s;for(t=function(e){var t,i,n;for(i=0,n=e.length;n>i;i++)if(t=e[i],/(^| )fallback($| )/.test(t.className))return t},s=["div","form"],n=0,r=s.length;r>n;n++)if(i=s[n],e=t(this.element.getElementsByTagName(i)))return e},t.prototype.setupEventListeners=function(){var e,t,i,n,r,s,o;for(s=this.listeners,o=[],n=0,r=s.length;r>n;n++)e=s[n],o.push(function(){var n,r;n=e.events,r=[];for(t in n)i=n[t],r.push(e.element.addEventListener(t,i,!1));return r}());return o},t.prototype.removeEventListeners=function(){var e,t,i,n,r,s,o;for(s=this.listeners,o=[],n=0,r=s.length;r>n;n++)e=s[n],o.push(function(){var n,r;n=e.events,r=[];for(t in n)i=n[t],r.push(e.element.removeEventListener(t,i,!1));return r}());return o},t.prototype.disable=function(){var e,t,i,n,r;for(this.clickableElements.forEach(function(e){return e.classList.remove("dz-clickable")}),this.removeEventListeners(),n=this.files,r=[],t=0,i=n.length;i>t;t++)e=n[t],r.push(this.cancelUpload(e));return r},t.prototype.enable=function(){return this.clickableElements.forEach(function(e){return e.classList.add("dz-clickable")}),this.setupEventListeners()},t.prototype.filesize=function(e){var t;return e>=1e11?(e/=1e11,t="TB"):e>=1e8?(e/=1e8,t="GB"):e>=1e5?(e/=1e5,t="MB"):e>=100?(e/=100,t="KB"):(e=10*e,t="b"),"<strong>"+Math.round(e)/10+"</strong> "+t},t.prototype._updateMaxFilesReachedClass=function(){return this.options.maxFiles&&this.getAcceptedFiles().length>=this.options.maxFiles?this.element.classList.add("dz-max-files-reached"):this.element.classList.remove("dz-max-files-reached")},t.prototype.drop=function(e){var t,i;e.dataTransfer&&(this.emit("drop",e),t=e.dataTransfer.files,this.emit("selectedfiles",t),t.length&&(i=e.dataTransfer.items,i&&i.length&&(null!=i[0].webkitGetAsEntry||null!=i[0].getAsEntry)?this.handleItems(i):this.handleFiles(t)))},t.prototype.handleFiles=function(e){var t,i,n,r;for(r=[],i=0,n=e.length;n>i;i++)t=e[i],r.push(this.addFile(t));return r},t.prototype.handleItems=function(e){var t,i,n,r;for(n=0,r=e.length;r>n;n++)i=e[n],null!=i.webkitGetAsEntry?(t=i.webkitGetAsEntry(),t.isFile?this.addFile(i.getAsFile()):t.isDirectory&&this.addDirectory(t,t.name)):this.addFile(i.getAsFile())},t.prototype.accept=function(e,i){return e.size>1024*1024*this.options.maxFilesize?i(this.options.dictFileTooBig.replace("{{filesize}}",Math.round(e.size/1024/10.24)/100).replace("{{maxFilesize}}",this.options.maxFilesize)):t.isValidFile(e,this.options.acceptedFiles)?this.options.maxFiles&&this.getAcceptedFiles().length>=this.options.maxFiles?(i(this.options.dictMaxFilesExceeded.replace("{{maxFiles}}",this.options.maxFiles)),this.emit("maxfilesexceeded",e)):this.options.accept.call(this,e,i):i(this.options.dictInvalidFileType)},t.prototype.addFile=function(e){var i=this;return e.upload={progress:0,total:e.size,bytesSent:0},this.files.push(e),e.status=t.ADDED,this.emit("addedfile",e),this.options.createImageThumbnails&&e.type.match(/image.*/)&&e.size<=1024*1024*this.options.maxThumbnailFilesize&&this.createThumbnail(e),this.accept(e,function(t){return t?(e.accepted=!1,i._errorProcessing([e],t)):i.enqueueFile(e)})},t.prototype.enqueueFiles=function(e){var t,i,n;for(i=0,n=e.length;n>i;i++)t=e[i],this.enqueueFile(t);return null},t.prototype.enqueueFile=function(e){var i=this;if(e.accepted=!0,e.status!==t.ADDED)throw new Error("This file can't be queued because it has already been processed or was rejected.");return e.status=t.QUEUED,this.options.autoProcessQueue?setTimeout(function(){return i.processQueue()},1):void 0},t.prototype.addDirectory=function(e,t){var i,n,r=this;return i=e.createReader(),n=function(i){var n,s;for(n=0,s=i.length;s>n;n++)e=i[n],e.isFile?e.file(function(e){return r.options.ignoreHiddenFiles&&"."===e.name.substring(0,1)?void 0:(e.fullPath=""+t+"/"+e.name,r.addFile(e))}):e.isDirectory&&r.addDirectory(e,""+t+"/"+e.name)},i.readEntries(n,function(e){return"undefined"!=typeof console&&null!==console?"function"==typeof console.log?console.log(e):void 0:void 0})},t.prototype.removeFile=function(e){return e.status===t.UPLOADING&&this.cancelUpload(e),this.files=l(this.files,e),this.emit("removedfile",e),0===this.files.length?this.emit("reset"):void 0},t.prototype.removeAllFiles=function(e){var i,n,r,s;for(null==e&&(e=!1),s=this.files.slice(),n=0,r=s.length;r>n;n++)i=s[n],(i.status!==t.UPLOADING||e)&&this.removeFile(i);return null},t.prototype.createThumbnail=function(e){var t,i=this;return t=new FileReader,t.onload=function(){var n;return n=new Image,n.onload=function(){var t,r,s,o,l,a,p,u;return e.width=n.width,e.height=n.height,s=i.options.resize.call(i,e),null==s.trgWidth&&(s.trgWidth=i.options.thumbnailWidth),null==s.trgHeight&&(s.trgHeight=i.options.thumbnailHeight),t=document.createElement("canvas"),r=t.getContext("2d"),t.width=s.trgWidth,t.height=s.trgHeight,r.drawImage(n,null!=(l=s.srcX)?l:0,null!=(a=s.srcY)?a:0,s.srcWidth,s.srcHeight,null!=(p=s.trgX)?p:0,null!=(u=s.trgY)?u:0,s.trgWidth,s.trgHeight),o=t.toDataURL("image/png"),i.emit("thumbnail",e,o)},n.src=t.result},t.readAsDataURL(e)},t.prototype.processQueue=function(){var e,t,i,n;if(t=this.options.parallelUploads,i=this.getUploadingFiles().length,e=i,!(i>=t)&&(n=this.getQueuedFiles(),n.length>0)){if(this.options.uploadMultiple)return this.processFiles(n.slice(0,t-i));for(;t>e;){if(!n.length)return;this.processFile(n.shift()),e++}}},t.prototype.processFile=function(e){return this.processFiles([e])},t.prototype.processFiles=function(e){var i,n,r;for(n=0,r=e.length;r>n;n++)i=e[n],i.processing=!0,i.status=t.UPLOADING,this.emit("processing",i);return this.options.uploadMultiple&&this.emit("processingmultiple",e),this.uploadFiles(e)},t.prototype._getFilesWithXhr=function(e){var t,i;return i=function(){var i,n,r,s;for(r=this.files,s=[],i=0,n=r.length;n>i;i++)t=r[i],t.xhr===e&&s.push(t);return s}.call(this)},t.prototype.cancelUpload=function(e){var i,n,r,s,o,l,a;if(e.status===t.UPLOADING){for(n=this._getFilesWithXhr(e.xhr),r=0,o=n.length;o>r;r++)i=n[r],i.status=t.CANCELED;for(e.xhr.abort(),s=0,l=n.length;l>s;s++)i=n[s],this.emit("canceled",i);this.options.uploadMultiple&&this.emit("canceledmultiple",n)}else((a=e.status)===t.ADDED||a===t.QUEUED)&&(e.status=t.CANCELED,this.emit("canceled",e),this.options.uploadMultiple&&this.emit("canceledmultiple",[e]));return this.options.autoProcessQueue?this.processQueue():void 0},t.prototype.uploadFile=function(e){return this.uploadFiles([e])},t.prototype.uploadFiles=function(e){var n,r,s,o,l,a,p,u,d,c,h,m,f,v,g,y,F,E,b,w,z,x,L,k,C,A,D,T=this;for(g=new XMLHttpRequest,y=0,w=e.length;w>y;y++)n=e[y],n.xhr=g;g.open(this.options.method,this.options.url,!0),g.withCredentials=!!this.options.withCredentials,m=null,s=function(){var t,i,r;for(r=[],t=0,i=e.length;i>t;t++)n=e[t],r.push(T._errorProcessing(e,m||T.options.dictResponseError.replace("{{statusCode}}",g.status),g));return r},f=function(t){var i,r,s,o,l,a,p,u,d;if(null!=t)for(r=100*t.loaded/t.total,s=0,a=e.length;a>s;s++)n=e[s],n.upload={progress:r,total:t.total,bytesSent:t.loaded};else{for(i=!0,r=100,o=0,p=e.length;p>o;o++)n=e[o],(100!==n.upload.progress||n.upload.bytesSent!==n.upload.total)&&(i=!1),n.upload.progress=r,n.upload.bytesSent=n.upload.total;if(i)return}for(d=[],l=0,u=e.length;u>l;l++)n=e[l],d.push(T.emit("uploadprogress",n,r,n.upload.bytesSent));return d},g.onload=function(i){var n;if(e[0].status!==t.CANCELED&&4===g.readyState){if(m=g.responseText,g.getResponseHeader("content-type")&&~g.getResponseHeader("content-type").indexOf("application/json"))try{m=JSON.parse(m)}catch(r){i=r,m="Invalid JSON response from server."}return f(),200<=(n=g.status)&&300>n?T._finished(e,m,i):s()}},g.onerror=function(){return e[0].status!==t.CANCELED?s():void 0},h=null!=(k=g.upload)?k:g,h.onprogress=f,a={Accept:"application/json","Cache-Control":"no-cache","X-Requested-With":"XMLHttpRequest"},this.options.headers&&i(a,this.options.headers);for(o in a)l=a[o],g.setRequestHeader(o,l);if(r=new FormData,this.options.params){C=this.options.params;for(c in C)v=C[c],r.append(c,v)}for(F=0,z=e.length;z>F;F++)n=e[F],this.emit("sending",n,g,r);if(this.options.uploadMultiple&&this.emit("sendingmultiple",e,g,r),"FORM"===this.element.tagName)for(A=this.element.querySelectorAll("input, textarea, select, button"),E=0,x=A.length;x>E;E++)p=A[E],u=p.getAttribute("name"),d=p.getAttribute("type"),(!d||"checkbox"!==(D=d.toLowerCase())&&"radio"!==D||p.checked)&&r.append(u,p.value);for(b=0,L=e.length;L>b;b++)n=e[b],r.append(""+this.options.paramName+(this.options.uploadMultiple?"[]":""),n,n.name);return g.send(r)},t.prototype._finished=function(e,i,n){var r,s,o;for(s=0,o=e.length;o>s;s++)r=e[s],r.status=t.SUCCESS,this.emit("success",r,i,n),this.emit("complete",r);return this.options.uploadMultiple&&(this.emit("successmultiple",e,i,n),this.emit("completemultiple",e)),this.options.autoProcessQueue?this.processQueue():void 0},t.prototype._errorProcessing=function(e,i,n){var r,s,o;for(s=0,o=e.length;o>s;s++)r=e[s],r.status=t.ERROR,this.emit("error",r,i,n),this.emit("complete",r);return this.options.uploadMultiple&&(this.emit("errormultiple",e,i,n),this.emit("completemultiple",e)),this.options.autoProcessQueue?this.processQueue():void 0},t}(n),e.version="3.7.4-dev",e.options={},e.optionsForElement=function(t){return t.id?e.options[r(t.id)]:void 0},e.instances=[],e.forElement=function(e){if("string"==typeof e&&(e=document.querySelector(e)),null==(null!=e?e.dropzone:void 0))throw new Error("No Dropzone found for given element. This is probably because you're trying to access it before Dropzone had the time to initialize. Use the `init` option to setup any additional observers on your Dropzone.");return e.dropzone},e.autoDiscover=!0,e.discover=function(){var t,i,n,r,s,o;for(document.querySelectorAll?n=document.querySelectorAll(".dropzone"):(n=[],t=function(e){var t,i,r,s;for(s=[],i=0,r=e.length;r>i;i++)t=e[i],/(^| )dropzone($| )/.test(t.className)?s.push(n.push(t)):s.push(void 0);return s},t(document.getElementsByTagName("div")),t(document.getElementsByTagName("form"))),o=[],r=0,s=n.length;s>r;r++)i=n[r],e.optionsForElement(i)!==!1?o.push(new e(i)):o.push(void 0);return o},e.blacklistedBrowsers=[/opera.*Macintosh.*version\/12/i],e.isBrowserSupported=function(){var t,i,n,r,s;if(t=!0,window.File&&window.FileReader&&window.FileList&&window.Blob&&window.FormData&&document.querySelector)if("classList"in document.createElement("a"))for(s=e.blacklistedBrowsers,n=0,r=s.length;r>n;n++)i=s[n],i.test(navigator.userAgent)&&(t=!1);else t=!1;else t=!1;return t},l=function(e,t){var i,n,r,s;for(s=[],n=0,r=e.length;r>n;n++)i=e[n],i!==t&&s.push(i);return s},r=function(e){return e.replace(/[\-_](\w)/g,function(e){return e[1].toUpperCase()})},e.createElement=function(e){var t;return t=document.createElement("div"),t.innerHTML=e,t.childNodes[0]},e.elementInside=function(e,t){if(e===t)return!0;for(;e=e.parentNode;)if(e===t)return!0;return!1},e.getElement=function(e,t){var i;if("string"==typeof e?i=document.querySelector(e):null!=e.nodeType&&(i=e),null==i)throw new Error("Invalid `"+t+"` option provided. Please provide a CSS selector or a plain HTML element.");return i},e.getElements=function(e,t){var i,n,r,s,o,l,a,p;if(e instanceof Array){r=[];try{for(s=0,l=e.length;l>s;s++)n=e[s],r.push(this.getElement(n,t))}catch(u){i=u,r=null}}else if("string"==typeof e)for(r=[],p=document.querySelectorAll(e),o=0,a=p.length;a>o;o++)n=p[o],r.push(n);else null!=e.nodeType&&(r=[e]);if(null==r||!r.length)throw new Error("Invalid `"+t+"` option provided. Please provide a CSS selector, a plain HTML element or a list of those.");return r},e.confirm=function(e,t,i){return window.confirm(e)?t():null!=i?i():void 0},e.isValidFile=function(e,t){var i,n,r,s,o;if(!t)return!0;for(t=t.split(","),n=e.type,i=n.replace(/\/.*$/,""),s=0,o=t.length;o>s;s++)if(r=t[s],r=r.trim(),"."===r.charAt(0)){if(-1!==e.name.toLowerCase().indexOf(r.toLowerCase(),e.name.length-r.length))return!0}else if(/\/\*$/.test(r)){if(i===r.replace(/\/.*$/,""))return!0}else if(n===r)return!0;return!1},"undefined"!=typeof jQuery&&null!==jQuery&&(jQuery.fn.dropzone=function(t){return this.each(function(){return new e(this,t)})}),"undefined"!=typeof i&&null!==i?i.exports=e:window.Dropzone=e,e.ADDED="added",e.QUEUED="queued",e.ACCEPTED=e.QUEUED,e.UPLOADING="uploading",e.PROCESSING=e.UPLOADING,e.CANCELED="canceled",e.ERROR="error",e.SUCCESS="success",s=function(e,t){var i,n,r,s,o,l,a,p,u;if(r=!1,u=!0,n=e.document,p=n.documentElement,i=n.addEventListener?"addEventListener":"attachEvent",a=n.addEventListener?"removeEventListener":"detachEvent",l=n.addEventListener?"":"on",s=function(i){return"readystatechange"!==i.type||"complete"===n.readyState?(("load"===i.type?e:n)[a](l+i.type,s,!1),!r&&(r=!0)?t.call(e,i.type||i):void 0):void 0},o=function(){var e;try{p.doScroll("left")}catch(t){return e=t,setTimeout(o,50),void 0}return s("poll")},"complete"!==n.readyState){if(n.createEventObject&&p.doScroll){try{u=!e.frameElement}catch(d){}u&&o()}return n[i](l+"DOMContentLoaded",s,!1),n[i](l+"readystatechange",s,!1),e[i](l+"load",s,!1)}},e._autoDiscoverFunction=function(){return e.autoDiscover?e.discover():void 0},s(window,e._autoDiscoverFunction)}.call(this)}),e.alias("component-emitter/index.js","dropzone/deps/emitter/index.js"),e.alias("component-emitter/index.js","emitter/index.js"),"object"==typeof exports?module.exports=e("dropzone"):"function"==typeof define&&define.amd?define(function(){return e("dropzone")}):this.Dropzone=e("dropzone")}();