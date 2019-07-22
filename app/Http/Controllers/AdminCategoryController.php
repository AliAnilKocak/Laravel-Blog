<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {

        if (request()->filled('search_word')) {
            request()->flash();
            $search_word = request('search_word');
            $list = Category::where('name', 'like', "%$search_word%")
                ->orderByDesc('created_at')->paginate(10);
        } else {
            $list = Category::orderByDesc('created_at')->paginate(10);
        }
        return view('admin.category.index', compact('list'));
    }


    public function form($id = 0)
    {
        $entry = new Category;
        if ($id > 0) {
            $entry = Category::find($id);
        }
        return view('admin.category.form', compact('entry'));
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
            'slug' => request('original_slug') != request('slug') ?  'unique:category,slug' : '',
        ]);

        if ($id > 0) { //update
            $entry = Category::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else { //create
            $entry = Category::create($data);
        }

        return  redirect()->route('admin.category.edit', $entry->id)
            ->with('message', ($id > 0 ? "Güncellendi" : "Yeni bir kayıt oluşturuldu"))
            ->with('message_type', 'success');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.categories')
            ->with('message_type', 'success')
            ->with('message', 'Kullanıcı silinmiştir.');
    }
}
