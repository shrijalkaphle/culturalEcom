function toggleActive(id) {
    $('#loader').removeClass('hidden')
    $.ajax({
        method: 'GET',
            url: '/toggleactive/'+id,
            data: {id: id},
            dataType: "json",
            success: function(res) {
                $('#loader').addClass('hidden')
            }
    })
}