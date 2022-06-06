<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Show;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    public function exportView(){
        return view('admin.export');
    }

    public function importView(){
        return view('admin.import');
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

        $fileName = "exports/$resource.$format";
        $lignes = DB::table($resource)->get();
        $fp = fopen($fileName, "w");
        foreach($lignes as $ligne){
            fputcsv($fp, json_decode(json_encode($ligne), true), ';');
        }
        fclose($fp);
        
        return response()->download($fileName,"$resource.csv")->deleteFileAfterSend(true);
    }

    public function importStore(Request $request, $resource, $format){
        
        if(!in_array($resource, ['artists', 'shows'])){
            return view('admin.import', [
                'error' => 'Ressource Inconnue.'
            ]);
        }
        if(!in_array($format, ['csv', 'json', 'xml'])){
            return view('admin.import', [
                'error' => 'Format Inconnu.'
            ]);
        }       

        $extension = $request->file('rows')->getClientOriginalExtension();
        $filename = uniqid().'.'.$extension; 
        $filePath = Storage::putFileAs('public/imports', $request->file('rows'), $filename);
        //$filePath = str_replace('public/','storage/',$filePath);
        $fp = fopen('../storage/app/'.$filePath, "r");
        //dd($filePath, $fp);
        $count = 0;
        while( ($ligne = fgetcsv($fp, 2048, ";"))!==false){
            if($resource=='artists'){
                $lignes[] = $ligne;
                $artist = Artist::where([
                    'firstname'=>$ligne[0],
                    'lastname'=>$ligne[1],
                ])->first();
                if(empty($artist)){
                    $a = new Artist();
                    $a->firstname = $ligne[0];
                    $a->lastname = $ligne[1];
                    $a->save();
                    $count++;
                }
            } else if($resource=='shows'){
                $lignes[] = $ligne;
                $slug = Str::slug($ligne[0],'-');
                $show = Show::where([
                    'slug'=>$slug,
                ])->first();
                if(empty($show) && !empty($slug)){
                    $s = new Show();
                    $s->title = $ligne[0];
                    $s->description = $ligne[1];
                    $s->location_id = is_integer($ligne[2]) ? $ligne[2] : null;
                    $s->bookable = $ligne[3] == 1 ? 1 : 0;
                    $s->price =  is_float($ligne[4]) ? $ligne[4] : null;
                    $s->created_at =  $ligne[5] ? strtotime($ligne[5]) : now();
                    $s->updated_at =  $ligne[6] ? strtotime($ligne[6]) : now();
                    $s->slug = $slug;
                    $s->poster_url = 'unavailable.png';
                    $s->save();
                    $count++;
                }
            }
        }
        fclose($fp);

        return view('admin.import', [
            'count'=>$count
        ]);
    }
}
