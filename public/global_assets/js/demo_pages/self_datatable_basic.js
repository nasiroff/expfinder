/*
var DatatableBasic = function() {
    var _componentDatatableBasic = function() {

        let baseUrl = window.location.origin+'/';

        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: 100,
                targets: [ 5 ]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });

        let dt = $('.datatable-basic').DataTable({
            "columnDefs": [
                { "width": "20px", "targets": 0 },
                { "width": "100px", "targets": 1 },
                { "width": "100px", "targets": 2 },
                { "width": "200px", "targets": 3 },
                { "width": "50px", "targets": 4 },
                { "width": "70px", "targets": 5 },
                { "width": "70px", "targets": 6 },
                { "width": "20px", "targets": 7 },
                { "width": "20px", "targets": 8 }
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Azerbaijan.json",
                searchPlaceholder: "Axtarış etmək üçün yazın..."
            },
            "processing": true,
            "serverSide": true,
            "ajax": "admin/server-side",
            "columns": [
                {"data": "id"},
                {"data": "name"},
                {"data": "title"},
                {"data": "description"},
                {"data": "price"},
                {"data": "full_name"},
                {"data": "status"},
                {"data": "created_at"},
                {"data": "action", 'orderable': false,
                    "render": function (data, type, full, meta) {
                        return '<div class="list-icons">\n' +
                            '                                            <div class="dropdown">\n' +
                            '                                                <a href="javascript:;" class="list-icons-item" data-toggle="dropdown">\n' +
                            '                                                    <i class="icon-menu9"></i>\n' +
                            '                                                </a>\n' +
                            '\n' +
                            '                                                <div class="dropdown-menu dropdown-menu-right">\n' +
                            '                                                    <button type="button" onclick="openDialogBox(\''+(baseUrl+'admin/product/'+full.id)+'\')" class="dropdown-item"><i class="icon-design"></i>\n' +
                            '                                                        Bax və dəyiş</button>\n' +
                            '                                                    <form action="" method="POST"> <input type="hidden" name="_method" value="DELETE"><button type="submit" href="' + (baseUrl + 'admin/product/' + full.id) + '" class="dropdown-item"><i class="icon-trash"></i>\n' +
                            '                                                        Sil</button></form>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n' +
                            '                                        </div>';
                    }
                }
            ]
        });

    };


    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };


    return {
        init: function() {
            _componentDatatableBasic();
            _componentSelect2();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    DatatableBasic.init();
});
*/
