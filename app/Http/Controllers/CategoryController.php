<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
        $categories = Category::paginate(5);
        return view('category', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category');
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
                'max' => 'attribute Max :max Character',
                'numeric' => ':attribute Must be Numbers',
            ];
    
            $this->validate($request, [
                'name' => 'required|max:30',
            ], $message);

        Category::create([
            'name' => $request->name,
        ]);

        Session::flash('success', 'Success');
        return redirect('/category');
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
        $name = Category::find($id);
        return view('editcategory', compact('name'));
    }

    public function ubah()
    {
       
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
            'name' => 'required|max:30',
        ], $message);

        $name = Category::find($id);

        $name->name = $request->name;
        $name->save();
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function hapus($id)
    {
        $name = Category::find($id)->delete();
        Session::flash('delete', 'Data Deleted');
        return redirect('/category');
    }
}
