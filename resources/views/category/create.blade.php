@extends('layouts.master')

@section('title', 'New Category - Northwind')

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">                
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Category</h5>
                    </div>
                    <div class="card-body">
                        @include('category._form', [
                        'action' => route('categories.store'),
                        'submitLabel' => 'Create Category',
                        ])
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection