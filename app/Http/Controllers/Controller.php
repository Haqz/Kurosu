<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    final public static function getStatusName(int $status = 1): string
    {
        switch ($status) {
            case 0:
                $statusName = 'error';
                break;
            case 2:
                $statusName = 'warning';
                break;
            case 3:
                $statusName = 'info';
                break;
            default:
                $statusName = 'success';
                break;
        }

        return $statusName;
    }
}
