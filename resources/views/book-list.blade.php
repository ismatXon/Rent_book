@extends('layouts.MainLayout')
@section('page-name', 'dashboard')
@section('title', 'Book List')
@section('content')
 
    <form action="" method="get">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select name="category" id="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Search Book's Title">
                    <button class="btn btn-success">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="my-5">
        <div class="row">
            @foreach ($book as $item)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                    <div class="card " style="width: 18rem;">
                        <img src="{{ $item->cover != null ? asset('storage/cover/' . $item->cover) : asset('img/cover-not-found.jpg') }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->book_code }}</h5>
                            <p class="card-text">{{ $item->title }}</p>
                            @if ($item->status == 'in stock')
                                <p class="card-text text-end"> <span class="badge bg-primary">{{ $item->status }}</span></p>
                            @else
                                <p class="card-text text-end"> <span class="badge bg-danger">{{ $item->status }}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="/views/6" class="text-dark division-card">
                        <div class="block block-rounded">
                            <div class="block-content d-flex justify-content-center align-items-center flex-column"
                                style="height: 350px;">
                                <img src="{{ $item->cover != null ? asset('storage/cover/' . $item->cover) : asset('img/cover-not-found.jpg') }}" alt="" style="width: 10.2rem;"
                                    class="mb-2">
                                <h3 class="text-center">{{ $item->title }}</h3>
                            </div>
                        </div>
                    </a>
                </div> --}}
                {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="block block-rounded p-3">
                        <div class="block-content">
                            <img src="http://127.0.0.1:8000/storage/students-photos/z7wuTc1rS8MRTaFWyFyJ6l4QE31Kn5DKKAoJZZ45.jpg" class="img-fluid student_photo">
                            <div class="text-center">
                                <h4 style="font-size: 15px;" class="nama_siswa">Moch ismatulloh</h4>
                                <label class="badge bg-info jabatan">Wakil</label>
                                <p class="nama_kelas">XI B RPL</p>
                                <a href="#" class="btn btn-success btn-sm btn-edit-student-detail" onclick="editStudent(this)" data-id="1"><i class="fa-solid fa-pen"></i></a>
                                <a href="#" class="btn btn-danger btn-sm btn-delete-student-detail" onclick="deleteStudent(this)" data-id="1"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            @endforeach

        </div>
    </div>


@endsection
