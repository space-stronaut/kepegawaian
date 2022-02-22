<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DapurReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function getData()
    {
        $data = DB::table('dapur_reports')->join('users', 'users.id', 'dapur_reports.user_id')
                ->join('cabangs', 'cabangs.id', 'users.cabang_id')
                ->join('products', 'products.id', 'dapur_reports.product_id')
                ->join('sub_categories', 'sub_categories.id', 'products.category_id')
                ->selectRaw('sum(total_masak) AS jumlah, product_id, products.nama,sub_categories.id, sub_categories.nama AS sub, cabang_id, cabangs.nama_cabang')
                ->groupBy('product_id', 'cabang_id')
                ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
