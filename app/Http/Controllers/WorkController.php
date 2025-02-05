<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index() {
        $works = Work::where('user_id', Auth::user()->id)->get();
        $userId = Auth::id();
        return view('dashboard', compact('works', 'userId'));
    }
    
    public function create() {
        $works = Work::all();
        $categories = Category::all();
        $userId = Auth::id();
        return view('works.create', compact('works', 'categories', 'userId'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'path_img' => 'image|mimes:png,jpg,jpeg,gif|max:1000',
            'score' => ['string', 'max:255'],
        ]);

        $imageName = time() . '.' . $request['path_img']->extension();
        $request['path_img']->move(public_path('images'), $imageName);

        Work::create([
            'title' => $request->title,
            'path_img' => $imageName,
            "user_id" => Auth::user()->id,
            "category_id" => $request->category,
            "score" => null,
        ]);

        return redirect()->route('dashboard');
    }

    public function update(Request $request) {
        $request->validate([
            'score' => ['required'],
            'id' => ['required']
        ]);

        Work::where('id', $request->id)->update([
            'score' => $request->score,
        ]);
        return redirect()->back();
    }
}
