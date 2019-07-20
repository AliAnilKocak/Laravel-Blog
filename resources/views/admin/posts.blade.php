@extends('admin.layouts.master')
@section('title','Home')
@section('content')

<div class="right_col" role="main">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Postlar <small></small></h2>
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
            <div class="x_content">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Resim</th>
                            <th>Slug</th>
                            <th>Açıklama</th>
                            <th>Tarih</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td><img height="54" width="54" src="{{$item->img}}"></td>
                            <td>{{$item->slug}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->created_at}}</td>
                            <td >
                                <a href="" class="btn btn-xs btn-success"
                                    data-toggle="tooltip" data-placement="top" title="Postu düzenle">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a href="" class="btn btn-xs btn-danger"
                                    data-toggle="tooltip" data-placement="top" title="Postu sil"
                                    onclick="return confirm('Are you sure?')">
                                    <span class="fa fa-trash"></span>
                                </a>
                                <a href="{{route('post',$item->slug)}}" class="btn btn-xs btn-primary"
                                    data-toggle="tooltip" data-placement="top" title="Posta Git"
                                   >
                                    <span class="fa fa-arrow-circle-right"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>

</div>

@endsection
