<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function exportView(){
        return view('admin.export');
    }

    public function exportGet($resource, $format){
        if(!in_array($resource, ['artists', 'shows'])){
            return view('admin.export', [
                'error' => 'Ressource Inconnue.'
            ]);
        }
        if(!in_array($format, ['csv', 'json', 'xml'])){
            return view('admin.export', [
                'error' => 'Format Inconnu.'
            ]);
        }

        $lignes = DB::table($resource)->get();
        $fp = fopen("exports/$resource.$format", "w");
        foreach($lignes as $ligne){
            fputcsv($fp, json_decode(json_encode($ligne), true), ';');
        }
        fclose($fp);

        return view('admin.export');
    }
}
