@extends('admin.layouts.master')
@section('title','Home')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
                @include('admin.layouts.partials.alert')
                @include('admin.layouts.partials.errors')
                <form  name="your_form" onSubmit="document.your_form.editor_contents.value = $('#editor').html()" enctype="multipart/form-data" action="{{route('admin.post.save',@$entry->id)}}" method="POST">
                        {{ csrf_field() }}
            <div class="x_panel">
                <div class="x_title">

                    <div class="clearfix"></div>
                </div>


                    <div class="col-md-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <!-- start form for validation -->

                                <label for="title">Başlık * :</label>
                                <input type="text" value="{{old('description',$entry->title)}}" id="title"
                                    class="form-control" name="title" required="">
                                <br>
                                <label for="description">Açıklama * :</label>
                                <input type="text" id="description" class="form-control"
                                    value="{{old('description',$entry->description)}}" name="description"
                                    data-parsley-trigger="change" required="">
                                <br>
                                <label for="slug">Slug * :</label>
                                <input type="hidden" name="original_slug" id="original_slug"
                                    value="{{old('slug',$entry->slug)}}">
                                <input type="text" id="slug" class="form-control"
                                    value="{{old('description',$entry->slug)}}" name="slug"
                                    data-parsley-trigger="change" required="">
                                <br>
                                <label for="author">Yazar * :</label>
                                <input value="{{old('description',$entry->author)}}" type="text" value="Ali Anil Kocak"
                                    id="author" class="form-control" name="author" data-parsley-trigger="change"
                                    required="">

                                <!-- end form for validations -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="x_panel">

                            <div class="x_content">
                                <!-- start form for validation -->

                                <div class="checkbox">
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                            <input type="hidden" name="show_banner" value="0" id="">
                                        <input {{old('show_banner',$entry->detail->show_banner) ? 'checked' : '' }}
                                            name="show_banner" value="1" type="checkbox">
                                        Banner
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                            <input type="hidden" name="show_recently" value="0" id="">
                                        <input {{old('show_recently',$entry->detail->show_recently) ? 'checked' : '' }}
                                            name="show_recently" value="1" type="checkbox">
                                        Son Yayınlanan
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                            <input type="hidden" name="show_most_read" value="0" id="">
                                        <input {{old('show_most_read',$entry->detail->show_most_read) ? 'checked' : '' }}
                                            name="show_most_read" value="1" type="checkbox">
                                        Çok Okunan
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                            <input type="hidden" name="show_most_read_sidebar" value="0" id="">
                                        <input
                                            {{old('show_most_read_sidebar',$entry->detail->show_most_read_sidebar) ? 'checked' : '' }}
                                            name="show_most_read_sidebar" value="1" type="checkbox">
                                        Çok Okunan Sidebar
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                            <input type="hidden" name="show_featured" value="0" id="">
                                        <input {{old('show_featured',$entry->detail->show_featured) ? 'checked' : '' }}
                                            name="show_featured" value="1" type="checkbox">
                                        Yeni Özellikli
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                            <input type="hidden" name="show_featured_sidebar" value="0" id="">
                                        <input
                                            {{old('show_featured_sidebar',$entry->detail->show_featured_sidebar) ? 'checked' : '' }}
                                            name="show_featured_sidebar" value="1" type="checkbox">
                                        Çok Özellikli Sidebar
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                            <input type="hidden" name="show_big" value="0" id="">
                                        <input {{old('show_big',$entry->detail->show_big) ? 'checked' : '' }}
                                            name="show_big" value="1" type="checkbox">
                                        Büyük Post
                                    </label>

                                    <h5>Tagler</h5><select multiple name="tags[]" class="form-control" id="tags">
                                        @foreach ($tags as $tag)
                                        <option
                                            {{collect(old('tags',$post_tags))->contains($tag->id) ? 'selected' : ''}}
                                            value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>

                                    <h5>Kategori</h5><select multiple name="categories[]" class="form-control"
                                        id="categories">
                                        @foreach ($categories as $category)
                                        <option
                                            {{collect(old('categories',$post_categories))->contains($category->id) ? 'selected' : ''}}
                                            value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    @if ($entry->img != null)
                                    <img src="/uploads/posts/{{$entry->img}}" style="height: 100px"
                                        class="thumbnail pull-left" alt="">
                                    @endif
                                    <label for="post_image">Post Resmi</label>
                                    <input type="file" name="post_image" id="post_image">
                                </div>

                                <!-- end form for validations -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea class="form-control" name="content" id="content" cols="120"
                                    rows="40">{{old('content',$entry->content)}}</textarea>
                            </div>
                        </div>
                    <button class="btn btn-success" type="submit">Kaydet</button>
                </form>

                </div>
            </div>
        </div>
    </div>
<!-- /page content -->

@endsection

@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection

@section('footer')
<script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/plugins/autogrow/plugin.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="/vendors/moment/min/moment.min.js"></script>
<script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="/vendors/starrr/dist/starrr.js"></script>

<script>
    $(function(){
            $('#tags').select2({
                placeholder: 'Tag seçiniz'
            });
            $('#categories').select2({
                placeholder: 'Kategori seçiniz'
            });

            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                extraPlugins:'autogrow',
                autoGrow_minHeight:250,
                autoGrow_maxHeight:720,
              };

            CKEDITOR.replace('content', options);
        });
</script>

@endsection
