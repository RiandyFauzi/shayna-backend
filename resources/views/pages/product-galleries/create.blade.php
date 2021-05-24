@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Foto barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('product-galleries.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">Nama Barang</label>
                <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
                    @foreach ($products as $product)

                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="photo" class="form-control-label">Foto Barang</label>
                <input type="file" name="photo" value="{{ old('photo')}}" accept="image/*" required class="form-control @error('photo') is-invalid @enderror">

                @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
            </div>


            <div class="form-group">
                <label for="is_default" class="form-control-label">Jadikan Default</label>
                <br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('is_default') is-invalid @enderror" name="is_default" type="radio" id="inlineCheckbox1" value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('is_default') is-invalid @enderror" name="is_default" type="radio" id="inlineCheckbox2" value="0">
                    <label class="form-check-label" for="inlineCheckbox2">Tidak</label>
                </div>
                @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Tambah Barang
                </button>
            </div>

        </form>
    </div>
</div>
@endsection