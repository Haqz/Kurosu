<?php


namespace App\Http\Controllers\Ajax;


use App\Entities\BetaKey;
use App\Entities\UserScores;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserProfileControllerAjax extends Controller
{
    protected $increment = 10;
//    public function store(Request $request) : JsonResponse
//    {
//        $validator = Validator::make($request->all(), [
//            'is_allowed' => 'boolean|required',
//            'is_public' => 'boolean|required',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json([
//                'status' => 403,
//                'errors' => $validator->errors()->all(),
//            ]);
//        }
//
//        $bytes = [random_bytes(2),random_bytes(2),random_bytes(2),random_bytes(2)];
//        BetaKey::create([
//            'key' => bin2hex($bytes[0]).'-'.bin2hex($bytes[1]).'-'.bin2hex($bytes[2]).'-'.bin2hex($bytes[3]),
//            'is_allowed' => $request->input('is_allowed'),
//            'is_public' => $request->input('is_public')
//        ]);
//
//        return response()->json([
//            'status' => 200,
//            'message' => 'Added beta key'
//        ]);
//    }
    /**
     * @param Request $request
     * @param int|null $user_id
     * @return JsonResponse
     */
    public function getScores(Request $request, int $user_id = null) : JsonResponse
    {
        if($user_id){
            $items = UserScores::where('user_id', $user_id)
                ->orderBy('pp', 'DESC')
                ->skip($request->loadedBefore)
                ->take($this->increment)
                ->get();

            if(!$items->isEmpty()){
                $data = $items;
            } else{
                $data = [];
            }

            return response()->json([
                'status' => 200,
                'data' => $data,
            ]);
        }

//        if(!is_null($user_id)){
//            $items = BetaKey::where('id', $user_id)->first();
//            return response()->json([
//                'status' => 200,
//                'data' => [
//                    'id' => $items->id,
//                    'key' => $items->key,
//                    'is_allowed' => $items->is_allowed,
//                    'is_public' => $items->is_public
//                ]
//            ]);
//        } else{
//            $items = BetaKey::all();
//            foreach ($items as  $item){
//                $data[] = [
//                    'id' => $item->id,
//                    'key' => $item->key,
//                    'is_allowed' => $item->is_allowed,
//                    'is_public' => $item->is_public
//                ];
//            }
//            return response()->json([
//                'status' => 200,
//                'data' => $data,
//            ]);
//        }
    }
}
