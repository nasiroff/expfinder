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
        {"width": "100px", "targets": 1},
        {"width": "100px", "targets": 2},
        {"width": "100px", "targets": 3},
        {"width": "100px", "targets": 4},
        {"width": "100px", "targets": 5},

    ],
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Azerbaijan.json",
        searchPlaceholder: "Axtarış etmək üçün yazın..."
    },
    "processing": true,
    "serverSide": true,
    "ajax": origin + "admin/services/server-side",
    "columns": [
        {"data": "id"},
        {"data": "title"},
        {"data": "description"},
        {"data": "price"},
        {
            "data": "status", "render": function (data, type, full) {
                return `<span class="badge badge-${full.status == 1 ? 'success' : 'secondary'}">${full.status == 1 ? 'Aktiv' : 'Passiv'}</span>`
            }
        },
        {
            "data": "action", 'orderable': false,
            "render": function (data, type, full, meta) {
                return '<div class="list-icons" style="display: inline; text-align: center">\n' +
                    '                                            <div class="dropdown ">\n' +
                    '                                                <a href="javascript:;" class="list-icons-item" data-toggle="dropdown">\n' +
                    '                                                    <i class="icon-menu9"></i>\n' +
                    '                                                </a>\n' +
                    '\n' +
                    '                                                <div class="dropdown-menu dropdown-menu-right">\n' +
                    '                                                    <button type="button" onclick="openDialogBox(\'' + (origin + 'admin/services/' + full.id) + '\')" class="dropdown-item"><i class="icon-design"></i>\n' +
                    '                                                        Bax və dəyiş</button>\n' +
                    '                                                    <button type="button" onclick="deleteRow(\'' + (origin + 'admin/services/' + full.id) + '\')" class="dropdown-item"><i class="icon-trash"></i>\n' +
                    '                                                        Sil</button>' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>';
            }
        }
    ]
});


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

let dialog = $("#dialog-form").dialog({
    autoOpen: false,
    resizable: true,
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


let serviceId;


function openDialogBox(url) {
    $.getJSON(url, (response, status) => {

        if (status === 'success') {
            serviceId = response.id;

            $('#service_id').val(serviceId);
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
                $("#service_img").attr("src", origin + response.img);
                $('[data-popup="lightbox"]').attr("href", origin + response.img);
                $("#image_path").val(response.img);
                $('.service-photo').show();
            } else {
                $('.service-photo').hide();
            }
            $('.file-input-ajax').fileinput({
                language: "az",
                uploadUrl: window.location.origin + "/admin/service/upload-photo",
                deleteUrl: origin + "/admin/service/delete-photo",
                browseLabel: 'Şəkil axtar',
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                allowedFileTypes: ['image'],
                showCancel: true,
                uploadAsync: true,
                showUpload: false,
                overwriteInitial: true,
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
                        id: $('#service_id').val(),
                    };
                    return data;
                }
            }).on('fileuploaded', function (event, previewId, index, fileId) {
                $('.service-photo').show(500);
                $("#service_img").attr("src", previewId.response.initialPreview);
                $('[data-popup="lightbox"]').attr("href", previewId.response.initialPreview);
                $("#image_path").val(previewId.response.initialPreview);
                console.log(previewId.response.initialPreview);
            }).on("filepredelete", function (jqXHR) {
                $('.file-input-ajax').fileinput({})
                let data = {
                    id: $('#service_id').val(),
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
        data:  {
            title: $('#title').val(),
            description: CKEDITOR.instances['description'].getData(),
            price: $('#price').val(),
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
                updateRow(origin + "admin/services/" + serviceId)
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

            deleteRow(origin + "admin/services/" + serviceId);

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

let init = function () {
    $("#delete-img").on('click', function (e) {
        confirmation(function () {
            $.ajax({
                url: origin + "admin/services/delete-photo",
                type: "POST",
                data: {
                    image: $("#image_path").val(),
                    id: $('#service_id').val()
                },
                success: function (data, status, dd) {
                    if (status === "success") {
                        swal(data.message, {
                            icon: "success",
                        }).then(() => {
                            $("#service_img").attr('src', "");
                            $('[data-popup="lightbox"]').attr("href", "");
                            $('.service-photo').hide(500);
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
