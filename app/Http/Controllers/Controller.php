<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function createTransaction($user_id, $ad_id, $amount, $purpose, $status, $transaction_id)
    {
        Transaction::create([
            'user_id' => $user_id,
            'ad_id' => $ad_id,
            'amount' => $amount,
            'purpose' => $purpose,
            'status' => $status,
            'transaction_id' => $transaction_id,
        ]);
    }
}
