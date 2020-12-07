/**
* @version: 1.0.1
* @author: Dan Grossman http://www.dangrossman.info/
* @date: 2012-08-20
* @copyright: Copyright (c) 2012 Dan Grossman. All rights reserved.
* @license: Licensed under Apache License v2.0. See http://www.apache.org/licenses/LICENSE-2.0
* @website: http://www.improvely.com/
*/
!function(t){var e=function(e,a,s){var i,n="object"==typeof a;this.startDate=Date.today(),this.endDate=Date.today(),this.minDate=!1,this.maxDate=!1,this.changed=!1,this.ranges={},this.opens="right",this.cb=function(){},this.format="MM/dd/yyyy",this.separator=" - ",this.showWeekNumbers=!1,this.buttonClasses=["btn-success"],this.locale={applyLabel:"Apply",fromLabel:"From",toLabel:"To",weekLabel:"W",customRangeLabel:"Custom Range",daysOfWeek:Date.CultureInfo.shortestDayNames,monthNames:Date.CultureInfo.monthNames,firstDay:0},i=this.locale,this.leftCalendar={month:Date.today().set({day:1,month:this.startDate.getMonth(),year:this.startDate.getFullYear()}),calendar:Array()},this.rightCalendar={month:Date.today().set({day:1,month:this.endDate.getMonth(),year:this.endDate.getFullYear()}),calendar:Array()},this.parentEl="body",this.element=t(e),this.element.hasClass("pull-right")&&(this.opens="left"),this.element.is("input")?this.element.on({click:t.proxy(this.show,this),focus:t.proxy(this.show,this)}):this.element.on("click",t.proxy(this.show,this)),n&&"object"==typeof a.locale&&t.each(i,function(t,e){i[t]=a.locale[t]||e});var r='<div class="daterangepicker dropdown-menu"><div class="calendar left"></div><div class="calendar right"></div><div class="ranges"><div class="range_inputs"><div><label for="daterangepicker_start">'+this.locale.fromLabel+"</label>"+'<input class="m-wrap input-sm form-control" type="text" name="daterangepicker_start" value="" disabled="disabled" />'+"</div>"+"<div>"+'<label for="daterangepicker_end">'+this.locale.toLabel+"</label>"+'<input class="m-wrap input-sm form-control" type="text" name="daterangepicker_end" value="" disabled="disabled" />'+"</div>"+'<button class="btn " disabled="disabled">'+this.locale.applyLabel+"</button>"+"</div>"+"</div>"+"</div>";if(this.parentEl=n&&a.parentEl&&t(a.parentEl)||t(this.parentEl),this.container=t(r).appendTo(this.parentEl),n){if("string"==typeof a.format&&(this.format=a.format),"string"==typeof a.separator&&(this.separator=a.separator),"string"==typeof a.startDate&&(this.startDate=Date.parse(a.startDate,this.format)),"string"==typeof a.endDate&&(this.endDate=Date.parse(a.endDate,this.format)),"string"==typeof a.minDate&&(this.minDate=Date.parse(a.minDate,this.format)),"string"==typeof a.maxDate&&(this.maxDate=Date.parse(a.maxDate,this.format)),"object"==typeof a.startDate&&(this.startDate=a.startDate),"object"==typeof a.endDate&&(this.endDate=a.endDate),"object"==typeof a.minDate&&(this.minDate=a.minDate),"object"==typeof a.maxDate&&(this.maxDate=a.maxDate),"object"==typeof a.ranges){for(var h in a.ranges){var o=a.ranges[h][0],l=a.ranges[h][1];"string"==typeof o&&(o=Date.parse(o)),"string"==typeof l&&(l=Date.parse(l)),this.minDate&&o<this.minDate&&(o=this.minDate),this.maxDate&&l>this.maxDate&&(l=this.maxDate),this.minDate&&l<this.minDate||this.maxDate&&o>this.maxDate||(this.ranges[h]=[o,l])}var d="<ul>";for(var h in this.ranges)d+="<li>"+h+"</li>";d+="<li>"+this.locale.customRangeLabel+"</li>",d+="</ul>",this.container.find(".ranges").prepend(d)}if("object"==typeof a.locale&&"number"==typeof a.locale.firstDay){this.locale.firstDay=a.locale.firstDay;for(var c=a.locale.firstDay;c>0;)this.locale.daysOfWeek.push(this.locale.daysOfWeek.shift()),c--}"string"==typeof a.opens&&(this.opens=a.opens),"boolean"==typeof a.showWeekNumbers&&(this.showWeekNumbers=a.showWeekNumbers),"string"==typeof a.buttonClasses&&(this.buttonClasses=[a.buttonClasses]),"object"==typeof a.buttonClasses&&(this.buttonClasses=a.buttonClasses)}var f=this.container;if(t.each(this.buttonClasses,function(t,e){f.find("button").addClass(e)}),"right"==this.opens){var p=this.container.find(".calendar.left"),m=this.container.find(".calendar.right");p.removeClass("left").addClass("right"),m.removeClass("right").addClass("left")}("undefined"==typeof a||"undefined"==typeof a.ranges)&&this.container.find(".calendar").show(),"function"==typeof s&&(this.cb=s),this.container.addClass("opens"+this.opens),this.container.on("mousedown",t.proxy(this.mousedown,this)),this.container.find(".calendar").on("click",".prev",t.proxy(this.clickPrev,this)),this.container.find(".calendar").on("click",".next",t.proxy(this.clickNext,this)),this.container.find(".ranges").on("click","button",t.proxy(this.clickApply,this)),this.container.find(".calendar").on("click","td.available",t.proxy(this.clickDate,this)),this.container.find(".calendar").on("mouseenter","td.available",t.proxy(this.enterDate,this)),this.container.find(".calendar").on("mouseleave","td.available",t.proxy(this.updateView,this)),this.container.find(".ranges").on("click","li",t.proxy(this.clickRange,this)),this.container.find(".ranges").on("mouseenter","li",t.proxy(this.enterRange,this)),this.container.find(".ranges").on("mouseleave","li",t.proxy(this.updateView,this)),this.element.on("keyup",t.proxy(this.updateFromControl,this)),this.updateView(),this.updateCalendars()};e.prototype={constructor:e,mousedown:function(t){t.stopPropagation(),t.preventDefault()},updateView:function(){this.leftCalendar.month.set({month:this.startDate.getMonth(),year:this.startDate.getFullYear()}),this.rightCalendar.month.set({month:this.endDate.getMonth(),year:this.endDate.getFullYear()}),this.container.find("input[name=daterangepicker_start]").val(this.startDate.toString(this.format)),this.container.find("input[name=daterangepicker_end]").val(this.endDate.toString(this.format)),this.startDate.equals(this.endDate)||this.startDate.isBefore(this.endDate)?this.container.find("button").removeAttr("disabled"):this.container.find("button").attr("disabled","disabled")},updateFromControl:function(){if(this.element.is("input")){var t=this.element.val().split(this.separator),e=Date.parseExact(t[0],this.format),a=Date.parseExact(t[1],this.format);null!=e&&null!=a&&(a.isBefore(e)||(this.startDate=e,this.endDate=a,this.updateView(),this.cb(this.startDate,this.endDate),this.updateCalendars()))}},notify:function(){this.updateView(),this.element.is("input")&&this.element.val(this.startDate.toString(this.format)+this.separator+this.endDate.toString(this.format)),this.cb(this.startDate,this.endDate)},move:function(){var e={top:this.parentEl.offset().top-this.parentEl.scrollTop(),left:this.parentEl.offset().left-this.parentEl.scrollLeft()};"left"==this.opens?this.container.css({top:this.element.offset().top+this.element.outerHeight(),right:t(window).width()-this.element.offset().left-this.element.outerWidth()-e.left,left:"auto"}):this.container.css({top:this.element.offset().top+this.element.outerHeight(),left:this.element.offset().left-e.left,right:"auto"})},show:function(e){this.container.show(),this.move(),e&&(e.stopPropagation(),e.preventDefault()),this.changed=!1,t(document).on("mousedown",t.proxy(this.hide,this))},hide:function(){this.container.hide(),t(document).off("mousedown",this.hide),this.changed&&(this.changed=!1,this.notify())},enterRange:function(t){var e=t.target.innerHTML;if(e==this.locale.customRangeLabel)this.updateView();else{var a=this.ranges[e];this.container.find("input[name=daterangepicker_start]").val(a[0].toString(this.format)),this.container.find("input[name=daterangepicker_end]").val(a[1].toString(this.format))}},clickRange:function(t){var e=t.target.innerHTML;if(e==this.locale.customRangeLabel)this.container.find(".calendar").show();else{var a=this.ranges[e];this.startDate=a[0],this.endDate=a[1],this.leftCalendar.month.set({month:this.startDate.getMonth(),year:this.startDate.getFullYear()}),this.rightCalendar.month.set({month:this.endDate.getMonth(),year:this.endDate.getFullYear()}),this.updateCalendars(),this.changed=!0,this.container.find(".calendar").hide(),this.hide()}},clickPrev:function(e){var a=t(e.target).parents(".calendar");a.hasClass("left")?this.leftCalendar.month.add({months:-1}):this.rightCalendar.month.add({months:-1}),this.updateCalendars()},clickNext:function(e){var a=t(e.target).parents(".calendar");a.hasClass("left")?this.leftCalendar.month.add({months:1}):this.rightCalendar.month.add({months:1}),this.updateCalendars()},enterDate:function(e){var a=t(e.target).attr("title"),s=a.substr(1,1),i=a.substr(3,1),n=t(e.target).parents(".calendar");n.hasClass("left")?this.container.find("input[name=daterangepicker_start]").val(this.leftCalendar.calendar[s][i].toString(this.format)):this.container.find("input[name=daterangepicker_end]").val(this.rightCalendar.calendar[s][i].toString(this.format))},clickDate:function(e){var a=t(e.target).attr("title"),s=a.substr(1,1),i=a.substr(3,1),n=t(e.target).parents(".calendar");n.hasClass("left")?(startDate=this.leftCalendar.calendar[s][i],endDate=this.endDate):(startDate=this.startDate,endDate=this.rightCalendar.calendar[s][i]),n.find("td").removeClass("active"),(startDate.equals(endDate)||startDate.isBefore(endDate))&&(t(e.target).addClass("active"),startDate.equals(this.startDate)&&endDate.equals(this.endDate)||(this.changed=!0),this.startDate=startDate,this.endDate=endDate),this.leftCalendar.month.set({month:this.startDate.getMonth(),year:this.startDate.getFullYear()}),this.rightCalendar.month.set({month:this.endDate.getMonth(),year:this.endDate.getFullYear()}),this.updateCalendars()},clickApply:function(){this.hide()},updateCalendars:function(){this.leftCalendar.calendar=this.buildCalendar(this.leftCalendar.month.getMonth(),this.leftCalendar.month.getFullYear()),this.rightCalendar.calendar=this.buildCalendar(this.rightCalendar.month.getMonth(),this.rightCalendar.month.getFullYear()),this.container.find(".calendar.left").html(this.renderCalendar(this.leftCalendar.calendar,this.startDate,this.minDate,this.endDate)),this.container.find(".calendar.right").html(this.renderCalendar(this.rightCalendar.calendar,this.endDate,this.startDate,this.maxDate))},buildCalendar:function(t,e){var a=Date.today().set({day:1,month:t,year:e}),s=a.clone().add(-1).day().getMonth(),i=a.clone().add(-1).day().getFullYear();Date.getDaysInMonth(e,t);for(var n=Date.getDaysInMonth(i,s),r=a.getDay(),h=Array(),o=0;6>o;o++)h[o]=Array();var l=n-r+this.locale.firstDay+1;l>n&&(l-=7),r==this.locale.firstDay&&(l=n-6);for(var d=Date.today().set({day:l,month:s,year:i}),o=0,c=0,f=0;42>o;o++,c++,d=d.clone().add(1).day())o>0&&0==c%7&&(c=0,f++),h[f][c]=d;return h},renderCalendar:function(e,a,s,i){var n='<table class="table-condensed">';n+="<thead>",n+="<tr>",this.showWeekNumbers&&(n+="<th></th>"),n+=!s||s<e[1][1]?'<th class="prev available"><i class="fa.fa-angle-left"></i></th>':"<th></th>",n+='<th colspan="5" style="width: auto">'+this.locale.monthNames[e[1][1].getMonth()]+e[1][1].toString(" yyyy")+"</th>",n+=!i||i>e[1][1]?'<th class="next available"><i class="fa.fa-angle-right"></i></th>':"<th></th>",n+="</tr>",n+="<tr>",this.showWeekNumbers&&(n+='<th class="week">'+this.locale.weekLabel+"</th>"),t.each(this.locale.daysOfWeek,function(t,e){n+="<th>"+e+"</th>"}),n+="</tr>",n+="</thead>",n+="<tbody>";for(var r=0;6>r;r++){n+="<tr>",this.showWeekNumbers&&(n+='<td class="week">'+e[r][0].getWeek()+"</td>");for(var h=0;7>h;h++){var o="available ";o+=e[r][h].getMonth()==e[1][1].getMonth()?"":"off",a.setHours(0,0,0,0),s&&e[r][h]<s||i&&e[r][h]>i?o="off disabled":e[r][h].equals(a)&&(o+="active");var l="r"+r+"c"+h;n+='<td class="'+o+'" title="'+l+'">'+e[r][h].getDate()+"</td>"}n+="</tr>"}return n+="</tbody>",n+="</table>"}},t.fn.daterangepicker=function(a,s){return this.each(function(){var i=t(this);i.data("daterangepicker")||i.data("daterangepicker",new e(i,a,s))}),this}}(window.jQuery);