<?php


namespace App\Http\Controllers;
use App\MasterModel;
use Illuminate\Http\Request;


class MasterController extends Controller
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
        $data = MasterModel::all();
        return response($data);
    }
    public function show($id){
        $data = MasterModel::where('id',$id)->get();
        return response ($data);
    }
    public function store (Request $request){
        $data = new MasterModel();
        $data->title = $request->input('title');
        $data->rate = $request->input('rate');
        $data->category = $request->input('category');
        $data->qty = $request->input('qty');
        $data->save();
    
        return response('Berhasil Tambah Data');
    }

    //
}
