/* ===========================================================
 * bootstrap-fileupload.js j2
 * http://jasny.github.com/bootstrap/javascript.html#fileupload
 * ===========================================================
 * Copyright 2012 Jasny BV, Netherlands.
 *
 * Licensed under the Apache License, Version 2.0 (the "License")
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */
!function(e){"use strict";var i=function(i){if(this.$element=e(i),this.type=this.$element.data("uploadtype")||(this.$element.find(".img-thumbnail").length>0?"image":"file"),this.$input=this.$element.find(":file"),0!==this.$input.length){this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),0===this.$hidden.length&&(this.$hidden=e('<input type="hidden" />'),this.$element.prepend(this.$hidden)),this.$preview=this.$element.find(".fileupload-preview");var t=this.$preview.css("height");"inline"!=this.$preview.css("display")&&"0px"!=t&&"none"!=t&&this.$preview.css("line-height",t),this.original={exists:this.$element.hasClass("fileupload-exists"),preview:this.$preview.html(),hiddenVal:this.$hidden.val()},this.$remove=this.$element.find('[data-dismiss="fileupload"]'),this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",e.proxy(this.trigger,this)),this.listen()}};i.prototype={listen:function(){this.$input.on("change.fileupload",e.proxy(this.change,this)),e(this.$input[0].form).on("reset.fileupload",e.proxy(this.reset,this)),this.$remove&&this.$remove.on("click.fileupload",e.proxy(this.clear,this))},change:function(i,t){if("clear"!==t){var s=void 0!==i.target.files?i.target.files[0]:i.target.value?{name:i.target.value.replace(/^.+\\/,"")}:null;if(!s)return this.clear(),void 0;if(this.$hidden.val(""),this.$hidden.attr("name",""),this.$input.attr("name",this.name),"image"===this.type&&this.$preview.length>0&&("undefined"!=typeof s.type?s.type.match("image.*"):s.name.match(/\.(gif|png|jpe?g)$/i))&&"undefined"!=typeof FileReader){var a=new FileReader,l=this.$preview,n=this.$element;console.log(l.css("max-height")),a.onload=function(i){l.html('<img src="'+i.target.result+'" class="img-responsive" />'),n.addClass("fileupload-exists").removeClass("fileupload-new"),e(n).trigger("imagechange")},a.readAsDataURL(s)}else this.$preview.text(s.name),this.$element.addClass("fileupload-exists").removeClass("fileupload-new")}},clear:function(e){if(this.$hidden.val(""),this.$hidden.attr("name",this.name),this.$input.attr("name",""),navigator.userAgent.match(/msie/i)){var i=this.$input.clone(!0);this.$input.after(i),this.$input.remove(),this.$input=i}else this.$input.val("");this.$preview.html(""),this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),e&&(this.$input.trigger("change",["clear"]),e.preventDefault())},reset:function(){this.clear(),this.$hidden.val(this.original.hiddenVal),this.$preview.html(this.original.preview),this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")},trigger:function(e){this.$input.trigger("click"),e.preventDefault()}},e.fn.fileupload=function(t){return this.each(function(){var s=e(this),a=s.data("fileupload");a||s.data("fileupload",a=new i(this,t)),"string"==typeof t&&a[t]()})},e.fn.fileupload.Constructor=i,e(document).on("click.fileupload.data-api",'[data-provides="fileupload"]',function(i){var t=e(this);if(!t.data("fileupload")){t.fileupload(t.data());var s=e(i.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');s.length>0&&(s.trigger("click.fileupload"),i.preventDefault())}})}(window.jQuery);