<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelpInstructionController extends Controller
{
    
    public function createEnglish()
    {
        $pageTitle = 'Help Instruction English';
        $homeLogo = DB::table('home_logo')->first();
        return view('admin.help-instruction.create_english', compact('pageTitle','homeLogo'));
    }
    public function createSpanish()
    {
        $pageTitle = 'Help Instruction Spanish';
        $homeLogo = DB::table('home_logo')->first();
        return view('admin.help-instruction.create_spanish', compact('pageTitle','homeLogo'));
    }

    public function storeEnglish(Request $request)
    {
      
        $this->validate($request, [
            'image_english' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=1125,max_height=633',
       
            
        ],

        ['image_english.dimensions' => "Image size can't exceeds the size 1125px X 633px.",
 
        'mimes' => 'Please upload valid image. Only JPG, JPEG and PNG extensions are allowed.',

        'image_english.required' => 'The Help Instruction English field is required.'

        ]
    
    );

        $homeLogo = DB::table('home_logo')->first();

        if($homeLogo){
            $image = $homeLogo->hi_english_image;
            if($request->hasFile('image_english')) {
                $image = $request->file('image_english');
                $name = 'help_instruction_english.'.$image->getClientOriginalExtension();
                
                $destinationPath = public_path('admin_assets/images');
                $alreadyExist = public_path('admin_assets/images/'.$name);
                if(file_exists($alreadyExist)){
                    unlink($alreadyExist);
                }
                $image->move($destinationPath, $name);
                $image = $name;
            }
             DB::table('home_logo')->update([
                 'hi_english_image' => $image
             ]);

        }
        
        else{
            $image = $request->file('image_english');
            $name = 'help_instruction_english.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('admin_assets/images');
            $alreadyExist = public_path('admin_assets/images/'.$name);
            if(file_exists($alreadyExist)){
                unlink($alreadyExist);
            }
            $image->move($destinationPath, $name);
            $image = $name;
            DB::table('home_logo')->insert([
                'hi_english_image' => $image
            ]);
       }

       return redirect()->back()->with('success', 'Help Instruction English added successfully');
    }



//for spanish 
public function storeSpanish(Request $request)
    {
      
        $this->validate($request, [
 
            'image_spanish' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:max_width=1125,max_height=633',
       
            
        ],

        ['image_spanish.dimensions' => "Image size can't exceeds the size 1125px X 633px.",
 
        'mimes' => 'Please upload valid image. Only JPG, JPEG and PNG extensions are allowed.',
        'image_spanish.required' => 'The Help Instruction Spanish field is required.'

        ]
    );

        $homeLogo = DB::table('home_logo')->first();

        if($homeLogo){
           $image = $homeLogo->hi_spanish_image;
            if($request->hasFile('image_spanish')) {
                $image = $request->file('image_spanish');
                $name = 'help_instruction_spanish.'.$image->getClientOriginalExtension();
                
                $destinationPath = public_path('admin_assets/images');
                $alreadyExist = public_path('admin_assets/images/'.$name);
                if(file_exists($alreadyExist)){
                    unlink($alreadyExist);
                }
                $image->move($destinationPath, $name);
                $image = $name;
            }
             DB::table('home_logo')->update([
                 'hi_spanish_image' => $image
             ]);

        }
        
        else{
            
            $image = $request->file('image_spanish');
            $name = 'help_instruction_spanish.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('admin_assets/images');
            $alreadyExist = public_path('admin_assets/images/'.$name);
            if(file_exists($alreadyExist)){
                unlink($alreadyExist);
            }
            $image->move($destinationPath, $name);
            $image = $name;
            DB::table('home_logo')->insert([
                'hi_spanish_image' => $image
            ]);
        }

        return redirect()->back()->with('success', 'Help Instruction Spanish added successfully');
    }

    
//for api



public function getdata(){
  
    $donate = DB::table('home_logo')->select('hi_english_image','hi_spanish_image')->first();

    $don_img1 = $donate->hi_english_image;
    $don_img2 = $donate->hi_spanish_image;
   

    if ($donate == "") {

        $donate = '[{"hi_english_image":""}]';
        return response($donate);

        //return response()->json($don_img);    
    } else {
        $imagePath1 = 'mctv.banttechenergies.com/admin_assets/images/'.$don_img1;
        $imagePath2 = 'mctv.banttechenergies.com/admin_assets/images/'.$don_img2;

        $data = [
            'hi_english_image' => $imagePath1,
            'hi_spanish_image' => $imagePath2,
           
        ];
      
        return response()->json($data);

    } 
 }

}
