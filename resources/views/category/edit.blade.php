@extends('layouts.master')

@section('title', 'Edit Category - Northwind')

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">                
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">
                            Edit Category #{{ $category->CategoryID }}
                            <span class="text-secondary fs-6">- {{ $category->CategoryName }}</span>
                        </h5>
                    </div>

                    <div class="card-body">
                        @include('category._form', [
                        'category' => $category,
                        'action' => route('categories.update', $category),
                        'submitLabel' => 'Save Changes',
                        ])
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection