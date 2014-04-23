var TableManaged = function () {

    return {

        //main function to initiate the module
        init: function () {
            
            if (!jQuery().dataTable) {
                return;
            }
            // begin second table
            $('#table_managed_2').dataTable({
                "aLengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 10,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "每页显示 _MENU_ 条",
                    "oPaginate": {
                        "sPrevious": "上一页",
                        "sNext": "下一页"
                    },
                    "sInfo": "_START_/_END_ 总共_TOTAL_条记录",
                    "sInfoEmpty": "0/0 共0条记录",
                    "sSearch": "搜索:",
                    "sZeroRecords": "未找到相匹配的记录",
                    "sInfoFiltered": "(从_MAX_条记录筛选)"
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#table_managed_2 .group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                    } else {
                        $(this).attr("checked", false);
                    }
                });
                jQuery.uniform.update(set);
            });

            jQuery('#table_managed_2_wrapper .dataTables_filter input').addClass("m-wrap small"); // modify table search input
            jQuery('#table_managed_2_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
            jQuery('#table_managed_2_wrapper .dataTables_length select').select2(); // initialzie select2 dropdown

        }

    };

}();