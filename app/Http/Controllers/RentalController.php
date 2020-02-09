<?php


namespace App\Http\Controllers;
use App\RentalModel;
use APP\MasterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;


class RentalController extends Controller
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
        $data = RentalModel::all();
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

        //$this->validate($request,[
          //  'date'=>'required|date_format:d-m-Y',
        //]);

        $data = new RentalModel();
        $data->cd_id = $request->input('cd_id');
        $data->customer_id = $request->input('customer_id');
        $data->qty = $request->input('qty');
        $data->date_from = $request->input('date_from');
        $data->date_to = $request->input('date_to');
        //$data->baseprice = $request->input('baseprice');

       

        $cekstok = DB::table('mastercds')
                        ->where('mastercds.id','=',$data->cd_id)
                        ->select(DB::raw('qty-'. $data->qty.' as qtynew'))->get();

        if($cekstok[0]->qtynew < 0){

            return response('Out Of Stock');
            
        }else{

            return response('Data Successfully added');

        }

       // $data->save();
    
       
    }

    public function update(Request $request, $id){
        $data = RentalModel::where('id',$id)->first();
        $data->title = $request->input('title');
        $data->rate = $request->input('rate');
        $data->category = $request->input('category');
        $data->qty = $request->input('qty');
        $data->baseprice = $request->input('baseprice');
        $data->save();
    
        return response('Data Updated');
    }
    
    public function destroy($id){
        $data = RentalModel::where('id',$id)->first();
        $data->delete();
    
        return response('Data Deleted');
    }


    //
}
