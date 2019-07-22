<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class AdminTagController extends Controller
{
    public function index()
    {

        if (request()->filled('search_word')) {
            request()->flash();
            $search_word = request('search_word');
            $list = Tag::where('name', 'like', "%$search_word%")
                ->orderByDesc('created_at')->paginate(10);
        } else {
            $list = Tag::orderByDesc('created_at')->paginate(10);
        }
        return view('admin.tag.index', compact('list'));
    }


    public function form($id = 0)
    {
        $entry = new Tag;
        if ($id > 0) {
            $entry = Tag::find($id);
        }
        return view('admin.tag.form', compact('entry'));
    }

    public function save($id = 0)
    {

        //dd(request('content'));
        $data = request()->only('name', 'slug');
        if (!request()->filled('slug')) {
            $data['slug'] = str_slug(request('name'));
            request()->merge(['slug' => $data['slug']]);
        }

        $this->validate(request(), [
            'name' => 'required',
            'slug' => request('original_slug') != request('slug') ?  'unique:tag,slug' : '',
        ]);

        if ($id > 0) { //update
            $entry = Tag::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else { //create
            $entry = Tag::create($data);
        }

        return  redirect()->route('admin.tag.edit', $entry->id)
            ->with('message', ($id > 0 ? "Güncellendi" : "Yeni bir kayıt oluşturuldu"))
            ->with('message_type', 'success');
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('admin.tags')
            ->with('message_type', 'success')
            ->with('message', 'Kullanıcı silinmiştir.');
    }
}
