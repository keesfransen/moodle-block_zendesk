YUI.add("moodle-block_papercut-papercut",function(e,t){M.block_papercut=M.block_papercut||{};var n=M.block_papercut.papercut={};n.init=function(){e.Get.js("http://10.10.10.54:9191/rpc/api/web/user/tinay/details.js",{timeout:1e3,async:!0,onFailure:function(){n.writeError()},onSuccess:function(){n.writeUser()}})},n.writeError=function(){e.one("#papercut").ancestor().setHTML("<p>PaperCut credit could not be displayed</p>")},listPre="<ul>",listPost="</ul>",n.writeUser=function(){pcUserDetails&&e.one("#papercut").setHTML("<li><strong>Available Credit: </strong>"+pcUserDetails.balanceFormatted+"</li>"+"<li><strong>Trees Used: </strong>"+e.Number.format(pcUserDetails.environmentalImpact.trees,{decimalPlaces:2})+"</li>")}},"@VERSION@",{requires:["base","node","datatype-number-format"]});
