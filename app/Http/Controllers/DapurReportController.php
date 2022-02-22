<?php

namespace App\Http\Controllers;

use App\Exports\DapurExport;
use App\Models\DapurReport;
use App\Models\Product;
use App\Models\Task;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DapurReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = DapurReport::all();

        return view('dapur.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $products = Product::all();
            return view('dapur.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->task_id) {
            $task = Task::find($request->task_id);

            $data = $request->all();

            if ($request->file('foto')) {
                $data['foto'] = $request->file('foto')->store('foto', 'public');
            }

            $data['poin'] = $request->total_masak / $task->target * 100 / 100 * 100;

            DapurReport::create($data);

            return redirect()->route('dapur.index');
        }else{
            if ($request->file('foto')) {
                $data['foto'] = $request->file('foto')->store('foto', 'public');
            }
            DapurReport::create($request->all());

            return redirect()->route('dapur.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::all();
        $dapur = DapurReport::find($id);
        return view('dapur.create', compact('products', 'dapur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dapur = DapurReport::find($id);
        $products = Product::all();

        return view('dapur.edit', compact('dapur', 'products'));
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
        if ($request->task_id) {
            $task = Task::find($request->task_id);

            $data = $request->all();

            if ($request->file('foto')) {
                $data['foto'] = $request->file('foto')->store('foto', 'public');
            }

            $data['poin'] = $request->total_masak / $task->target * 100 / 100 * 100;

            DapurReport::find($id)->update($data);

            return redirect()->route('dapur.index');
        }else{
            $data = $request->all();
            if ($request->file('foto')) {
                $data['foto'] = $request->file('foto')->store('foto', 'public');
            }
            DapurReport::find($id)->update($data);

            return redirect()->route('dapur.index');
        }
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

    public function export(Request $request)
	{
		return Excel::download(new DapurExport($request->awal, $request->akhir), 'dapur.xlsx');
	}
}
