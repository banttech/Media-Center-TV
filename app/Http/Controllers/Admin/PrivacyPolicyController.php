<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrivacyPolicyController extends Controller
{
    public function createEnglish()
    {
        $pageTitle = 'Privacy Policy English';
        $homeLogo = DB::table('home_logo')->first();
        return view('admin.privacy-policy.create_english', compact('pageTitle','homeLogo'));
    }
    public function createSpanish()
    {
        $pageTitle = 'Privacy Policy Spanish';
        $homeLogo = DB::table('home_logo')->first();
        return view('admin.privacy-policy.create_spanish', compact('pageTitle','homeLogo'));
    }

    public function storeEnglish(Request $request)
    {
      
        $this->validate($request, [
            //'image_english' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=1125,max_height=633',
            'image_english' => 'required|image|mimes:jpg,png,jpeg',
        ],

        ['image_english.dimensions' => "Image size can't exceeds the size 1125px X 633px.",
          
          'mimes' => 'Please upload valid image. Only JPG, JPEG and PNG extensions are allowed.',
          'image_english.required' => 'The Privacy Policy English field is required.'
        ]
    
    );

        $homeLogo = DB::table('home_logo')->first();

        if($homeLogo){
            $image = $homeLogo->pp_english_image;
            if($request->hasFile('image_english')) {
                $image = $request->file('image_english');
                $name = 'privacy_policy_english.'.$image->getClientOriginalExtension();
                
                $destinationPath = public_path('admin_assets/images');
                $alreadyExist = public_path('admin_assets/images/'.$name);
                if(file_exists($alreadyExist)){
                    unlink($alreadyExist);
                }
                $image->move($destinationPath, $name);
                $image = $name;
            }
             DB::table('home_logo')->update([
                 'pp_english_image' => $image
             ]);

        }
        
        else{
            $image = $request->file('image_english');
            $name = 'privacy_policy_english.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('admin_assets/images');
            $alreadyExist = public_path('admin_assets/images/'.$name);
            if(file_exists($alreadyExist)){
                unlink($alreadyExist);
            }
            $image->move($destinationPath, $name);
            $image = $name;
            DB::table('home_logo')->insert([
                'pp_english_image' => $image
            ]);
       }

       return redirect()->back()->with('success', 'Privacy Policy English added successfully');
    }



//for spanish 
public function storeSpanish(Request $request)
    {
      
        $this->validate($request, [
 
            //'image_spanish' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=1125,max_height=633',
            'image_spanish' => 'required|image|mimes:jpg,png,jpeg',
        ],

        ['image_spanish.dimensions' => "Image size can't exceeds the size 1125px X 633px.",
          
          'mimes' => 'Please upload valid image. Only JPG, JPEG and PNG extensions are allowed.',
          'image_spanish.required' => 'The Privacy Policy Spanish field is required.'
        ]
    
    );

        $homeLogo = DB::table('home_logo')->first();

        if($homeLogo){
           $image = $homeLogo->pp_spanish_image;
            if($request->hasFile('image_spanish')) {
                $image = $request->file('image_spanish');
                $name = 'privacy_policy_spanish.'.$image->getClientOriginalExtension();
                
                $destinationPath = public_path('admin_assets/images');
                $alreadyExist = public_path('admin_assets/images/'.$name);
                if(file_exists($alreadyExist)){
                    unlink($alreadyExist);
                }
                $image->move($destinationPath, $name);
                $image = $name;
            }
             DB::table('home_logo')->update([
                 'pp_spanish_image' => $image
             ]);

        }
        
        else{
            
            $image = $request->file('image_spanish');
            $name = 'privacy_policy_spanish.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('admin_assets/images');
            $alreadyExist = public_path('admin_assets/images/'.$name);
            if(file_exists($alreadyExist)){
                unlink($alreadyExist);
            }
            $image->move($destinationPath, $name);
            $image = $name;
            DB::table('home_logo')->insert([
                'pp_spanish_image' => $image
            ]);
        }

        return redirect()->back()->with('success', 'Privacy Policy Spanish added successfully');
    }
   

// for second api

public function getdata(){
  
    $donate = DB::table('home_logo')->select('pp_english_image','pp_spanish_image')->first();

    $don_img1 = $donate->pp_english_image;
    $don_img2 = $donate->pp_spanish_image;
   

    if ($donate == "") {

        $donate = '[{"pp_english_image":""}]';
        return response($donate);

        //return response()->json($don_img);    
    } else {
        $imagePath1 = 'mctv.banttechenergies.com/admin_assets/images/'.$don_img1;
        $imagePath2 = 'mctv.banttechenergies.com/admin_assets/images/'.$don_img2;

        $data = [
            'pp_english_image' => $imagePath1,
            'pp_spanish_image' => $imagePath2,
           
        ];
      
        return response()->json($data);

    } 
 }
//api for spanish

 public function getdataSpanish(){
  
    $donate = DB::table('home_logo')->select('idi','pp_spanish_image')->first();

    $don_img = $donate->pp_spanish_image;
   

    if ($don_img == "") {

        $donate = '[{"pp_spanish_image":""}]';
        return response($donate);

        //return response()->json($don_img);    
    } else {
        $imagePath = 'mctv.banttechenergies.com/admin_assets/images/'.$don_img;

        $data = [
            'pp_spanish_image' => $imagePath,
           
        ];
      
        return response()->json($data);

    } 
 }


}