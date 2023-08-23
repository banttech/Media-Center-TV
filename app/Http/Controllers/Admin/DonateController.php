<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DonateController extends Controller
{
    // public function index()
    // {  
    //     $pageTitle = 'Manage Music Category';
    //     $musicCategories = DB::table('music_categories')->latest()->paginate(10);
    //     return view('admin.music-categories.index', compact('pageTitle', 'musicCategories'));
    // }

    public function create()
    {
        $pageTitle = 'Donate';
        $homeLogo = DB::table('home_logo')->first();
        return view('admin.donate.create', compact('pageTitle','homeLogo'));
    }

    public function store(Request $request)
    {
       
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=1125,max_height=633',
            
        ],

        ['image.dimensions' => "Image size can't exceeds the size 1125px X 633px",

        'mimes' => 'Please upload valid image. Only JPG, JPEG and PNG extensions are allowed.',

        'image.required' => 'The donate field is required'
        
        ]
    
    );

        $homeLogo = DB::table('home_logo')->first();

        if($homeLogo){
            $image = $homeLogo->donate_image;
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $name = 'donate.'.$image->getClientOriginalExtension();
                
                $destinationPath = public_path('admin_assets/images');
                $alreadyExist = public_path('admin_assets/images/'.$name);
                if(file_exists($alreadyExist)){
                    unlink($alreadyExist);
                }
                $image->move($destinationPath, $name);
                $image = $name;
            }
             DB::table('home_logo')->update([
                 'donate_image' => $image
             ]);
        }else{
            $image = $request->file('image');
            $name = 'donate.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('admin_assets/images');
            $alreadyExist = public_path('admin_assets/images/'.$name);
            if(file_exists($alreadyExist)){
                unlink($alreadyExist);
            }
            $image->move($destinationPath, $name);
            $image = $name;
            DB::table('home_logo')->insert([
                'donate_image' => $image
            ]);
        }


        return redirect()->back()->with('success', 'Donate added successfully');
    }

    


// for api
public function getdata(Request $request){
  
    $donate = DB::table('donate')->select('id','donate')->where("id","=",$request['id'])->get();

if(count($donate) > 0){

    return response()->json($donate);
}
else {
    $donate = '[{"id": "Not Found","donate":""}]';
 return response($donate);
}
 
 }

 public function getdata2(){
  
    $donate = DB::table('home_logo')->select('idi','donate_image')->first();

    $don_img = $donate->donate_image;
   

    if ($don_img == "") {

        $donate = '[{"donate_image":""}]';
        return response($donate);

        //return response()->json($don_img);    
    } else {
        $imagePath = 'mctv.banttechenergies.com/admin_assets/images/'.$don_img;

        $data = [
            'donate_image' => $imagePath,
           
        ];
      
        return response()->json($data);


        
    } 
 }
  
}
