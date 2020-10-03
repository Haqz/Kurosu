$(function () {
    table = $('#std_scores')
    function addMore(id = 1000) {
        table.dimmer('show').addClass("loader");
        let loadMoreScores = parseInt(table.attr('data-loaded-scores'));
        $.ajax({
            url: `http://kurosu_new.local/ajax/user/get_scores/${id}`,
            type: 'GET',
            data: {
                loadedBefore: loadMoreScores,
            },
            success: function(response) {
                response.data.forEach((item, index) => {
                    table.find('tbody').append(item.view)
                })

                table.dimmer('hide').removeClass("loader");
            }
        }).then(() =>{
            table.attr('data-loaded-scores', loadMoreScores + 10);
        });
    }
    $('#user-add_more').on('click',function (){
        addMore();
    })
    $('.tabular.menu .item').tab();
})

