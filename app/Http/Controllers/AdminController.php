<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\ArtistType;
use App\Models\Show;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
        //dd($request);
        $chosenIds = $request->post('ids');
        $data = $request->session()->get('api-data');

        $passed = [];
        $failed = [];
        foreach($chosenIds as $id){
            //dd($data[$id]);
            //vérifier qu'on ne l'a pas déjà en db
            $slug = Str::slug($data[$id]['title'],'-');
            $existingShow = Show::firstWhere('slug', $slug);
            if(!empty($existingShow)) {
                $failed[] = ['id'=>$id, 'msg'=>'Show with same slug already in our database.'];
                continue;
            }

            //telecharger image
            $url = $data[$id]['poster'];
            $contents = file_get_contents($url);
            $extension = substr($url, strrpos($url, '.')+1);
            file_put_contents(public_path()."/images/show_posters/$slug.$extension", $contents);

            //créer le spectacle
            $show = Show::create([
                'title' => $data[$id]['title'],
                'description' => 'Description Unavailable',
                'poster_url' => $slug.".".$extension,
                'bookable' => false,
                'slug' => $slug,
            ]);
            if(empty($show)){
                $failed[] = ['id'=>$id, 'msg'=>'Failed Creating this Show'];
            }
            $show->created_at = date('Y-m-d',strtotime($data[$id]['insert_date']));
            $show->save();
            $passed[] = $id;

            //creer les auteurs
            foreach($data[$id]['authors'] as $author){
                $newAuthor = Artist::firstOrCreate([
                    'firstname' => ucfirst($author['firstname']),
                    'lastname' => ucfirst($author['lastname']),
                ]);
                $artistType = ArtistType::firstOrCreate([
                    'artist_id' => $newAuthor->id,
                    'type_id' => Type::firstWhere('type', 'auteur')->id,
                ]);
                $artistTypeShow = DB::table('artist_type_show')->insert([
                    'artist_type_id'=>$artistType->id,
                    'show_id'=>$show->id
                ]);
            }

            //créer les comédiens
            foreach($data[$id]['actors'] as $author){
                $newAuthor = Artist::firstOrCreate([
                    'firstname' => ucfirst($author['firstname']),
                    'lastname' => ucfirst($author['lastname']),
                ]);
                $artistType = ArtistType::firstOrCreate([
                    'artist_id' => $newAuthor->id,
                    'type_id' => Type::firstWhere('type', 'comédien')->id,
                ]);
                $artistTypeShow = DB::table('artist_type_show')->insert([
                    'artist_type_id'=>$artistType->id,
                    'show_id'=>$show->id
                ]);
            }

            //créer les scénographes
            foreach($data[$id]['directors'] as $author){
                $newAuthor = Artist::firstOrCreate([
                    'firstname' => ucfirst($author['firstname']),
                    'lastname' => ucfirst($author['lastname']),
                ]);
                $artistType = ArtistType::firstOrCreate([
                    'artist_id' => $newAuthor->id,
                    'type_id' => Type::firstWhere('type', 'scénographe')->id,
                ]);
                $artistTypeShow = DB::table('artist_type_show')->insert([
                    'artist_type_id'=>$artistType->id,
                    'show_id'=>$show->id
                ]);
            }

        }

        return view('admin.api.index', [
            'failed' => $failed,
            'passed'=>$passed,
            'shows'=>$data,
        ]);
    }
}
