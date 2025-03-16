<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = Diary::orderBy('created_at', 'desc')->paginate(5);
        return view('diaries.index', compact('diaries'));
    }

    public function create()
    {
        return view('diaries.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $diary = new Diary();
        $diary->content = $request->input('content');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('img', 'public');
            $diary->image_path = str_replace('public/', '', $path);
        }
        $diary->save();
    
        return redirect()->route('diary.index')->with('success', '日記を書きました');
    }
    

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $diary = Diary::findOrFail($id);
        return view('diaries.edit', compact('diary'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $diary = Diary::findOrFail($id);
        $diary->content = $request->input('content');
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('img', 'public');
            $diary->image_path = str_replace('public/', '', $path);
        }
    
        $diary->save();
    
        return redirect()->route('diary.index')->with('success', '日記を編集しました');
    }

    public function destroy(string $id)
    {
        $diary = Diary::findOrFail($id);
        $diary->delete();

        return redirect()->route('diary.index')->with('success', '日記を削除しました');
    }
}
