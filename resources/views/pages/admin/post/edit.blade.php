@extends('layouts.admin')

@section('title')
    Posts
@endsection

@section('content')
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title mt-3">Post</h2>Edit Post
            <p class="dashboard-subtitle badge bg-success">
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
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('post.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                              <div class="col md-12">
                                <div class="form-group mt-2">
                                  <label>Judul Post</label>
                                  <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                </div>
                                  <div class="form-group mt-2">
                                    <label>Pemilik / Author Post</label>
                                      <select name="users_id" class="form-control">
                                          <option value="{{ $item->users_id }}" >{{ $item->user->name }}</option>
                                        @foreach ($users as $user)
                                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="form-group mt-2">
                                    <label>Kategori Post</label>
                                      {{-- <option value="{{ $item->categories_id }}" >{{ $item->category->name }}</option> --}}
                                      <select name="provinces_id" class="form-control">
                                        @foreach ($provinces as $province)
                                          <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  {{-- <div class="form-group mt-2">
                                    <label>Harga Post</label>
                                    <input type="number" name="price" class="form-control" value="{{ $item->price }}" required>
                                  </div> --}}
                                  <div class="form- mt-2">
                                    <label>Deskripsi Post</label>
                                    <textarea name="description" id="editor" cols="30" rows="10">{!! $item->description !!}</textarea>
                                  </div>
                              </div>
                            </div>
                              <div class="row">
                                <div class="col text-right">
                                  <button type="submit" class="btn btn-success px-5 mt-3">
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
