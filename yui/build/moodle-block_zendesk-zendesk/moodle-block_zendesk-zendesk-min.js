YUI.add("moodle-block_zendesk-zendesk",function(e,t){M.block_zendesk=M.block_zendesk||{};var n=M.block_zendesk.zendesk={};n.init=function(t){e.Get.js("//assets.zendesk.com/external/zenbox/v2.6/zenbox.js",{timeout:1e3,async:!0,onSuccess:function(){n.activateZenbox(t)}}),e.Get.css("//assets.zendesk.com/external/zenbox/v2.6/zenbox.css",{timeout:1e3,async:!0})},n.activateZenbox=function(t){console.log(t);if(typeof Zenbox!="undefined"){Zenbox.init({dropboxID:t.id,url:t.domain,tabTooltip:t.label,tabColor:t.colour,tabPosition:t.h_position,tabImageURL:"https://p1.zdassets.com/external/zenbox/images/tab_help.png",requester_name:t.user.firstname+" "+t.user.lastname,requester_email:t.user.email});var n=new e.StyleSheet;n.set("#zenbox_tab",{top:t.v_position+"%"})}}},"@VERSION@",{requires:["base","node","stylesheet"]});