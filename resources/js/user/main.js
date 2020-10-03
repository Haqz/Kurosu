$(document).ready(function(){
    console.log($.fn.dimmer('show'))
    table = $('#std_scores')
    let index_from = 0;
    let index_to = 1;
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
    // $('.tabular.menu .item').api({
    //     on: 'now',
    //     loadingDuration : 300,
    //     action: 'get userpage',
    //     urlData: {
    //         id: 1000
    //     },
    //     onSuccess: function(response) {
    //         console.log(response)
    //     },
    // }).tab();
});
$(function () {

})

