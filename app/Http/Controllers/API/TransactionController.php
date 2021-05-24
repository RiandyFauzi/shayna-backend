<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = Transaction::with(['details.product'])->find($id);

        if($product)
        return ResponseFormatter::success($product, 'Data Transaksi berhasil ditambah');

        else
        return ResponseFormatter::error(null, 'Data Transaksi tidak ada', 404);
    }
}
