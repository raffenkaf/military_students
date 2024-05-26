import jquery from 'jquery';
import select2 from 'select2';

select2(jquery);
$('#auth_rights').select2({
    placeholder: "Оберіть права",
});
