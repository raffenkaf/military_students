import jquery from 'jquery';
import select2 from 'select2';

select2(jquery);
$('#user_groups').select2({
    placeholder: "Оберіть групи",
    ajax: {
        url: '/api/user-groups',
        dataType: 'json',
        processResults: function (response) {
            const data = response.data;

            if (data.length === 0) {
                alert('No user groups found');
            }

            return {
                results: data
            };
        }
    }
});
