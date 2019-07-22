@extends('admin.layouts.master')
@section('title','Home')
@section('content')

<div class="right_col" role="main">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pagelar <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>


            <form action="{{route('admin.categories')}}" method="POST">
                {{ csrf_field() }}
                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-8 form-group pull-right">
                        <div class="input-group">
                            <input name="search_word" id="search_word" type="text" value="{{old('search_word')}}"
                                placeholder="Kategori Ara" class="form-control">
                            <span class="input-group-btn">
                                <button style="color:white" type="submit" class="btn btn-primary">
                                    <span style="color:white" class="fa fa-search"></span>
                                </button>
                                <a class="btn btn-warning" href="{{route('admin.categories')}}">
                                    <span style="color:white" class="fa fa-close"></span>
                                </a>

                            </span>

                        </div>
                    </div>
            </form>
            <div class="col-md-3 col-sm-3 col-xs-3">

                <a style="color:white" class="btn btn-primary" href="{{route('admin.category.create')}}">
                    Yeni
            </div></a>
            <table class="table table-striped jambo_table bulk_action">
                <thead>
                    <tr>
                        {{-- <th>#</th> --}}
                        <th>İsim</th>
                        <th>Slug</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                        {{-- <td>{{$item->id}}</td> --}}
                        <td style="width:340px">{{$item->name}}</td>
                        <td style="width:340px">{{$item->slug}}</td>
                        <td >
                                <a href="{{route('admin.category.edit',$item->id)}}" class="btn btn-xs btn-success"
                                    data-toggle="tooltip" data-placement="top" title="Kategoriyi düzenle">
                                    <span class="fa fa-pencil"></span>
                                </a>

                                <a href="{{route('admin.category.delete',$item->id)}}" class="btn btn-xs btn-danger"
                                    data-toggle="tooltip" data-placement="top" title="Kategoriyi Sil"
                                    onclick="return confirm('Are you sure?')">
                                    <span class="fa fa-trash"></span>
                                </a>

                            </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- {{$list->appends('search_word',old('search_word'))->links()}} --}}

        </div>
    </div>

</div>

</div>

@endsection
