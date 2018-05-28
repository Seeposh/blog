@extends('admin.layouts.app_admin')

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Создание категории @endslot
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot
    @endcomponent

    <hr>

    <form action="{{route('admin.category.store')}}" class="form-horizontal" method="post">
        {{ csrf_field() }}

        @include('admin.categories.partials.form')

    </form>
@endsection