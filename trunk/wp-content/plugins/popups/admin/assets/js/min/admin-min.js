var spu={rules:null};SPU_ADMIN=function($){function t(t){"percentage"==t||"visible"==t?$("tr.auto_hide").fadeIn("fast"):$("tr.auto_hide").fadeOut("fast")}function e(t,e){return t.val()?parseInt(t.val()):void 0!==e?e+"px":0}function r(t,e){return t.val().length>0?t.wpColorPicker("color"):void 0!==e?e:""}function n(){var t=$("#content_ifr").contents().find("html");t.trigger("spu_tinymce_init"),t.css({background:"#9C9B9B;"}),("undefined"==typeof spup_js||""==$("#spu_optin").val())&&(t.find(".spu-fields-container").remove(),t.find("#tinymce").css({padding:"25px","background-color":r($("#spu-background-color")),"border-color":r($("#spu-border-color")),"border-width":e($("#spu-border-width")),"border-style":"solid",width:$("#spu-width").val(),color:r($("#spu-color")),height:"auto","min-width":"200px","max-width":"100%",margin:"8px auto 0;"}))}return $(document).ready(function(){spu.rules.init();var e=$("#spu-appearance input.spu-color-field"),r=$("#spu_optin");!e.length||r.length&&""!=r.val()||e.wpColorPicker({change:n,clear:n}),$("#spu-appearance :input").not(".spu-color-field").change(n),t($("#spu_trigger").val()),$("#spu_trigger").change(function(){t($(this).val())})}),spu.rules={$el:null,init:function(){var t=this;t.$el=$("#spu-rules"),t.$el.on("click",".rules-add-rule",function(){return t.add_rule($(this).closest("tr")),!1}),t.$el.on("click",".rules-remove-rule",function(){return t.remove_rule($(this).closest("tr")),!1}),t.$el.on("click",".rules-add-group",function(){return t.add_group(),!1}),t.$el.on("change",".param select",function(){var t=$(this).closest("tr"),e=t.attr("data-id"),r=t.closest(".rules-group"),n=r.attr("data-id"),a={action:"spu/field_group/render_rules",nonce:spu_js.nonce,rule_id:e,group_id:n,value:"",param:$(this).val()},i=$('<div class="spu-loading"><img src="'+spu_js.admin_url+'/images/wpspin_light.gif"/> </div>');t.find("td.value").html(i),$.ajax({url:ajaxurl,data:a,type:"post",dataType:"html",success:function(t){i.replaceWith(t)}})})},add_rule:function(t){var e=t.clone(),r=e.attr("data-id"),n="rule_"+(parseInt(r.replace("rule_",""),10)+1);return e.find("[name]").each(function(){$(this).attr("name",$(this).attr("name").replace(r,n)),$(this).attr("id",$(this).attr("id").replace(r,n))}),e.attr("data-id",n),t.after(e),!1},remove_rule:function(t){var e=t.siblings("tr").length;0==e?this.remove_group(t.closest(".rules-group")):t.remove()},add_group:function(){var t=this.$el.find(".rules-group:last"),e=t.clone(),r=e.attr("data-id"),n="group_"+(parseInt(r.replace("group_",""),10)+1);e.find("[name]").each(function(){$(this).attr("name",$(this).attr("name").replace(r,n)),$(this).attr("id",$(this).attr("id").replace(r,n))}),e.attr("data-id",n),e.find("h4").text(spu_js.l10n.or),e.find("tr:not(:first)").remove(),t.after(e)},remove_group:function(t){t.remove()}},{onTinyMceInit:function(){n()}}}(jQuery);