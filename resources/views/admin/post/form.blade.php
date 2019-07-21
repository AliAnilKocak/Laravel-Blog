@extends('admin.layouts.master')
@section('title','Home')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$entry->title}}<small>{{$entry->categories[0]->name}}</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <!-- start form for validation -->
                            <form id="demo-form" data-parsley-validate="" novalidate="">
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
                            </form>
                            <!-- end form for validations -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">
                            <!-- start form for validation -->
                            <form id="demo-form" data-parsley-validate="" novalidate="">
                                <div class="checkbox">
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                        <input {{old('show_featured',$entry->detail->show_banner) ? 'checked' : '' }}
                                            name="show_banner" value="1" type="checkbox">
                                        Banner
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                        <input {{old('show_featured',$entry->detail->show_recently) ? 'checked' : '' }}
                                            name="show_recently" value="1" type="checkbox">
                                        Son Yayınlanan
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                        <input {{old('show_featured',$entry->detail->show_most_read) ? 'checked' : '' }}
                                            name="show_most_read" value="1" type="checkbox">
                                        Çok Okunan
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                        <input
                                            {{old('show_featured',$entry->detail->show_most_sidebar) ? 'checked' : '' }}
                                            name="show_most_sidebar" value="1" type="checkbox">
                                        Çok Okunan Sidebar
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                        <input {{old('show_featured',$entry->detail->show_featured) ? 'checked' : '' }}
                                            name="show_featured" value="1" type="checkbox">
                                        Yeni Özellikli
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                        <input
                                            {{old('show_featured',$entry->detail->show_featured_sidebar) ? 'checked' : '' }}
                                            name="show_featured_sidebar" value="1" type="checkbox">
                                        Çok Özellikli Sidebar
                                    </label>
                                    <label style="margin-right:12px; margin-bottom:12px;">
                                        <input {{old('show_featured',$entry->detail->show_big) ? 'checked' : '' }}
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
                            </form>
                            <!-- end form for validations -->
                        </div>
                    </div>
                </div>

                <div class="x_content">
                    <div id="alerts"></div>
                    <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i
                                    class="fa fa-font"></i><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            </ul>
                        </div>

                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i
                                    class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a data-edit="fontSize 5">
                                        <p style="font-size:17px">Huge</p>
                                    </a>
                                </li>
                                <li>
                                    <a data-edit="fontSize 3">
                                        <p style="font-size:14px">Normal</p>
                                    </a>
                                </li>
                                <li>
                                    <a data-edit="fontSize 1">
                                        <p style="font-size:11px">Small</p>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i
                                    class="fa fa-italic"></i></a>
                            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i
                                    class="fa fa-strikethrough"></i></a>
                            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i
                                    class="fa fa-underline"></i></a>
                        </div>

                        <div class="btn-group">
                            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i
                                    class="fa fa-list-ul"></i></a>
                            <a class="btn" data-edit="insertorderedlist" title="Number list"><i
                                    class="fa fa-list-ol"></i></a>
                            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i
                                    class="fa fa-dedent"></i></a>
                            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                        </div>

                        <div class="btn-group">
                            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i
                                    class="fa fa-align-left"></i></a>
                            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i
                                    class="fa fa-align-center"></i></a>
                            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i
                                    class="fa fa-align-right"></i></a>
                            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i
                                    class="fa fa-align-justify"></i></a>
                        </div>

                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i
                                    class="fa fa-link"></i></a>
                            <div class="dropdown-menu input-append">
                                <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                <button class="btn" type="button">Add</button>
                            </div>
                            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                        </div>

                        <div class="btn-group">
                            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i
                                    class="fa fa-picture-o"></i></a>
                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn"
                                data-edit="insertImage" />
                        </div>

                        <div class="btn-group">
                            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                        </div>
                    </div>
                    <div id="editor-one" class="editor-wrapper">

                        {{$entry->content}}

                    </div>
                    <textarea name="descr" id="descr" style="display:none;"></textarea>
                    <br />
                    <div class="ln_solid"></div>
                </div>

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
        });
</script>

@endsection
