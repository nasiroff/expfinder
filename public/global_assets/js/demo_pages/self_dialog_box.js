let origin = window.location.origin + "/";
$.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
        orderable: false,
        width: 100,
        targets: [5]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
        search: '<span>Filter:</span> _INPUT_',
        searchPlaceholder: 'Type to filter...',
        lengthMenu: '<span>Show:</span> _MENU_',
        paginate: {
            'first': 'First',
            'last': 'Last',
            'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
            'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
        }
    }
});

let dt = $('.datatable-basic').DataTable({
    defaults: {
        autoWidth: true
    },
    "columnDefs": [
        {"width": "20px", "targets": 0},
        {"width": "50px", "targets": 1},
        {"width": "50px", "targets": 2},
        {"width": "100px", "targets": 3},
        {"width": "30px", "targets": 4},
        {"width": "50px", "targets": 5},
        {"width": "50px", "targets": 6},
        {"width": "20px", "targets": 7},
    ],
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Azerbaijan.json",
        searchPlaceholder: "Axtarış etmək üçün yazın..."
    },
    "processing": true,
    "serverSide": true,
    "ajax": origin+"admin/product/server-side",
    "columns": [
        {"data": "id"},
        {"data": "category_name"},
        {"data": "brand_name"},
        {"data": "title"},
        {"data": "price"},
        {"data": "full_name"},
        {
            "data": "status", "render": function (data, type, full) {
                return `<span class="badge badge-${full.status == 1 ? 'success' : 'secondary'}">${full.status == 1 ? 'Aktiv' : 'Passiv'}</span>`
            }
        },
        {
            "data": "action", 'orderable': false,
            "render": function (data, type, full, meta) {
                return '<div class="list-icons">\n' +
                    '                                            <div class="dropdown">\n' +
                    '                                                <a href="javascript:;" class="list-icons-item" data-toggle="dropdown">\n' +
                    '                                                    <i class="icon-menu9"></i>\n' +
                    '                                                </a>\n' +
                    '\n' +
                    '                                                <div class="dropdown-menu dropdown-menu-right">\n' +
                    '                                                    <button type="button" onclick="openDialogBox(\'' + (origin + 'admin/product/' + full.id) + '\')" class="dropdown-item"><i class="icon-design"></i>\n' +
                    '                                                        Bax və dəyiş</button>\n' +
                    '                                                    <button type="button" onclick="deleteRow(\'' + (origin + 'admin/product/' + full.id) + '\')" class="dropdown-item"><i class="icon-trash"></i>\n' +
                    '                                                        Sil</button>' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>';
            }
        }
    ]
});


let dialog = $("#dialog-form").dialog({
    autoOpen: false,
    resizable: false,
    height: window.innerHeight - 50,
    width: '50%',
    modal: true,
    buttons: {},
    open: function () {
        $('.ui-widget-overlay').bind('click', function () {
            $('#dialog-form').dialog('close');
        })
    }
});


function confirmation(fun, params) {
    if (typeof fun === "function") {
        sweetAlert({
            title: params.title,
            text: params.message,
            icon: "warning",
            buttons: ['İmtina et', true],
            dangerMode: params.hasOwnProperty('dangerMode'),
            allowConfirmButton: true
        }).then((willDelete) => {
            if (willDelete) {
                fun();
            } else {
                sweetAlert({
                    text: params.no,
                    icon: 'error'
                });
            }
        });
    }
}

let categories = [];
let brands = [];

function fillSelect(data, response) {
    $('#categories').html('');
    let objectLength = Object.keys(data).length;
    for (let i = 0; i < objectLength; i++) {
        if (parseInt(data[i].level) === 1) {
            let sub = [];
            for (let j = 0; j < objectLength; j++) {
                if (parseInt(data[i].id) === parseInt(data[j].parent_category_id) && parseInt(data[j].parent_category_id) !== 0) {
                    let subCat = {
                        id: data[j].id,
                        text: data[j].name
                    };
                    sub.push(subCat);

                }
            }

            let cat = {
                id: data[i].id,
                text: data[i].name
            };
            if (sub.length) {
                cat.children = sub;
            }
            categories.push(cat);
        }
    }
}

