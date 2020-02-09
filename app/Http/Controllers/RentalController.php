<?php


namespace App\Http\Controllers;
use App\RentalModel;
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

        
        //$data->baseprice = $request->input('baseprice');

        $data = new RentalModel();
        $data->cd_id = $request->input('cd_id');
        $data->customer_id = $request->input('customer_id');
        $data->qty = $request->input('qty');
        $data->date_from = $request->input('date_from');
        $data->date_to = $request->input('date_to');

        $earlier = new \DateTime($data->date_from);
        $later = new \DateTime($data->date_to);
        
        $diff = $later->diff($earlier)->format("%a");

        $cekstok = DB::table('mastercds')
                        ->where('mastercds.id','=',$data->cd_id)
                        ->select(DB::raw('qty-'. $data->qty.' as qtynew,baseprice*'.$diff.' as totalcost'))->get();

        //echo ($cekstok[0]->totalcost);

        if($cekstok[0]->qtynew < 0){

            return response('Out Of Stock');

        }else{

           
            $data->save();
            
            DB::table('mastercds')
            ->where('id', $data->cd_id)
            ->update(['qty' => $cekstok[0]->qtynew]);

            $res['message']='Data Successfully added';
            $res['totalcost']=$cekstok[0]->totalcost;

            return response(["messages"=> "Data Successfully added" , "totalcost" => $cekstok[0]->totalcost]);

        }

       // 
    
       
    }

    public function update(Request $request, $id){
        $datas = RentalModel::where('id',$id)->first();
        $datas->cd_id = $request->input('cd_id');
        $datas->customer_id = $request->input('customer_id');
        $datas->qty = $request->input('qty');
        $datas->date_from = $request->input('date_from');
        $datas->date_to = $request->input('date_to');
       // $data->save();

        $earlierupdate = new \DateTime($datas->date_from);
        $laterupdate = new \DateTime($datas->date_to);
        
        $diffupdate = $laterupdate->diff($earlierupdate)->format("%a");


        $cekstokupdate = DB::table('mastercds')
                        ->where('mastercds.id','=',$datas->cd_id)
                        ->select(DB::raw('qty-'. $datas->qty.' as qtyupdate,baseprice*'.$diffupdate.' as totalcost'))->get();

         if($cekstokupdate[0]->qtyupdate < 0){

                return response('Out Of Stock');
                
          }else{
                
                           
            $datas->save();
                
            $cekbeforeqty = DB::table('rental')
                            ->where('rental.cd_id','=',$datas->cd_id)
                            ->select(DB::raw('SUM(qty) as totalqty'))->get();  

            //echo  ($cekbeforeqty[0]->totalqty);
                
               // DB::table('mastercds')
               // ->where('id', $data->cd_id)
                //->update(['qty' => $cekstokupdate[0]->qtyupdatew]);

                //$res['message']='Data Successfully updated';
                //$res['totalcost']=$cekstokupdate[0]->totalcost;
    
                return response(["messages"=> "Data Successfully updated" , "totalcost" => $cekstokupdate[0]->totalcost]);

          }
    }
    
    public function destroy($id){
        $data = RentalModel::where('id',$id)->first();
        $data->delete();
    
        return response('Data Deleted');
    }


    //
}
