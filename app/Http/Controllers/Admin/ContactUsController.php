<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ContactUsController extends Controller
{


    public function create()
    {
        $pageTitle = 'Contact Us';
        $homeLogo = DB::table('home_logo')->first();
        return view('admin.contact-us.create', compact('pageTitle','homeLogo'));
    }

    public function store(Request $request)
    {
      
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=1125,max_height=633',
            
        ],

        ['image.dimensions' => "Image size can't exceeds the size 1125px X 633px",

        'mimes' => 'Please upload valid image. Only JPG, JPEG and PNG extensions are allowed.',
        
        'image.required' => 'The Contact Us field is required.'
        ]    
    );

        $homeLogo = DB::table('home_logo')->first();

        if($homeLogo){
            $image = $homeLogo->contact_us_image;
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $name = 'contact_us.'.$image->getClientOriginalExtension();
                
                $destinationPath = public_path('admin_assets/images');
                $alreadyExist = public_path('admin_assets/images/'.$name);
                if(file_exists($alreadyExist)){
                    unlink($alreadyExist);
                }
                $image->move($destinationPath, $name);
                $image = $name;
            }
             DB::table('home_logo')->update([
                 'contact_us_image' => $image
             ]);
        }else{
            $image = $request->file('image');
            $name = 'contact_us.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('admin_assets/images');
            $alreadyExist = public_path('admin_assets/images/'.$name);
            if(file_exists($alreadyExist)){
                unlink($alreadyExist);
            }
            $image->move($destinationPath, $name);
            $image = $name;
            DB::table('home_logo')->insert([
                'contact_us_image' => $image
            ]);
        }


        return redirect()->back()->with('success', 'Contact Us added successfully');
    }


// for api

public function getdata(Request $request){
  
    $conatactus = DB::table('contact_us')->select('id','contact_us')->where("id","=",$request['id'])->get();

if(count($conatactus) > 0){
    return response()->json($conatactus);
}
else {
    $conatactus = '[{"id": "Not Found","contact_us":""}]';
 return response($conatactus);
}
 
 }


//for second api
public function getdata2(){
  
    $donate = DB::table('home_logo')->select('idi','contact_us_image')->first();

    $don_img = $donate->contact_us_image;
   

    if ($don_img == "") {

        $donate = '[{"contact_us_image":""}]';
        return response($donate);

        //return response()->json($don_img);    
    } else {
        $imagePath = 'mctv.banttechenergies.com/admin_assets/images/'.$don_img;

        $data = [
            'contact_us_image' => $imagePath,
           
        ];
      
        return response()->json($data);


        
    } 
 }

 }