// Buttons inside zoom modal
var previewZoomButtonClasses = {
    toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
    fullscreen: 'btn btn-light btn-icon btn-sm',
    borderless: 'btn btn-light btn-icon btn-sm',
    close: 'btn btn-light btn-icon btn-sm'
};

// Icons inside zoom modal classes
var previewZoomButtonIcons = {
    prev: '<i class="icon-arrow-left32"></i>',
    next: '<i class="icon-arrow-right32"></i>',
    toggleheader: '<i class="icon-menu-open"></i>',
    fullscreen: '<i class="icon-screen-full"></i>',
    borderless: '<i class="icon-alignment-unalign"></i>',
    close: '<i class="icon-cross2 font-size-base"></i>'
};

let productId;


let init = function () {
    $("#delete-img").on('click', function (e) {
        confirmation(function () {
            $.ajax({
                url: origin + "admin/product/delete-photo",
                type: "POST",
                data: {
                    image: $("#image_path").val(),
                    id: $('#product_id').val()
                },
                success: function (data, status, dd) {
                    if (status === "success") {
                        swal(data.message, {
                            icon: "success",
                        }).then(() => {
                            $("#product_img").attr('src', "");
                            $('[data-popup="lightbox"]').attr("href", "");
                            $('.product-photo').hide(500);
                        });
                    } else {
                        swal(data.message, {
                            icon: "error",
                        });
                    }
                },
                error: function (data, status, c) {
                    swal(data.responseJSON.message, {
                        icon: "error",
                    });
                }
            });
        }, {
            title: "Əminsinizmi?",
            message: "Silinən şəkil sonradan geri qaytarəlmayacaqdır",
            no: "Proses dayandırıldı",
            dangerMode: true
        });
    });


}();


function fillBrands(data, brand_id){
    
    for(let i in data){
        brands[i] = {
            id: data[i].id,
            text: data[i].name
        }
    }
    
    console.log(brands);
}

function openDialogBox(url) {
    $.getJSON(url, (response, status) => {
        if (status === 'success') {
            productId = response.id;
            $('#product_id').val(response.id);
            $('#user-full-name').val(response.full_name);
            $('#title').val(response.title);
            if (typeof CKEDITOR.instances['description'] !== 'undefined') {
                CKEDITOR.instances['description'].destroy();
            }
            CKEDITOR.replace('description', {
                height: 400
            }).setData(response.description);
            $('#price').val(response.price);

            $('.select-status').select2({
                minimumResultsForSearch: Infinity,
                data: [
                    {
                        id: 0,
                        text: "Passiv"
                    },
                    {
                        id: 1,
                        text: "Aktiv"
                    }
                ]
            }).val(response.status).trigger('change');
            if (response.img !== null) {
                $("#product_img").attr("src", origin + response.img);
                $('[data-popup="lightbox"]').attr("href", origin + response.img);
                $("#image_path").val(response.img);
                $('.product-photo').show();
            } else {
                $('.product-photo').hide();
            }
            if(!brands.length){
                $.getJSON(window.location.origin + "/admin/brands", (data, st) => {
                    if (st === 'success') {
                        fillBrands(data, response.brand_id);
                        $('#brands').select2({
                            minimumResultsForSearch: Infinity,
                            data: brands,
                        }).val(response.brand_id).trigger('change');
                    }
                });
            }else {
                $('#brands').html('');
                $('#brands').select2({
                    minimumResultsForSearch: Infinity,
                    data: brands,
                }).val(response.brand_id).trigger('change');
            }
            if (!categories.length) {
                $.getJSON(window.location.origin + "/admin/categories", (data, st) => {
                    if (st === 'success') {
                        fillSelect(data, response);
                        $('#categories').select2({
                            minimumResultsForSearch: Infinity,
                            data: categories,
                        }).val(response.category_id).trigger('change');
                    }
                });
            } else {
                $('#categories').html('');
                $('#categories').select2({
                    minimumResultsForSearch: Infinity,
                    data: categories,
                }).val(response.category_id).trigger('change');
            }
            $('.file-input-ajax').fileinput({
                language: "az",
                uploadUrl: window.location.origin + "/admin/product/upload-photo",
                deleteUrl: origin + "/admin/product/delete-photo",
                browseLabel: 'Şəkil axtar',
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                allowedFileTypes: ['image'],
                showCancel: true,
                uploadAsync: true,
                showUpload: false, // hide upload button
                overwriteInitial: true, // append files to initial preview
                browseOnZoneClick: true,
                initialPreviewAsData: true,
                fileActionSettings: {
                    removeIcon: '<i class="icon-bin"></i>',
                    removeClass: '',
                    uploadIcon: '<i class="icon-upload"></i>',
                    downloadIcon: '<i class="icon-download"></i>',
                    downloadClass: 'btn btn-light btn-icon btn-sm',
                    uploadClass: '',
                    zoomIcon: '<i class="icon-zoomin3"></i>',
                    zoomClass: '',
                    indicatorNew: '<i class="icon-file-plus text-success"></i>',
                    indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                    indicatorError: '<i class="icon-cross2 text-danger"></i>',
                    indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
                },
                previewZoomButtonClasses: previewZoomButtonClasses,
                previewZoomButtonIcons: previewZoomButtonIcons,
                uploadExtraData: function (previewId, index) {
                    let data = {
                        id: $('#product_id').val(),
                    };
                    return data;
                }
            }).on('fileuploaded', function (event, previewId, index, fileId) {
                $('.product-photo').show(500);
                $("#product_img").attr("src", previewId.response.initialPreview);
                $('[data-popup="lightbox"]').attr("href", previewId.response.initialPreview);
                $("#image_path").val(previewId.response.initialPreview);
            }).on("filepredelete", function (jqXHR) {
                $('.file-input-ajax').fileinput({})
                let data = {
                    id: $('#product_id').val(),
                    image: $('#image_path').val()
                };
                return data;
            });
            dialog.dialog('open');
        }
    });
}

