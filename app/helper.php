<?php
function KurosuRank(int $rank){
    switch ($rank){
        case 1:
            return __('main.ranks.user');
            break;
        case 2:
            return __('main.ranks.supporter');
            break;
        case 3:
            return __('main.ranks.mod');
            break;
        case 4:
            return __('main.ranks.admin');
            break;
        default:
            return 'Unrecognized rank';
            break;
    }
}
