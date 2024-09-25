<?php

namespace App\Services\Admins;

use App\Models\Rfid;
use Illuminate\Support\Facades\DB;

class RfidService
{
    public function generateRfid($product_id = null, $user_id = null, $quantity = 0, $update = false)
    {
        if ($quantity > 100) {
            return "Quantity must be less than 100. Please try again!";
        }
        
        DB::beginTransaction();
        $base_number_length = 24 - strlen($product_id) - strlen($user_id); // Calculate the length for the numeric part

        $data = [];
        $rfids = [];

        for ($i = 1; $i <= $quantity; $i++) {
            $number_part = str_pad($i, $base_number_length, '0', STR_PAD_LEFT); // Pad the number part with leading zeros
            $full_string = $product_id . $user_id . $number_part; // Concatenate the original string with the padded number
            $rfids[] = $full_string;
            $data[] = [
                'product_id' => $product_id,
                'rfid' => $full_string,
                'status' => 0,
            ];
        }
        
        if (!$update) {
            if (Rfid::insert($data)) {
                DB::commit();
                return "";
            } else  {
                DB::rollBack();
                return "Can't insert data to table Rfid. Please try again!";
            }
        } else {
            $message = '';
            $exist_rfids = Rfid::where('product_id', $product_id)->whereNull('deleted_at')->get();
            $update_rfids = [];
            foreach ($exist_rfids as $value) {
                if (in_array($value->rfid, $rfids)) {
                    $key = array_search($value->rfid, $rfids);
                    unset($rfids[$key]);
                } else {
                    $update_rfids[] = $value->rfid;
                }
            }

            if (!empty($update_rfids)) {
                if (!Rfid::whereIn('rfid', $update_rfids)->update(['deleted_at'=>now()])) {
                    $message = "Can't update data table rfid. Please try again!";
                }
            }

            if (!empty(array_values($rfids))) {
                $data_insert = [];
                foreach ($rfids as $value) {
                    $data_insert[] = [
                        'product_id' => $product_id,
                        'rfid' => $value,
                        'status' => 0,
                    ];
                }

                if (!Rfid::insert($data_insert)) {
                    $message = "Can't update data table rfid. Please try again!";
                }
            }

            if ($message != '') {
                DB::rollBack();
                return $message;
            } else {
                DB::commit();
                return $message;
            }
        }
        
    }
}
