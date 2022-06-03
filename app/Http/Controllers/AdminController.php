<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.admin_login');
    }

    public function Dashboard()
    {
        return view('admin.index');
    }

    public function Login(Request $request)
    {
        // dd($request->all());

        //la condtion va regarder notre guard admin
        //on va aller regarder dans notre table admin si l'email et le pwd sont correct

        $check = $request->all();
        if (Auth::guard('admin')->attempt([
            'email' => $check['email'],
            'password' => $check['password']
        ])) {
            return redirect()->route('admin.dashboard');
        }else{
            return back();
        }
    }

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('login_form');
    }

    public function apiIndex(){
        return view('admin.api.index');
    }

    public function apiSearch(Request $request){

        $keyword = str_replace(' ', '_', $request->post('keyword'));
        $key = $request->post('key');

       

        $url = "https://www.theatre-contemporain.net/api/spectacles/all/search?$key=$keyword&k=".env('THEATRE_API');
        $response = Http::withOptions([
            'verify'=>false
        ])->get($url);

        if($response->ok()){
            //dd($response->json);
            $data = $response->json();
            $request->session()->put('api-data', $data);
            return view('admin.api.index', [
                'data'=>$data,
                'keyword' => $keyword,
                'key'=>$key
            ]);
        }
        return view('admin.api.index');
    }

    public function apiImport(Request $request){
        dd($request);
        
    }
}
