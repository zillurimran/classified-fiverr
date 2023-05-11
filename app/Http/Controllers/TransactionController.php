<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function totalGenerate()
    {
        $transactions = Transaction::latest()->get();
        return view('admin.transaction.index', compact('transactions'));
    }
}
