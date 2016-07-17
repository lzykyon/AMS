(function (global, factory) {
    if (typeof exports === "object" && exports) {
        factory(exports); // CommonJS
    } else if (typeof define === "function" && define.amd) {
        define(['exports'], factory); // AMD
    } else {
        factory(global.jkbms = {}); // <script>
    }
}(this, function (fw) {

    /*========== Verson ==========*/
    fw.name = "jkbms.js";
    fw.version = "1.0.0";
    /*========== Verson ==========*/

    fw.getUrlParam = function (name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
        var r = window.location.search.substr(1).match(reg);  //匹配目标参数
        if (r != null)
            return unescape(r[2]);
        return null; //返回参数值
    }

    fw.trim = function (text) {
        return text.replace(/(^\s*)|(\s*$)/g, "");
    }

    fw.alert = function (text) {
        $.zui.messager.show(text, { time: 3000, placement: 'center', type: 'primary', close: true });
    };

    fw.confirm = function (text, settings) {
        var template = '<div class="modal" id="modal_confirm" data-backdrop="static" data-keyboard="true" data-show="false"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-body">' +
            '<div class="text-center padding-15">{{.}}</div>' +
            '</div><div class="modal-footer"><div class="text-center">' +
            '<input type="button" class="btn btn-primary" value="确定" id="modal_confirm_ok" />' +
            '<input type="button" class="btn btn-default" value="取消" id="modal_confirm_cancel" />' +
            '</div></div></div></div></div>';
        $('#confirm_contain').html(ht.tmpl.render({ Model: text }, template));
        $('#modal_confirm_cancel').click(function () {
            settings && settings.cancel && settings.cancel();
            $('#modal_confirm', '#confirm_contain').modal('hide');
        });
        $('#modal_confirm_ok').click(function () {
            settings && settings.confirm && settings.confirm();
            $('#modal_confirm', '#confirm_contain').modal('hide');
        });
        $('#modal_confirm', '#confirm_contain').on('shown.zui.modal', function () {
            $('#modal_confirm_ok', '#confirm_contain').focus();
        });
        $('#modal_confirm', '#confirm_contain').modal('show');
    };

    var md = new Modal();
    function Modal() {
        this.$target = null;
    };
    Modal.prototype.show = function (target) {
        this.hide();
        this.$target = $(target);
        this.$target.modal('show');
    };
    Modal.prototype.hide = function () {
        if (this.$target)
            this.$target.modal('hide');
        $('.modal-backdrop').remove();
        this.$target = null;
    };
    fw.modal = md;

    /*========== Loading ==========*/
    var loading = new Loading();
    function Loading() {
        this.$target = null;
        this.timeout = null;
        this.count = 0;
    }
    Loading.prototype.show = function () {
        this.count++;
        //if (!this.$target.is(':hidden'))
        //    return;
        if (this.timeout)
            clearTimeout(this.timeout);
        this.$target.show();
    };
    Loading.prototype.hide = function () {
        this.count--;
        if (this.count < 0)
            this.count = 0;

        if (this.count == 0)
            this.timeout = setTimeout(this._hide, 250);
    };
    Loading.prototype._hide = function () {
        loading.$target.hide();
        loading.timeout = null;
    };
    Loading.prototype.init = function (target) {
        this.$target = $(target);
    };
    fw.loading = loading;
    /*========== Loading ==========*/

    /*========== AjaxLoad ==========*/
    var ajaxload = new AjaxLoad();

    function AjaxLoad() {

    }
    AjaxLoad.prototype.requestcallbacks = {
        before: function (args) { },
        after: function (args) { }
    };
    AjaxLoad.prototype.build = function (eleID, actionUrl, data, callbacks) {
        ajaxload.requestcallbacks && ajaxload.requestcallbacks.before && ajaxload.requestcallbacks.before({ eleID: eleID, actionUrl: actionUrl, data: data, callbacks: callbacks });
        var ajaxType='json';
        if(eleID){
        	ajaxType='html';
        }
        $.post(actionUrl, data ? data : {}, function (result) {
            if (!result) return;

            var exception = null;
            var viewResults = null;
            try {
                viewResults = result;
            } catch (ex) {
                exception = ex;
            }
            ajaxload.requestcallbacks && ajaxload.requestcallbacks.after && ajaxload.requestcallbacks.after({ eleID: eleID, actionUrl: actionUrl, data: data, callbacks: callbacks, exception: exception, viewResults: viewResults });
        },ajaxType);
        //ajaxload.requestcallbacks && ajaxload.requestcallbacks.after && ajaxload.requestcallbacks.after({ eleID: eleID, actionUrl: actionUrl, data: data, callbacks: callbacks });
    };

    fw.ajaxload = ajaxload;

    fw.r = ajaxload.build;
    /*========== AjaxLoad ==========*/
}));