@extends('admin.layouts.master')
@section('title','Home')
@section('content')
<!-- category content -->
<div class="right_col" role="main">
    <div class="">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.layouts.partials.alert')
            @include('admin.layouts.partials.errors')
            <form name="your_form" action="{{route('admin.tag.save',@$entry->id)}}" method="POST">
                {{ csrf_field() }}
                <div class="x_panel">
                    <div class="x_title">

                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <!-- start form for validation -->

                                <label for="title">İsim :</label>
                                <input type="text" value="{{old('name',$entry->name)}}" id="name" class="form-control"
                                    name="name">
                                <br>
                                <label for="slug">Slug * :</label>
                                <input type="hidden" name="original_slug" id="original_slug"
                                    value="{{old('slug',$entry->slug)}}">
                                <input type="text" id="slug" class="form-control"
                                    value="{{old('description',$entry->slug)}}" name="slug"
                                    data-parsley-trigger="change">
                                <br>



                                <!-- end form for validations -->
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success" type="submit">Kaydet</button>
            </form>

        </div>
    </div>
</div>
</div>
<!-- /category content -->

@endsection
