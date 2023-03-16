<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Order code' => $this->id,
            'Customer'   => $this->cus_id,
            'Date'       => $this->ord_date,
            'Status'     => $this->ord_status,
            'Address'    => $this->address,
            'Method Payment'=> $this->methodpay,
        ];
    }
}
