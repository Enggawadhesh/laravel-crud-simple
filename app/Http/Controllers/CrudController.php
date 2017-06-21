<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Define Crue Model
use App\Crud;

//Define Auth user
use Auth;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

/********************************************************************/
    // Use this for simple data printing

    /*public function index()
    {
        // $datas = Crud::all();  //get all data

        $datas = Crud::latest()->get(); //get all data ordered by last created

        return view('crud.index', compact('datas'));
    }*/
/********************************************************************/

    // Use this for printing datas with pagination

    public function index(Request $request)
    {
        // $datas = Crud::latest()->simplePaginate(2); //get all data ordered by last created with simple pagination

        $datas = Crud::latest()->paginate(2); //get all data ordered by last created with page numbers pagination 

        return view('crud.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Show form
        return view("crud.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request
        $this->validate($request, [
            'foo' => 'required',
            'bar' => 'required',
        ]);

        //insert data
        $insdata = new Crud;
        $insdata->foo = $request->foo;
        $insdata->bar = $request->bar;
        $insdata->save();

        //After insert data go to create menu
        //You can redirect to where you want
        //If you want you can remove "with" method
        return back()->with('status', 'Data instered sucessfully!'); //using route
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dt = Crud::find($id);
        return view('crud.show', compact('dt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edt = Crud::find($id);
        return view('crud.edit', compact('edt'));
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
        //validate request
        $this->validate($request, [
            'ufoo' => 'required',
            'ubar' => 'required',
        ]);

        //insert data
        $upd = Crud::find($id);
        $upd->foo = $request->ufoo;
        $upd->bar = $request->ubar;
        $upd->save();

        return redirect()->route('crud.index')->with('status', 'Data updated sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dlt = Crud::find($id);
        $dlt->delete();

        return back()->with('status', 'Data deleted sucessfully!');
    }
}
