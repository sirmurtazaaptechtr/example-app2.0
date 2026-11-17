@extends('layouts.master')

@section('title', ($category->CategoryName ?: 'Category') . ' - Northwind')

@section('main')
<main id="main" class="main">
    <div class="pagetitle">   

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $category->CategoryName ?: 'Category #' . $category->CategoryID }}
                </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    {{-- Category details --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                <h4 class="mb-0">
                    {{ $category->CategoryName }}
                    <span class="badge text-bg-secondary ms-1">#{{ $category->CategoryID }}</span>
                </h4>

                <div class="text-nowrap">
                    <a href="{{ route('categories.edit', $category) }}"
                        class="btn btn-outline-primary btn-sm me-1">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>

                    {{-- Only empty categories can be deleted (FK protection) --}}
                    @if ($products->count() === 0)
                        <form method="POST" action="{{ route('categories.destroy', $category) }}"
                            class="d-inline"
                            onsubmit="return confirm('Delete {{ $category->CategoryName }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash me-1"></i>Delete
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <p class="text-secondary mb-0">
                {{ $category->Description ?: 'No description.' }}
            </p>
        </div>
    </div>

    {{-- Quick stats --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-secondary small text-uppercase">Products</div>
                    <div class="fs-4 fw-semibold">{{ $products->count() }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-secondary small text-uppercase">Average price</div>
                    <div class="fs-4 fw-semibold">
                        {{ $avgPrice === null ? '—' : '$' . number_format($avgPrice, 2) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="text-secondary small text-uppercase">Highest price</div>
                    <div class="fs-4 fw-semibold">
                        {{ $maxPrice === null ? '—' : '$' . number_format($maxPrice, 2) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Products in this category --}}
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Products in “{{ $category->CategoryName }}”</h6>
            <span class="badge text-bg-secondary">{{ $products->count() }}</span>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Unit</th>
                            <th scope="col" class="text-end">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->ProductID }}</td>
                                <td class="fw-semibold">{{ $product->ProductName }}</td>
                                <td>{{ $product->Unit ?: '—' }}</td>
                                <td class="text-end">
                                    {{ $product->Price === null ? '—' : '$' . number_format($product->Price, 2) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-secondary py-4">
                                    No products in this category yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($products->count() > 0)
        <p class="text-secondary small mt-2 mb-0">
            This category is referenced by {{ $products->count() }}
            {{ $products->count() === 1 ? 'product' : 'products' }}, so it cannot be
            deleted until they are reassigned.
        </p>
    @endif    
</main>
@endsection