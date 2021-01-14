$('.form-check-input-styled').uniform().on('change', function () {
    if ($(this).prop("checked") == true) {
        $(".category-section").hide();
        $('#categories').attr("disabled", true);

    } else {
        $(".category-section").show();
        $('#categories').removeAttr("disabled");
    }
});

$('.select').select2({
    placeholder: 'Kateqoriya seçin'
});

$('#registrationForm').bootstrapValidator({
    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        name: {
            validators: {
                notEmpty: {
                    message: 'Ad mütləq doldurulmalıdır'
                },
                stringLength: {
                    min: 2,
                    max: 60,
                    message: 'Kateqoriya adı 2 və 60 simvol arasında olmalıdır'
                }
            }
        },
        parent_category_id: {
            validators: {
                notEmpty: {
                    message: 'Alt kateqoriya mütləq seçilməlidir'
                }
            }
        }
    }
}).on('success.form.bv', function(e) {
    $('#registrationForm :submit').removeAttr('disabled')
});
