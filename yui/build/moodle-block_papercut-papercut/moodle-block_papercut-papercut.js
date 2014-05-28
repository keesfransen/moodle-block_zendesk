YUI.add('moodle-block_papercut-papercut', function (Y, NAME) {

M.block_papercut = M.block_papercut || {};
var NS = M.block_papercut.papercut = {};

NS.init = function() {
    Y.Get.js('http://10.10.10.54:9191/rpc/api/web/user/tinay/details.js',
        {
            timeout: 1000,
            async: true,
            onFailure: function() {
                NS.writeError();
            },
            onSuccess: function() {
                NS.writeUser();
            }
        });
};

NS.writeError = function() {
    Y.one('#papercut').ancestor().setHTML('<p>PaperCut credit could not be displayed</p>');
};

listPre = '<ul>';
listPost = '</ul>';

NS.writeUser = function() {
    if (pcUserDetails) {
        Y.one('#papercut').setHTML(
            '<li><strong>Available Credit: </strong>' + pcUserDetails.balanceFormatted + '</li>' +
            '<li><strong>Trees Used: </strong>' + Y.Number.format(pcUserDetails.environmentalImpact.trees, {decimalPlaces: 2})+ '</li>');
    }
    
};



}, '@VERSION@', {"requires": ["base", "node", "datatype-number-format"]});
