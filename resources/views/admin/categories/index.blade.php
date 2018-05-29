@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категорий @endslot
        @endcomponent

        <hr>

        <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i> Создать категорию
        </a>
        <table class="table table-striped">
            <thead>
                <th>Наименование</th>
                <th>Публикация</th>
                <th class="text-right">Действие</th>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->title}}</td>
                        <td>{{$category->published}}</td>
                        <td class="text-right">
                            <form action="{{route('admin.category.destroy', $category)}}" onsubmit="if(confirm('Удалить?')){return true}else{return false}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <a class="btn btn-default" href="{{route('admin.category.edit', $category)}}"><i class="fa fa-edit"></i></a>
                                <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center"><h2>Данные отсутсвуют</h2></td>
                        </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <ul class="pagination pull-right">
                            {{$categories->links()}}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection