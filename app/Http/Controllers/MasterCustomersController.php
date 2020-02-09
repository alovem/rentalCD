<?php


namespace App\Http\Controllers;
use App\MasterCustomers;
use Illuminate\Http\Request;


class MasterCustomersController extends Controller
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
        $data = MasterCustomers::all();
        return response($data);
    }
    public function show($id){
        $data = MasterCustomers::where('id',$id)->get();
        return response ($data);
    }
    public function store (Request $request){
        $data = new MasterCustomers();
        $data->id = $request->input('id');
        $data->customername = $request->input('customername');
        $data->customeraddress = $request->input('customeraddress');
       // $data->category = $request->input('category');
        //$data->qty = $request->input('qty');
        $data->save();
    
        return response('Data successfully added');
    }


    public function update(Request $request, $id){
        $data = MasterCustomers::where('id',$id)->first();
        $data->id = $request->input('id');
        $data->customername = $request->input('customername');
        $data->customeraddress = $request->input('customeraddress');
        $data->save();
    
        return response('Data Updated');
    }
    
    public function destroy($id){
        $data = MasterCustomers ::where('id',$id)->first();
        $data->delete();
    
        return response('Data Deleted');
    }

    //
}
