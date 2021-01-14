

// Modal template
var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
    '  <div class="modal-content">\n' +
    '    <div class="modal-header align-items-center">\n' +
    '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
    '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
    '    </div>\n' +
    '    <div class="modal-body">\n' +
    '      <div class="floating-buttons btn-group"></div>\n' +
    '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
    '    </div>\n' +
    '  </div>\n' +
    '</div>\n';

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

// File actions
var fileActionSettings = {
    zoomClass: '',
    zoomIcon: '<i class="icon-zoomin3"></i>',
    dragClass: 'p-2',
    dragIcon: '<i class="icon-three-bars"></i>',
    removeClass: '',
    removeErrorClass: 'text-danger',
    removeIcon: '<i class="icon-bin"></i>',
    indicatorNew: '<i class="icon-file-plus text-success"></i>',
    indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
    indicatorError: '<i class="icon-cross2 text-danger"></i>',
    indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
};

$(function () {
    $('#fileupload').fileinput({
        language: 'az',
        browseLabel: 'Browse',
        browseIcon: '<i class="icon-file-plus mr-2"></i>',
        removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
        initialCaption: "No file selected",
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        allowedFileTypes: ['image'],
        maxFileSize: 400,
        showUpload:false,
        layoutTemplates: {
            icon: '<i class="icon-file-check"></i>',
            modal: modalTemplate
        },
        previewZoomButtonClasses: previewZoomButtonClasses,
        previewZoomButtonIcons: previewZoomButtonIcons,
        fileActionSettings: fileActionSettings
    });

    var elems = Array.prototype.slice.call(document.querySelectorAll('.form-check-input-switchery'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html);
    });


});
