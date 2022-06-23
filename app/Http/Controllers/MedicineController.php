<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Category;
use Illuminate\Http\Request;
use DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Raw Query
        //$result = DB::select(DB::raw("SELECT * FROM medicines"));

        // Fluent Query Builder
        //$result = DB::table("medicines")->get();

        // Eloquent ORM
        $result = Medicine::all();
        $categories = Category::all(); // W11: digunakan oleh modalCreate form

        //dd($result);

        // Compact. Nama harus sama.
        //return view('medicine.index', compact('result'));

        // Array. Bisa berbeda nama untuk diterima di view.
        return view('controlpanel.medicine.index', ['result' => $result, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("controlpanel.medicine.create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin-action_any');

        //dd($request);
        $medicine = new Medicine();
        $medicine->generic_name = $request->get('name');
        $medicine->form = $request->get('form');
        $medicine->restriction_formula = $request->get('restriction');
        $medicine->price = $request->get('price');
        $medicine->description = $request->get('description');
        $medicine->faskes1 = ($request->get('faskes1') == 1) ? 1 : 0;
        $medicine->faskes2 = ($request->get('faskes2') == 1) ? 1 : 0;
        $medicine->faskes3 = ($request->get('faskes3') == 1) ? 1 : 0;
        $medicine->category_id = $request->get('category');

        $image = $request->file('image');
        $medicine->image = isset($image) ? time()." ".$medicine->generic_name.".".$image->extension() : null;

        $medicine->save();
        
        $destinationPath = public_path('images');
        $image->move($destinationPath, $medicine->image);

        return redirect()->route('medicine.index')->with('status','Medicine has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        return view('controlpanel.medicine.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        $data = $medicine;
        $categories = Category::all();
        return view('controlpanel.medicine.edit', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        $this->authorize('admin-action_any');

        $medicine->generic_name = $request->get('name');
        $medicine->form = $request->get('form');
        $medicine->restriction_formula = $request->get('restriction');
        $medicine->price = $request->get('price');
        $medicine->description = $request->get('description');
        $medicine->faskes1 = ($request->get('faskes1') == 1) ? 1 : 0;
        $medicine->faskes2 = ($request->get('faskes2') == 1) ? 1 : 0;
        $medicine->faskes3 = ($request->get('faskes3') == 1) ? 1 : 0;
        $medicine->category_id = $request->get('category');

        $image = $request->file('image');
        if ($image) {
            $destinationPath = public_path('images');
            $image_path = $destinationPath.'/'.$medicine->image;
            if (file_exists($image_path)) unlink($image_path);

            $medicine->image = time()." ".$medicine->id.".".$image->extension();
            $image->move($destinationPath, $medicine->image);
        }

        $medicine->save();

        return redirect()->route('medicine.index')->with('status','Medicine has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $this->authorize('admin-action_any');
        
        try {
            $destinationPath = public_path('images');
            unlink($destinationPath.'/'.$medicine->image);
            $medicine->delete();
            return redirect()->route('medicine.index')->with('status', 'Medicine data has been deleted');
        } catch(\PDOException $e) {
            $msg = "Data Gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan.";
            return redirect()->route('medicine.index')->with('error', $msg);
        }
    }

    public function coba1()
    {
        // Query Builder filter
        $result = DB::table('medicines')
            ->where('price','>',20000)
            ->get();

        $result = DB::table('medicines')
            ->where('generic_name','like','%fen')
            ->get();
        
        // Group By
        $result = DB::table('medicines')
            ->select('generic_name')
            ->groupBy('generic_name')
            ->get();

        // Agregate
        $result = DB::table('medicines')->count();

        $result = DB::table('medicines')->max('price');

        // Filter + Aggregate
        $result = DB::table('medicines')
            ->where('generic_name','like','%fen')
            ->avg('price');

        // Join
        $result = DB::table('medicines')
            ->join('categories','medicines.category_id', '=', 'categories.id')
            ->get();

        // Join + Sort
        $result = DB::table('medicines')
            ->join('categories','medicines.category_id','=','categories.id')
            ->orderBy('price','desc')
            ->get();
        
        // Eloquent
        $result = Medicine::where('price','>',20000)->get();
        
        dd($result);
    }

    public function showInfo()
    {
        $result = Medicine::orderBy('price', 'desc')->first();

        return response()->json(
            array(
                'status' => 'oke',
                'msg' => 
                    '<div class="alert alert-info">'.
                    'Did you know?<br>'.
                    'Harga obat termahal adalah '.$result->generic_name.' '.$result->form.' dengan harga '.$result->price.
                    '</div>',
            ),
            200
        );
    }

    public function getEditFormA(Request $request)
    {
        $id = $request->get('id');
        $data = Medicine::find($id);
        $categories = Category::all();

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('medicine.getEditFormA', compact('data', 'categories'))->render(),
        ), 200);
    }

    public function getEditFormB(Request $request)
    {
        $id = $request->get('id');
        $data = Medicine::find($id);
        $categories = Category::all();

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('controlpanel.medicine.getEditFormB', compact('data', 'categories'))->render(),
        ), 200);
    }

    public function saveData(Request $request)
    {
        $this->authorize('admin-action_any');

        $id = $request->get('id');
        $medicine = Medicine::find($id);
        
        $medicine->generic_name = $request->get('name');
        $medicine->form = $request->get('form');
        $medicine->restriction_formula = $request->get('restriction');
        $medicine->price = $request->get('price');
        $medicine->description = $request->get('description');
        $medicine->faskes1 = ($request->get('faskes1') == 1) ? 1 : 0;
        $medicine->faskes2 = ($request->get('faskes2') == 1) ? 1 : 0;
        $medicine->faskes3 = ($request->get('faskes3') == 1) ? 1 : 0;
        $medicine->category_id = $request->get('category');

        $image = $request->file('image');
        if ($image) {
            $destinationPath = public_path('images');
            $image_path = $destinationPath.'/'.$medicine->image;
            if (file_exists($image_path)) unlink($image_path);

            $medicine->image = time()." ".$medicine->id.".".$image->extension();
            $image->move($destinationPath, $medicine->image);
        }

        $medicine->save();

        return response()->json(array(
            'status' => 'OK',
            'category_name' => $medicine->category->name,
            'image' => $medicine->image,
            'msg' => 'Sukses EditB data medicine',
        ), 200);
    }

    public function deleteData(Request $request)
    {
        $this->authorize('admin-action_any');

        try {
            $id = $request->get('id');
            $medicine = Medicine::find($id);

            $destinationPath = public_path('images');
            $image_path = $destinationPath.'/'.$medicine->image;
            if (file_exists($image_path)) unlink($image_path);
    
            $medicine->delete();
    
            return response()->json(array(
                'status' => 'OK',
                'msg' => 'Sukses DELete data medicine',
            ), 200);
        } catch(\PDOException $e) {
            return response()->json(array(
                'status' => 'fail',
                'msg' => 'Failed to DELete data medicine',
            ), 200);
        }
    }
}
