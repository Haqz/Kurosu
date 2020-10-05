$(function (){
    $.fn.api.settings.api = {
        'get userpage' : '/ajax/user/get_scores/{id}',
    };
    $('.ui.dropdown').dropdown();
})
