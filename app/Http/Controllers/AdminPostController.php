<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class AdminPostController extends Controller
{
    public function index()
    {

        if (request()->filled('search_word')) {
            request()->flash();
            $search_word = request('search_word');
            $list = Post::where('title', 'like', "%$search_word%")
                ->orderByDesc('created_at')->paginate(10);
        } else {
            $list = Post::orderByDesc('created_at')->paginate(10);
        }
        return view('admin.post.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new Post;
        $post_tags = [];
        $post_categories = [];
        if ($id > 0) {
            $entry = Post::find($id);
            $post_tags = $entry->tags()->pluck('tag_id')->all();
            $post_categories = $entry->categories()->pluck('category_id')->all();
        }
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.form', compact('entry', 'tags', 'post_tags', 'categories', 'post_categories'));
    }

    public function save($id = 0)
    {
        $data = request()->only('title', 'slug', 'description', 'author');
        if (!request()->filled('slug')) {
            $data['slug'] = str_slug(request('title'));
            request()->merge(['slug' => $data['slug']]);
        }
        $data_detail = request()->only(
            'show_banner',
            'show_recently',
            'show_most_read',
            'show_most_sidebar',
            'show_featured',
            'show_featured_sidebar',
            'show_big'
        );


        $this->validate(request(), [
            'title' => 'required',
            'slug' => request('original_slug') != request('slug') ?  'unique:post,slug' : '',
        ]);


        /*if(Category::whereSlug($data['slug'])->count() > 0)
        return back()->withInput()->withErrors(['slug'=>'Slug değer daha önceden kayıtlıdır']);*/

        $tags = request('tags');
        $categories = request('categories');
        //dd($categories);

        if ($id > 0) { //update
            $entry = Post::where('id', $id)->firstOrFail();
            $entry->update($data);
            $entry->detail()->update($data_detail);
            $entry->categories()->sync($categories); //select2 ile seçilen kategorileri güncellemeyi sağlar. Senkronize eder.
            $entry->tags()->sync($tags); //select2 ile seçilen kategorileri güncellemeyi sağlar. Senkronize eder.
        } else { //create
            $entry = Post::create($data);
            $entry->detail()->create($data_detail);
            $entry->categories()->attach($categories); //select2 ile seçilen kategorileri eklemeyi sağlar.
            $entry->tags()->attach($tags); //select2 ile seçilen kategorileri eklemeyi sağlar.
        }

        if (request()->hasFile('post_image')) {
            $this->validate(request(), [
                'post_image' => 'image|mimes:jpg,png,jpeg,gif|max:4096'
            ]);
            $post_image = request()->file('post_image'); //veya  request()->product_image; $product_image değişleni ile birlikte artık bu resim hakkında çeşitli bilgileri alabileceğim
            $post_image_file_name = $entry->id . "-" . time() . "." . $post_image->extension();

            if ($post_image->isValid()) {
                $post_image->move('uploads/posts', $post_image_file_name);
                Post::updateOrCreate(
                    ['id' => $entry->id],
                    ['img' => $post_image_file_name]
                );
            }
        }

        return  redirect()->route('admin.post.edit', $entry->id)
            ->with('message', ($id > 0 ? "Güncellendi" : "Yeni bir kayıt oluşturuldu"))
            ->with('message_type', 'success');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->categories()->detach();
        //$product->detail()->delete(); //softdelete kullandığımız için gerek yok
        $product->delete();

        return redirect()->route('manage.product')
            ->with('message_type', 'success')
            ->with('message', 'Kullanıcı silinmiştir.');
    }
}
