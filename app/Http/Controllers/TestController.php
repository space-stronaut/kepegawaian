<?php

namespace App\Http\Controllers;

use App\Models\DapurReport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('dapur_reports')->join('users', 'users.id', 'dapur_reports.user_id')
                    ->join('cabangs', 'cabangs.id', 'users.cabang_id')
                    ->join('products', 'products.id', 'dapur_reports.product_id')
                    ->join('sub_categories', 'sub_categories.id', 'products.category_id')
                    ->selectRaw('sum(total_masak) AS jumlah, product_id, products.nama,sub_categories.id, sub_categories.nama AS sub, cabang_id, cabangs.nama_cabang')
                    ->groupBy('product_id', 'cabang_id')
                    ->get();

        dd($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
