@extends('layouts.admin')

@section('title')
    Admin
@endsection

@section('content')
    <section class="d-flex flex-column gap-4">
        <div class="d-flex justify-content-between align-items-center gap-3">
        </div>
        <div class="d-flex gap-4 flex-wrap">
            <div class="product-card">
                <div class="product-detail pt-3">
                    <div>
                        <p class="title-detail">Jumlah Gallery</p>
                    </div>
                </div>
                <div class="product-detail pt-4">
                    <div>
                        <p class="price-detail">{{ $gallery }}</p>
                    </div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-detail pt-3">
                    <div>
                        <p class="title-detail">Jumlah Category</p>
                    </div>
                </div>
                <div class="product-detail pt-4">
                    <div>
                        <p class="price-detail">{{ $category }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