let buttons = dialog.dialog('option', 'buttons');

function updateRow(url) {
    $.ajax({
        url: url,
        type: "PUT",
        data: {
            title: $('#title').val(),
            category_id: $('#categories').val(),
            description: CKEDITOR.instances['description'].getData(),
            price: $('#price').val(),
            brand_id: $('#brands').val(),
            status: $('.select-status').val()
        },
        success: function (data, status, d) {
            swal(data.message, {
                icon: "success"
            });
            if (status === 'success') {
                $('.help-block').text('');
                dt.ajax.reload(null, false);
            }
        },
        error: function (data) {
            swal(data.responseJSON.message, {
                icon: "error",
            });
            if (data.responseJSON.hasOwnProperty('errors')) {
                for (const [key, value] of Object.entries(data.responseJSON.errors)) {
                    $('#' + key + '-message').text('').text(value);
                }
            }
        }
    });
}

function deleteRow(url) {
    confirmation(function () {
        $.ajax({
            url: url,
            type: "DELETE",
            success: function (data, status, d) {
                swal(data.message, {
                    icon: "success"
                });
                if (status === 'success') {
                    dt.ajax.reload(null, false);
                    dialog.dialog('close');
                }
            },
            error: function (data) {
                swal(data.responseJSON.message, {
                    icon: "error",
                });
            }
        })
    }, {
        title: "Əminsinizmi?",
        message: "Sildiyiniz məlumatlar sonradan geri qaytarəlmayacaqdır",
        no: "Proses dayandırıldı",
        dangerMode: true
    });
}

$.extend(buttons, [
    {
        text: "Dəyiş",
        style: 'background-color: #26a69a; color: white',
        click: function () {
            confirmation(function () {
                updateRow(origin + "admin/product/" + productId)
            }, {
                title: "Əminsinizmi?",
                message: "Dəyişdirilən məlumatlar sonradan geri qaytarəlmayacaqdır",
                no: "Proses dayandırıldı"
            });
        }
    },
    {
        text: "Sil",
        style: 'background-color: #f44336; color: white',
        click: function () {

            deleteRow(origin + "admin/product/" + productId);

        }
    },
    {
        text: "Bağla",
        style: 'background-color: #2464f5; color: white',
        click: function () {
            dialog.dialog('close')
        }
    }
]);
dialog.dialog('option', 'buttons', buttons);
