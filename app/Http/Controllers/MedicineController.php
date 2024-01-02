<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['medicines'] = Medicine::orderBy('id', 'desc')->paginate(5);
        return view('Adminlte.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Adminlte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'name'=> 'required',
            'description'=>'required',
            'price'=>'required',
            'med_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $medicine = new Medicine;
        $medicine->name = $request->name;
        $medicine->description = $request->description;
        $medicine->price = $request->price;
        if ($image = $request->file('med_image')) {
            $destination = 'upload/image';
            $name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destination, $name);
            $medicine->med_image = $name;
        }

        $medicine->save();


        return redirect()->route('Adminlte.index')
            ->with('success', 'Medicine has been added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        return view('Adminlte.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        return view('Adminlte.edit', compact(medicine));
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
        $request ->validate([
            'name'=> 'required',
            'description'=>'required',
            'price'=>'required',
            'med_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $medicine = Medicine::find($id);
        $medicine->name = $request->name;
        $medicine->description = $request->description;
        $medicine->price = $request->price;
        $medicine->med_image = $request->med_image;
        $medicine->save();


        return redirect()->route('Adminlte.index')
            ->with('success', 'Medicine has been added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('Adminlte.index')->with('success','Medicine deleted successfully');
    }
}
