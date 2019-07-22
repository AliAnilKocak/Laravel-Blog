<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navbar;

class AdminNavbarController extends Controller
{
    public function index()
    {


        if (request()->filled('search_word')) {
            request()->flash();
            $search_word = request('search_word');
            $list = Navbar::where('name', 'like', "%$search_word%")
                ->orderByDesc('created_at')->paginate(10);
        } else {
            $list = Navbar::orderByDesc('created_at')->paginate(10);
        }
        return view('admin.page.index', compact('list'));
    }


    public function form($id = 0)
    {
        $entry = new Navbar;
        if ($id > 0) {
            $entry = Navbar::find($id);
        }
        return view('admin.page.form', compact('entry'));
    }

    public function save($id = 0)
    {

        //dd(request('content'));
        $data = request()->only('name', 'slug', 'color');
        if (!request()->filled('slug')) {
            $data['slug'] = str_slug(request('name'));
            request()->merge(['slug' => $data['slug']]);
        }

        $this->validate(request(), [
            'name' => 'required',
            'slug' => request('original_slug') != request('slug') ?  'unique:navbar_category,slug' : '',
        ]);

        if ($id > 0) { //update
            $entry = Navbar::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else { //create
            $entry = Navbar::create($data);
        }

        return  redirect()->route('admin.page.edit', $entry->id)
            ->with('message', ($id > 0 ? "Güncellendi" : "Yeni bir kayıt oluşturuldu"))
            ->with('message_type', 'success');
    }

    public function delete($id)
    {
        $page = Navbar::find($id);
        return redirect()->route('admin.pages')
            ->with('message_type', 'success')
            ->with('message', 'Kullanıcı silinmiştir.');
    }
}
