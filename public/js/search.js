$(document).ready(function() {
    $('select[name="sel_group_tour"]').change(function() {
        var group_tour_id = $(this).val();
        if (group_tour_id != '') {
            $.ajax({
                url: routeRenderPlaceToGroup,
                type: 'GET',
                data: {
                    group_tour_id: group_tour_id
                },
                success: function(data) {
                    var html1 = '<option value="">-- '+nameRenderPlaceFrom+' --</option>', 
                    html2 = '<option value="">-- '+nameRenderPlaceTo+' --</option>';
                    $.each(data.place_from, function(key, value) {
                        html1 += '<option value="' + value.id + '">' + value.title + '</option>';
                    })

                    $.each(data.place_to, function(key, value) {
                        html2 += '<option value="' + value.id + '">' + value.title + '</option>';
                    })

                    $('select[name="sel_place_from_tour"]').html(html1);
                    $('select[name="sel_place_to_tour"]').html(html2);
                }
            });
        } else {
            $('select[name="sel_place_from_tour"]').html('<option value="">-- '+nameRenderPlaceFrom+' --</option>');
            $('select[name="sel_place_to_tour"]').html('<option value="">-- '+nameRenderPlaceTo+' --</option>');
        }
    })
})