import datepicker from 'js-datepicker';
import moment from "moment";
import jquery from 'jquery';
import timepicker from 'timepicker';

const picker = datepicker('.datepicker-date', {
    formatter: (input, date, instance) => {
        input.value = moment(date).format('YYYY-MM-DD');
    }
});


$('.datepicker-time').timepicker({
    timeFormat: 'H:i',
    step: 30,
    disableTextInput: true,
    scrollDefault: 'now',
    forceRoundTime: true,
    useSelect: true,
    selectOnBlur: true,
    maxTime: '23:45',
    minTime: '00:00',
    show2400: true
});
