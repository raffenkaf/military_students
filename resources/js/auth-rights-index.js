import jquery from 'jquery';
import select2 from 'select2';

select2(jquery);
$('#access_details').select2({
    placeholder: "Оберіть групи знань",
    ajax: {
        url: '/api/knowledge-entity-groups',
        dataType: 'json',
        processResults: function (response) {
            const data = response.data;

            if (data.length === 0) {
                alert('No knowledge entity group found');
            }

            return {
                results: data
            };
        }
    }
});
