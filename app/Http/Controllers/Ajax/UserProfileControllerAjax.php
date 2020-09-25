<?php


namespace App\Http\Controllers\Ajax;


use App\Entities\UserScores;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserProfileControllerAjax extends Controller
{
    protected $increment = 10;

    /**
     * @param Request $request
     * @param int|null $user_id
     * @return JsonResponse
     */
    public function getScores(Request $request, int $user_id = null) : JsonResponse
    {
        if($user_id){
            if($request->loadedBefore){
                $items = UserScores::where('user_id', $user_id)
                    ->orderBy('pp', 'DESC')
                    ->skip($request->loadedBefore)
                    ->take($this->increment)
                    ->get();

                if($items->isEmpty()){
                    $data = [];
                }
                foreach ($items as $item){
                    $data[] = [
                        'view' => view('user.parts.table_row', ['columns' => [$item->id, $item->max_combo, $item->pp]])->render()
                    ];
                }
                return response()->json([
                    'status' => 200,
                    'data' => $data,
                ]);
            } else{
                $items = UserScores::where('user_id', $user_id)
                    ->orderBy('pp', 'DESC')
                    ->get();

                if($items->isEmpty()){
                    $data = [];
                }

                return response()->json([
                    'status' => 200,
                    'data' => $data,
                ]);
            }
        } else{
            return response()->json([
                'status' => 403,
                'error' => __('user/main.ajax.id_required'),
            ]);
        }
    }
}
