YUI.add('moodle-block_zendesk-zendesk', function (Y, NAME) {

M.block_zendesk = M.block_zendesk || {};
var NS = M.block_zendesk.zendesk = {};

NS.init = function(params) {
    
    // NS.params = params;
    
    Y.Get.js('//assets.zendesk.com/external/zenbox/v2.6/zenbox.js', {
        timeout: 1000,
        async: true,
        onSuccess: function() {
            NS.activateZenbox(params);
        }
    });
    
    Y.Get.css('//assets.zendesk.com/external/zenbox/v2.6/zenbox.css', {
        timeout: 1000,
        async: true
    });
};



NS.activateZenbox = function (params) {
    console.log(params);
    if (typeof(Zenbox) !== "undefined") {
        Zenbox.init({
            dropboxID:   params.id,
            url:         params.domain,
            tabTooltip:  params.label,
            tabColor:    params.colour,
            tabPosition: params.h_position,
            
            tabImageURL: "https://p1.zdassets.com/external/zenbox/images/tab_help.png",
            
            requester_name:  params.user.firstname + " " + params.user.lastname,
            requester_email: params.user.email
        });
        
        var sheet = new Y.StyleSheet();
        sheet.set("#zenbox_tab", { top: params.v_position+"%" });
    }
};




}, '@VERSION@', {"requires": ["base", "node", "stylesheet"]});
