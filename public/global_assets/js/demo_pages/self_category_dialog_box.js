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

$('.form-check-input-styled').uniform().on('change', function () {
    if ($(this).prop("checked") == true) {
        $(".category-section").hide();
        $('#categories').attr("disabled", true);

    } else {
        $(".category-section").show();
        $('#categories').removeAttr("disabled");
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
        {
            "width": "100px", "targets": 3
        }
    ],
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Azerbaijan.json",
        searchPlaceholder: "Axtarış etmək üçün yazın..."
    },
    "processing": true,
    "serverSide": true,
    "ajax": origin + "admin/categories/server-side",
    "columns": [
        {"data": "id"},
        {"data": "name"},
        {"data": "level"},
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
                    '                                                    <button type="button" onclick="openDialogBox(\'' + (origin + 'admin/categories/' + full.id) + '\')" class="dropdown-item"><i class="icon-design"></i>\n' +
                    '                                                        Bax və dəyiş</button>\n' +
                    '                                                    <button type="button" onclick="deleteRow(\'' + (origin + 'admin/categories/' + full.id) + '\')" class="dropdown-item"><i class="icon-trash"></i>\n' +
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
    resizable: true,
    height: '350',
    width: '600',
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

function fillSelect(data) {
    $('#categories').html('');
    // for (let j = 0; j < 3; j++) {
    //     let cat = [];
    //     let counter = 0;
    //     for (let i in data) {
    //         if (j === parseInt(data[i].level)) {
    //             cat[counter++] = {id: data[i].id, text: data[i].name};
    //         }
    //     }
    //     categories[j] = cat;
    // }

    let objectLength = Object.keys(data).length;
    categories = [
        {
            text: 'Əsas kateqoriyalar',
            children: []
        },
        {
            text: 'Alt kateqoriyalar',
            children: []
        }
    ];
    console.log(categories[0]['children']);
    for (let i = 0; i < objectLength; i++) {
        if (parseInt(data[i].level) === 0) {

            categories[0]['children'].push({
                id: data[i].id,
                text: data[i].name
            });

        }
        if (parseInt(data[i].level) === 1) {

            categories[1]['children'].push({
                id: data[i].id,
                text: data[i].name
            })
        }
    }

}


let categoryId;
let level;

function openDialogBox(url) {
    $.getJSON(url, (response, status) => {

        if (status === 'success') {
            categoryId = response.id;
            $(".category-section").hide();
            $('#categories').attr("disabled", true);
            $('#name').val(response.name);

            if (parseInt(response.level) === 0) {
                // document.getElementById('is-main').checked = true;
                $('#is-main').prop('checked', true);
                $.uniform.update();
            } else {
                // document.getElementById('is-main').checked = false;

                $('#is-main').prop('checked', false);
                $.uniform.update();
                $(".category-section").show();
                $('#categories').removeAttr("disabled");
            }




            if (!categories.length) {
                $.getJSON(origin + "admin/categories", (data, st) => {
                    if (st === 'success') {
                        fillSelect(data);
                        $('.select').select2({
                            data: categories,
                        }).val(response.parent_category_id).trigger('change');
                    }
                });
            } else {
                $('.select').html('');
                $('.select').select2({
                    data: categories,
                }).val(response.parent_category_id).trigger('change');
            }
            dialog.dialog('open');
        }
    });
}

let buttons = dialog.dialog('option', 'buttons');

function updateRow(url) {
    $.ajax({
        url: url,
        type: "PUT",
        data: $('#updateForm').serialize(),
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
                updateRow(origin + "admin/categories/" + categoryId)
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

            deleteRow(origin + "admin/categories/" + categoryId);

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
