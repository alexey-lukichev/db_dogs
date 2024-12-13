$(document).ready(function() {
    $('.delete').on('click', function(e) {
        if (!confirm('Вы уверены что хотите удалить собаку?')) {
            e.preventDefault();
        }
    });
});
