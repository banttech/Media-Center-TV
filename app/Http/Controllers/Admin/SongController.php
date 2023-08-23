<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Make;
//use App\Models\Year;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $apps = DB::table('apps')->latest()->paginate(10);
        $pageTitle = 'Manage Apps';
        return view('admin.apps.index', compact('apps', 'pageTitle'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');


        $apps = DB::table('apps')
            ->where( 'app_name','like', '%' . $search . '%')->ORwhere( 'keyword','like', '%' . $search . '%')
            ->orderBy('id')
            ->paginate(10);

        $pageTitle = 'Manage Apps';
        return view('admin.apps.index', compact('apps', 'pageTitle','search'));
    }

    public function create()
    {
        $pageTitle = 'Add Apps';
      
        return view('admin.apps.create', compact('pageTitle'));
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'app_name' => 'required',
            'keyword' => 'required',
            'url' => 'required|url',
                  
        ],[

        'app_name.required' => 'App Name field is required!',
        'keyword.required' => 'Keyword field is required!',
        'url.required' => 'URL field is required!',

        ]
    
    );

    
        $appId = DB::table('apps')->insertGetId([
            'app_name' => $request->app_name,
            'keyword' => $request->keyword,        
            'slug' => strtolower(preg_replace('/\s+/', '-', $request->app_name)),
            'url' => $request->url,
        ]);

        return redirect()->route('apps.index')->with('success', 'App added successfully.');
    }
  
    public function edit($id)
    {
        $apps = DB::table('apps')->find($id);
        $pageTitle = 'Edit App';
      
        return view('admin.apps.edit', compact('apps', 'pageTitle'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'app_name' => 'required',
            'keyword' => 'required',
            'url' => 'required',
            
        ],
    [
        'app_name.required' => 'App Name field is required!',
        'keyword.required' => 'Keyword field is required!',
        'url.required' => 'URL field is required!',
        
    ]);

        $apps = DB::table('apps')->find($id);

      

        DB::table('apps')->where('id', $id)->update([
            'app_name' => $request->app_name,
            'keyword' => $request->keyword,
            'url' => $request->url,
      
        ]);

      
        return redirect()->route('apps.index')->with('success', 'App updated successfully.');
    }
    public function delete($id)
    {
        DB::table('apps')->where('id', $id)->delete();
      
        return redirect()->route('apps.index')->with('success', 'App deleted successfully.');
    }

    public function logo(){
              
        return view('admin.site-settings.update-logo');
    }
   

    public function getdata(Request $request){
       
    
       $apps = DB::table('apps')->select('id','app_name', 'keyword', 'url')->where("keyword","=",$request['keyword'])->get();

if(count($apps) > 0){
       return response()->json($apps);
}
else {
    $apps = '[{"id": 0,"app_name":"", "keyword":"Not Found","url":""}]';
    return response($apps);
}
    
    }

}




