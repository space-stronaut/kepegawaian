<?php

namespace App\Http\Controllers;

use App\Models\PramusajiReport;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PramusajiReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = PramusajiReport::all();

        return view('pramusaji.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pramusaji.create');
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
            $data = $request->all();
            $jumlah = count(Task::all());
            if ($request->file('foto')) {
                $data['foto'] = $request->file('foto')->store('foto', 'public');
            }

            $data['poin'] = 1 / $jumlah * 100 / 100 * 100;

            PramusajiReport::create($data);

            return redirect()->route('pramusaji.index');
        }else{
            $data = $request->all();
            if ($request->file('foto')) {
                $data['foto'] = $request->file('foto')->store('foto', 'public');
            }
            PramusajiReport::create($data);

            return redirect()->route('pramusaji.index');
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
