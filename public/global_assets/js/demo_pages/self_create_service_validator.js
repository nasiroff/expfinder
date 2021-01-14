$('#registrationForm').bootstrapValidator({
    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        title: {
            message: 'The username is not valid',
            validators: {
                notEmpty: {
                    message: 'Başlıq mütləq doldurulmalıdır'
                },
                stringLength: {
                    min: 10,
                    max: 200,
                    message: 'Başlıq 10 və 200 simvol arasında olmalıdır'
                }
            }
        },
        price: {
            validators: {
                notEmpty: {
                    message: 'Məhsulun qiyməti mütləq qeyd edilməlidir'
                },
                numeric: {
                    message: 'Qiymət mütləq numerik olmalıdır'
                }
            }
        },
        status: {
            validators: {
                notEmpty: {
                    message: 'Status mütləq qeyd edilməlidir'
                }
            }
        },
        description: {
            validators: {
                notEmpty: {
                    message: 'Məhsulun təsviri üçün ən az bir 10 simvol daxil edilməlidir'
                }
            }
        }
    }
}).on('success.form.bv', function(e) {
    $('#registrationForm :submit').removeAttr('disabled')

});
