<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;

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
            $mangaFields['manga_cover'] = $request->file('manga_cover')->store('mangaCovers', 'public');     
        };

        Manga::create($mangaFields);
        return back()->with('status', 'Manga Created');
    }
}  
