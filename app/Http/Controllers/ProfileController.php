<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $profiles = Profile::all();

        return view("profile.profile", compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        //* request validate
        request()->validate([
            "file" => "required|mimes:png|max:1024"
        ]);

        //* storing the request file  in a variable
        $file = $request->file;

        //* make a unique name for  image

        $fileName = hash("sha256", file_get_contents($file)) . "." . $file->getClientOriginalExtension();

        //* save  image  with the hash Name

        $file->move(storage_path("app/public/images"), $fileName);

        //* store  image name in database 

        Profile::create([
            "name" => $fileName
        ]);

        return back();
    }

    public function urlStore(Request $request)
    {
        request()->validate([
            "url" => "required|url"
        ]);

        $file = file_get_contents($request->url);

        // parse_url($request->url , PHP_URL_PATH)  ====   "findyours-php/viewfinder/images/res70/469000/469963-Hassan-Ii-Mosque.jpg"

        $extension =  pathinfo(parse_url($request->url, PHP_URL_PATH), PATHINFO_EXTENSION);

        $fileName = hash("sha256", $file) . "." . $extension;

        Storage::disk("public")->put("images/" . $fileName, $file);

        Profile::create([
            "name" => $fileName
        ]);
        return back();
    }


    /**
     * Display the specified resource.
     */
    public function show(profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(profile $profile)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, profile $profile)
    {
        //
        request()->validate([
            "file" => "required|mimes:png|max:1024"
        ]);

        //* method 1

        $path = "images/" . $profile->name;
        $storage = Storage::disk("public");

        if (file_exists($path)) {
            $storage->delete($path);
            $request->file->move(storage_path("app/public/images"), $profile->name);
        };

        //* method 2

        // $path = storage_path("app/public/images/" . $profile->name);
        // if (file_exists($path)) {
        //     unlink($path);
        //     $request->file->move(storage_path("app/public/images"), $profile->name);
        // };

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {

        $path = "images/" . $profile->name;
        $storage = Storage::disk("public");

        if ($storage->exists($path)) {
            $storage->delete($path);
            $profile->delete();
        }

        return back();
    }
}
