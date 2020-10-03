<?php


namespace App\Http\Controllers\Ajax;


use App\Entities\BetaKey;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BetaKeysControllerAjax extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function store(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'is_allowed' => 'boolean|required',
            'is_public' => 'boolean|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 403,
                'errors' => $validator->errors()->all(),
            ]);
        }

        $bytes = [random_bytes(2),random_bytes(2),random_bytes(2),random_bytes(2)];
        BetaKey::create([
            'key' => bin2hex($bytes[0]).'-'.bin2hex($bytes[1]).'-'.bin2hex($bytes[2]).'-'.bin2hex($bytes[3]),
            'is_allowed' => $request->input('is_allowed'),
            'is_public' => $request->input('is_public')
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Added beta key'
        ]);
    }

    /**
     * @param Request $request
     * @param int|null $id
     * @return JsonResponse
     */
    public function get(Request $request, int $id = null) : JsonResponse
    {

        if(!is_null($id)){
            $items = BetaKey::where('id', $id)->first();
            return response()->json([
                'status' => 200,
                'data' => [
                    'id' => $items->id,
                    'key' => $items->key,
                    'is_allowed' => $items->is_allowed,
                    'is_public' => $items->is_public
                ]
            ]);
        } else{
            $items = BetaKey::all();
            foreach ($items as  $item){
                $data[] = [
                    'id' => $item->id,
                    'key' => $item->key,
                    'is_allowed' => $item->is_allowed,
                    'is_public' => $item->is_public
                ];
            }
            return response()->json([
                'status' => 200,
                'data' => $data,
            ]);
        }
    }
}
