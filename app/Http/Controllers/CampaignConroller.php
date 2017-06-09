<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\Campaign;
use DB;
use Input;
use Hash;

class CampaignConroller extends Controller
{
    public function __construct()
    {
       $this->middleware('brand');
       
    }
  
   public function myCampaign()
    {
        return view('Brand.mycampaign');
    }

    public function index()
    {
        $this->user_id = session()->get('s_user_id');
        $user_id = $this->user_id;
        $items = Campaign::where('user_id',$user_id)->latest()->paginate(6);

        $response = [
            'pagination' => [
                'total' => $items->total(),
                'per_page' => $items->perPage(),
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem()
            ],
            'data' => $items
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'product_url' => 'required',
            'minprice' => 'required',
            'maxprice' => 'required',
            'productimg' => 'required',
            'deadline' => 'required',


        ]);

        // $file = $request->file('productimg'); 
        // $path = '/img';
        // $filename = $file->getClientOriginalName();
        // $file->move('assets/backend/img/place',$file->getClientOriginalName());
        // $request->productimg = $filename;
        $this->user_id = session()->get('s_user_id');
        $user_id = $this->user_id;
        $input = $request->all();

       
        $create = Campaign::create($input);
        $create->user_id = $user_id ;
        $create->save();
        
    

        return redirect()->to('/brand/mycampaign');
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'product_url' => 'required',
            'minprice' => 'required',
            'maxprice' => 'required',
            'productimg' => 'required',
            'deadline' => 'required',
        ]);

        $edit = Campaign::where('campaigns_id', $id)->update($request->all());

        return response()->json($edit);
    }

   
    public function destroy($id)
    {
        Campaign::where('campaigns_id', $id)->delete();
        return response()->json(['done']);
    }
}
