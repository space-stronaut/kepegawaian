<?php

namespace App\Exports;

use App\Models\DapurReport;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class DapurExport implements FromView
{
    public $awal;
    public $akhir;

    public function __construct($awal, $akhir)
    {
        $this->awal = $awal;
        $this->akhir = $akhir;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.dapur', [
            'dapurs' => DB::table('dapur_reports')->join('users', 'users.id', 'dapur_reports.user_id')
                        ->join('cabangs', 'cabangs.id', 'users.cabang_id')
                        ->join('products', 'products.id', 'dapur_reports.product_id')
                        ->join('sub_categories', 'sub_categories.id', 'products.category_id')
                        ->selectRaw('sum(total_masak) AS jumlah, product_id, products.nama,sub_categories.id, sub_categories.nama AS sub, cabang_id, cabangs.nama_cabang')
                        ->groupBy('product_id', 'cabang_id')
                        ->get(),
            'awal' => $this->awal,
            'akhir' => $this->akhir
        ]);
    }
}
