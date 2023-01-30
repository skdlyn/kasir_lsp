<?php

namespace App\Http\Controllers;

use App\Models\category as ModelsCategory;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Item::paginate(7);
        $category = Category::all();
        return view('item', compact('items', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute Must be Filled',
            'min' => ':attribute Min :min Character',
            'max' => 'attribute Max :max Character',
            'numeric' => ':attribute Must be Numbers',
        ];

        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required|max:30',
            'price' => 'required|numeric',
            'stock' => 'required',
        ], $message);

        Item::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        Session::flash('status', 'Data Added');
        return redirect('/item');
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
        $item = Item::find($id);
        $category = Category::all();
        return view ('edititem', compact('item', 'category'));
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
        $message = [
            'required' => ':attribute Must be Filled',
            'min' => ':attribute Min :min Character',
            'max' => 'attribute Max :max Character',
            'numeric' => ':attribute Must be Numbers',
        ];

        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required|max:30',
            'price' => 'required|numeric',
            'stock' => 'required',
        ], $message);

        $item = Item::find($id);

        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;

        $item->save();
        Session::flash('edit', 'Item Edit Success');
        return redirect('/item');
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

    public function hapus($id)
    {
        $item = Item::find($id)->delete();
        Session::flash('delete', 'Data Deleted');
        return redirect('/item');
    }
}
