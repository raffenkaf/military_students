import jquery from 'jquery';

window.createFormData = function(resultObject) {
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



    return resultObject
}
