$.Isotope.prototype._getCenteredMasonryColumns=function(){this.width=this.element.width();var t=this.element.parent().width(),e=this.options.masonry&&this.options.masonry.columnWidth||this.$filteredAtoms.outerWidth(!0)||t,o=Math.floor(t/e);o=Math.max(o,1),this.masonry.cols=o,this.masonry.columnWidth=e},$.Isotope.prototype._masonryReset=function(){this.masonry={},this._getCenteredMasonryColumns();var t=this.masonry.cols;for(this.masonry.colYs=[];t--;)this.masonry.colYs.push(0)},$.Isotope.prototype._masonryResizeChanged=function(){var t=this.masonry.cols;return this._getCenteredMasonryColumns(),this.masonry.cols!==t},$.Isotope.prototype._masonryGetContainerSize=function(){for(var t=0,e=this.masonry.cols;--e&&0===this.masonry.colYs[e];)t++;return{height:Math.max.apply(Math,this.masonry.colYs),width:(this.masonry.cols-t)*this.masonry.columnWidth}},$(function(){var t=$("#container");t.find(".element").each(function(){var t=$(this),e=parseInt(t.find(".number").text(),10);1===e%7%2&&t.addClass("width2"),0===e%3&&t.addClass("height2")}),t.isotope({itemSelector:".element",masonry:{columnWidth:120},getSortData:{symbol:function(t){return t.attr("data-symbol")},category:function(t){return t.attr("data-category")},number:function(t){return parseInt(t.find(".number").text(),10)},weight:function(t){return parseFloat(t.find(".weight").text().replace(/[\(\)]/g,""))},name:function(t){return t.find(".name").text()}}});var e=$("#options .option-set"),o=e.find("a");o.click(function(){var e=$(this);if(e.hasClass("selected"))return!1;var o=e.parents(".option-set");o.find(".selected").removeClass("selected"),e.addClass("selected");var n={},s=o.attr("data-option-key"),a=e.attr("data-option-value");return a="false"===a?!1:a,n[s]=a,"layoutMode"===s&&"function"==typeof changeLayoutMode?changeLayoutMode(e,n):t.isotope(n),!1}),$("#insert a").click(function(){var e=$(fakeElement.getGroup());return t.isotope("insert",e),!1}),$("#append a").click(function(){var e=$(fakeElement.getGroup());return t.append(e).isotope("appended",e),!1}),t.delegate(".element","click",function(){$(this).toggleClass("large"),t.isotope("reLayout")}),$("#toggle-sizes").find("a").click(function(){return t.toggleClass("variable-sizes").isotope("reLayout"),!1});var n=$("#sort-by");$("#shuffle a").click(function(){return t.isotope("shuffle"),n.find(".selected").removeClass("selected"),n.find('[data-option-value="random"]').addClass("selected"),!1})});