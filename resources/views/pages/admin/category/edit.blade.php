@extends('layouts.admin')

@section('title')
    Edit Judul
@endsection

@section('content')
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading pb-5">
        <h2 class="dashboard-title pt-3">Judul
        </h2> Edit Judul
        <p class="dashboard-subtitle badge bg-warning">
             "{{ $item->name }}"
        </p>
    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
                    <div class="card-body">
                        <form action="{{ route('category.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
                          <div class="row">
                            <div class="col md-12">
                              <div class="form-group">
                                <label class="mb-1">Nama Judul</label>
                                <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col text-right">
                              <button type="submit" class="btn btn-success mt-3 px-5">
                                Save Now</button>
                            </div>
                          </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('addon-script')
  <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
  </script>
@endpush

