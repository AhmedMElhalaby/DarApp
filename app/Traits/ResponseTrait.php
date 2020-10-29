<?php

namespace App\Traits;

trait ResponseTrait
{
    protected function successJsonResponse(array $message,$data =[],$data_name = 'data',$paging = null,$code = 200)
    {
        return response()->json(
            [
                'status' => [
                    'status'=>'success',
                    'message' => $message,
                    'code' => $code,

                ],
                ''.$data_name => $data,
                'paging'=>$paging?[
                    'total'=>$paging->total(),
                    'per_page' => $paging->perPage(),
                    'current_page' => $paging->currentPage(),
                    'last_page' => $paging->lastPage(),
                    'from' => $paging->firstItem(),
                    'to' => $paging->lastItem()
                ]:null
            ],
            200
        );
    }

    protected function failJsonResponse(array $message, $code = 200)
    {
        return response()->json(
            [
                'status' => [
                    'status'=>'fail',
                    'message' => $message,
                    'code' => $code,
                ],
                'data' => [],
                'paging'=>null

            ],
            200
        );
    }

    protected function errorJsonResponse(array $message,$data = [],$data_name = 'data',$paging = null, $code = 200)
    {

        return response()->json(
            [
                'status' => [
                    'status'=>'error',
                    'message' => $message,
                    'code' => $code,
                ],
                ''.$data_name => $data,
                'paging'=>$paging

            ],
            200
        );
    }
}
