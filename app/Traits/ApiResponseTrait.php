<?php

namespace  App\Traits;

use App\Http\Resources\AccessLogResource;
use App\Http\Resources\AccommodationSaleResource;
use App\Http\Resources\ActivityLogResource;
use App\Http\Resources\AppUserResources;
use App\Http\Resources\ChatResource;
use App\Http\Resources\DashboardUserResources;
use App\Http\Resources\InAppNotificationResource;
use App\Http\Resources\SecurityResource;
use App\Http\Resources\VehicleRentResource;
use App\Http\Resources\VehicleSaleResource;

trait ApiResponseTrait
{

    public function ApiResponse(bool $status, $type, $message, $paginateData, $showHeaders = true)
    {
        $dataR = match($type){
            'security'=>SecurityResource::collection($paginateData),
            'app_user'=>AppUserResources::collection($paginateData),
            'vehicle_rent'=>VehicleRentResource::collection($paginateData),
            'vehicle_sale'=>VehicleSaleResource::collection($paginateData),
            'accomm_sale'=>AccommodationSaleResource::collection($paginateData),
            'chats'=>ChatResource::collection($paginateData),
            'in_app_notification' => InAppNotificationResource::collection($paginateData),
            'dashboar_user' => DashboardUserResources::collection($paginateData),
            'access_log' => AccessLogResource::collection($paginateData),
            'activity_log' => ActivityLogResource::collection($paginateData),
        };

        $headers = [];

        if($showHeaders){
            $headers['error'] = $status == true ? false : true;
            $headers['msg'] = $message ?? 'success' ;
        }

        return response()->json(array_merge($headers, [
            'data' => $dataR,
            'paginate' => $paginateData == NULL ? NULL : [
                'previous_page_url' => $paginateData->appends(request()->input())->previousPageUrl(),
                'next_page_url' => $paginateData->appends(request()->input())->nextPageUrl(),
                'number_per_page' => $paginateData->perPage(),
                'total_items' => $paginateData->total(),
            ]
        ]));
    }

}
