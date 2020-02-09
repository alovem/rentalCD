<?php


namespace App\Http\Controllers;
use App\MasterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


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

        try {
            $menu = DB::table('mastercds')
                      ->join('mastercategory', 'mastercds.category', '=', 'mastercategory.id')
                      ->where('mastercds.id','=',$id)
                      ->select('mastercds.*', 'mastercategory.categoryname')->get();

            $res['success'] = true;
            $res['data'] = $menu;
            $res['count'] = $menu->count();
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }


        //$data = MasterModel::where('id',$id)->get();
        //return response ($data);
    }

    public function store (Request $request){
        $data = new MasterModel();
        $data->title = $request->input('title');
        $data->rate = $request->input('rate');
        $data->category = $request->input('category');
        $data->qty = $request->input('qty');
        $data->baseprice = $request->input('baseprice');
        $data->save();
    
        return response('Data Successfully added');
    }

    public function update(Request $request, $id){
        $data = MasterModel::where('id',$id)->first();
        $data->title = $request->input('title');
        $data->rate = $request->input('rate');
        $data->category = $request->input('category');
        $data->qty = $request->input('qty');
        $data->baseprice = $request->input('baseprice');
        $data->save();
    
        return response('Data Updated');
    }
    
    public function destroy($id){
        $data = MasterModel::where('id',$id)->first();
        $data->delete();
    
        return response('Data Deleted');
    }


    //
}
