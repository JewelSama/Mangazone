<?php

namespace App\Http\Controllers;

use App\Models\Manga;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MangaController extends Controller
{
    public function store(Request $request){
        $mangaFields = $request->validate([
            "name" => 'required',
            "category" => 'required',
            "price" => 'required',
            "mangaka" => 'required',
            "description" => 'required',
        ]);

        if($request->hasFile('manga_file')){
            $mangaFields['manga_file'] = $request->file('manga_file')->store('mangaFiles', 'public');     
        };

        if($request->hasFile('manga_cover')){
            $mangaFields['manga_cover'] = $request->file('manga_cover')->store('mangaCOvers', 'public');     
        };

        Manga::create($mangaFields);
        return back()->with('status', 'Manga Created');
    }

    public function editManga($id){
        $manga = Manga::find($id);
        return view('admin.edit', compact('manga'));
    }


    
    public function updateManga(Request $request, Manga $manga){
        $mangaFields = $request->validate([
            "name" => 'required',
            "category" => 'required',
            "price" => 'required',
            "mangaka" => 'required',
            "description" => 'required',
        ]);

        if($request->hasFile('manga_file')){
            $mangaFields['manga_file'] = $request->file('manga_file')->store('mangaFiles', 'public');     
        };

        if($request->hasFile('manga_cover')){
            $mangaFields['manga_cover'] = $request->file('manga_cover')->store('mangaCOvers', 'public');     
        };

        $manga->update($mangaFields);
        return redirect()->route('manga')->with('status', 'Manga Updated!!');
    }



    public function destroy(Manga $manga){
        $manga->delete();
        return redirect()->route('manga')->with('status', 'Manga Deleted!!');
    }

    public function orders(){
        return view('admin.order');    
    }
    

    

    // public function updateManga(Request $request,  $id){
       
        
    //     $manga = Manga::find($id);

    //     // $mangaFields = $request->validate([
    //     //     "name" => 'required',
    //     //     "category" => 'required',
    //     //     "price" => 'required',
    //     //     "mangaka" => 'required',
    //     //     "description" => 'required',
    //     // ]);
    //     // if($request->hasFile('manga_file')){
    //     //     $mangaFields['manga_file'] = $request->file('manga_file')->store('mangaFiles', 'public');     
    //     // };
        
    //     // if($request->hasFile('manga_cover')){
    //     //     $mangaFields['manga_cover'] = $request->file('manga_cover')->store('mangaCvers', 'public');     
    //     // };

    //     if($request->hasFile('manga_file')){
    //         $path = 'storage/'.$manga->manga_file;
    //         if(File::exists($path))
    //         {
    //             File::delete($path);
    //         }
    //         // $file = $request->file('manga_file');
    //         $request->manga_file = $path; 
    //     }

    //     $manga->name = $request->name;
    //     $manga->category = $request->category;
    //     $manga->price = $request->price;
    //     $manga->mangaka = $request->mangaka;
    //     $manga->description = $request->description;
        


    //     $manga->update();
    //     return redirect()->route('manga')->with('status', 'Manga Updated!!');


    // }
}  
