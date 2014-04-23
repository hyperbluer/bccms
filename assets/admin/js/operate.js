var operate = function () {

    return {

        //main function to initiate the module
        init: function () {
            $.fn.modalmanager.defaults.resize = true;
	        $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner fade" style="width: 200px; margin-left: -100px;"><img src="'+ASSETS_ADMIN_PATH+'img/ajax-modal-loading.gif" align="middle">&nbsp;<span style="font-weight:300; color: #eee; font-size: 18px; font-family:Open Sans;">&nbsp;加载中...</div>';
        },

        //异步请求弹出modal框
        ajaxModal: function (obj) {
            var $modal = $('#ajax-modal');
            var url = obj.attr('data-url');
            $('body').modalmanager('loading');

            setTimeout(function(){
                $modal.load(url, '', function(){
                    $modal.modal();
                });
            }, 1000);
        },

        //删除
        deleteModal: function (obj) {
            var $modal = $('#modal-delete');
            var url = obj.attr('data-url');
            $modal.modal('show').on('shown',function(){
                $modal.find(".modal-footer .red").attr('href',url);
            })
        }

    };

}();