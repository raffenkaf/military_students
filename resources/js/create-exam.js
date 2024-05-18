import jquery from 'jquery';
import select2 from 'select2';

window.createFormData = function(resultObject = {}) {
    resultObject.formStage = 1;

    resultObject.moveToSecondStage = function() {
        if (!this.validateFirstStage()) {
            alert('Please fill all the fields');
            return;
        }

        this.formStage = 2;
        $('#first-stage-div .ui-timepicker-select').prop('disabled', true);
    }

    resultObject.validateFirstStage = function() {
        let startTime = $('#start_time').val();
        let endTime = $('#end_time').val();
        let examDate = $('#exam_date').val();

        return startTime && endTime && examDate;
    }

    resultObject.moveToFirstStage = function() {
        this.formStage = 1;

        $('#first-stage-div .ui-timepicker-select').removeProp('disabled');
        $('#question_topics').val(null).trigger('change');
        $('#exam_user_groups').val(null).trigger('change');
    }

    return resultObject;
}

select2(jquery);
$('#question_topics').select2({
    placeholder: "Оберіть теми питань"
});
$('#exam_user_groups').select2({
    placeholder: "Оберіть групи",
    ajax: {
        url: '/api/user-groups',
        dataType: 'json',
        processResults: function (data) {
            if (!data.userGroups) {
                alert('No user groups found');
            }
            return {
                results: data.userGroups
            };
        }
    }
});

