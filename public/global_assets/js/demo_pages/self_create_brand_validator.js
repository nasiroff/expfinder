$('#registrationForm').bootstrapValidator({
    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        name: {
            message: 'Ad uyğun deyil',
            validators: {
                notEmpty: {
                    message: 'Ad mütləq olmalıdır'
                },
                stringLength: {
                    min: 2,
                    max: 200,
                    message: 'Ad 2 və 100 simvol arasında olmalıdır'
                }
            }
        }
    }
}).on('success.form.bv', function(e) {
    $('#registrationForm :submit').removeAttr('disabled')

});
