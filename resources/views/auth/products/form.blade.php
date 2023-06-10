@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редагувати товар' . $product->name)
@else
    @section('title', 'Створити товар')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Редагувати товар <b>{{ $product->name }}</b></h1>
        @else
            <h1>Добавити товар</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
                  action="{{ route('products.update', $product) }}"
              @else
                  action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Назва: </label>
                    <div class="col-sm-6">
{{--                        @include('auth.layouts.error', ['fieldName' => 'name'])--}}
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div>
                <br>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категорія: </label>
                    <div class="col-sm-6">
{{--                        @include('auth.layouts.error', ['fieldName' => 'category_id'])--}}

                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @isset($product)
                                            @if($product->category_id == $category->id)
                                                selected
                                    @endif
                                    @endisset
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <br>
                    <br>
                    <div class="input-group row">
                        <label for="price" class="col-sm-2 col-form-label">Ціна: </label>
                        <div class="col-sm-6">
                            {{--                        @include('auth.layouts.error', ['fieldName' => 'name'])--}}
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="number" class="form-control" name="price" id="totalAmt" step="any"
                                   value="@isset($product){{ $product->price }}@endisset">
                        </div>
                    </div>
                    <br>
                    <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Опис: </label>
                    <div class="col-sm-6">
{{--                        @include('auth.layouts.error', ['fieldName' => 'description'])--}}
                        <textarea name="description" id="description" cols="72"
                                  rows="7">@isset($product){{ $product->description }}@endisset</textarea>
                    </div>
                </div>
                <br>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Обрати.. <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>

                <br>
                <button class="btn btn-success">Зберегти</button>
            </div>
        </form>
    </div>
@endsection
