/**
 * Created by David on 1/23/14.
 */

define([

], function(dom){

    var oldText = {};

    return {
        setText: function(id, text){
            var node = dom.byId(id);
            oldText[id] = node.innerHTML;
            node.innerHTML = text;
        },
        restoreText: function(id){
            var node = dom.byId(id);
            node.innerHTML = oldText[id];
            delete oldText[id];
        }
    };
});
