$(document).ready(function() {
    $('#learner_edit_data').on('click', function(e) {
        e.preventDefault();

        $('#button').removeClass('hidden');
        $('#learner_update_data').removeClass('hidden');
        $('#learner_delete_data').removeClass('hidden');
        $('#learner_edit_data').addClass('hidden');
        $('#cancel').removeClass('hidden');
        $('#return').addClass('hidden');


        $('#learner_fname').prop("disabled", false).focus();
        $('#learner_lname').prop("disabled", false);
        $('#learner_bday').prop("disabled", false);
        $('#learner_gender').prop("disabled", false);
        $('#learner_email').prop("disabled", false);
        $('#learner_email').prop("readonly", true);
        $('#learner_contactno').prop("disabled", false);
        $('#learner_contactno').prop("readonly", true);
    
        $('#business_name').prop("disabled", false);
        $('#business_address').prop("disabled", false);
        $('#business_owner_name').prop("disabled", false);
        $('#bplo_account_number').prop("disabled", false);
        $('#business_category').prop("disabled", false);
    
        $('#learner_username').prop("disabled", false);
        $('#learner_password').prop("disabled", false);
        $('#learner_password_confirm').prop("disabled", false);
        $('#learner_security_code').prop("disabled", false);
        $('#learner_security_code').prop("readonly", true);
            
    })

    $('#cancel').on('click', function(e) {
        e.preventDefault();

        $('#button').addClass('hidden');
        $('#learner_update_data').addClass('hidden');
        $('#learner_delete_data').addClass('hidden');
        $('#learner_edit_data').removeClass('hidden');
        $('#cancel').addClass('hidden');
        $('#return').removeClass('hidden');


        $('#learner_fname').prop("disabled", true).focus();
        $('#learner_lname').prop("disabled", true);
        $('#learner_bday').prop("disabled", true);
        $('#learner_gender').prop("disabled", true);
        $('#learner_email').prop("disabled", true);
        $('#learner_email').prop("readonly", true);
        $('#learner_contactno').prop("disabled", true);
        $('#learner_contactno').prop("readonly", true);
    
        $('#business_name').prop("disabled", true);
        $('#business_address').prop("disabled", true);
        $('#business_owner_name').prop("disabled", true);
        $('#bplo_account_number').prop("disabled", true);
        $('#business_category').prop("disabled", true);
    
        $('#learner_username').prop("disabled", true);
        $('#learner_password').prop("disabled", true);
        $('#learner_password_confirm').prop("disabled", true);
        $('#learner_security_code').prop("disabled", true);
        $('#learner_security_code').prop("readonly", true);
    })


    
$("#learner_delete_data").click(function () {
        $("#deleteLearnerModal").removeClass("hidden");
    });

    $("#learner_cancelDelete").click(function () {
        $("#deleteLearnerModal").addClass("hidden");
    });
 $("#learner_deleteCourse").submit(function (e) {
    e.preventDefault();
    var learnerID = $(this).data("learner-id");
    var csrfToken = $('meta[name="csrf-token"]').attr('content'); 

    $.ajax({
        type: 'POST',
        url: '/admin/delete_learner/' + learnerID,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            if (response && response.redirect_url) {
                window.location.href = response.redirect_url;
            } else {
            
            }
        },
        error: function (xhr, status, error) {

            console.log(xhr.responseText);
        }
    });
    });

    $("#learner_update_data").click(function () {
        $("#updateLearnerModal").removeClass("hidden");
    });

    $("#learner_cancelUpdate").click(function () {
        $("#updateLearnerModal").addClass("hidden");
    });


})