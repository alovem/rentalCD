<?php


namespace App\Http\Controllers;
use App\MasterCategory;
use Illuminate\Http\Request;


class MasterCategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $data = MasterCategory::all();
        return response($data);
    }
    public function show($id){
        $data = MasterCategory::where('id',$id)->get();
        return response ($data);
    }
    public function store (Request $request){
        $data = new MasterCategory();
        $data->id = $request->input('id');
        $data->categoryname = $request->input('categoryname');
       // $data->category = $request->input('category');
        //$data->qty = $request->input('qty');
        $data->save();
    
        return response('Data successfully added');
    }


    public function update(Request $request, $id){
        $data = MasterCategory::where('id',$id)->first();
        $data->id = $request->input('id');
        $data->categoryname = $request->input('categoryname');
        $data->save();
    
        return response('Data Updated');
    }
    
    public function destroy($id){
        $data = MasterCategory::where('id',$id)->first();
        $data->delete();
    
        return response('Data Deleted');
    }

    //
}
