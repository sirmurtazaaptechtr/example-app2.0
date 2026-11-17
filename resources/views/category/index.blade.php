@extends('layouts.master')

@section('title','Categories')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>All Categories</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Categories</h5>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">
              <i class="bi bi-plus-lg me-1"></i>New Category
            </a>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">CategoryID </th>
                  <th scope="col">CategoryName</th>
                  <th scope="col">Description</th>
                  <th scope="col" class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($categories as $category)
                <tr>
                  <th scope="row">{{ $category->CategoryID }}</th>
                  <td>{{ $category->CategoryName }}</td>
                  <td>{{ $category->Description }}</td>
                  <td class="text-end text-nowrap">
                    <a href="{{ route('categories.show', $category) }}" class="btn btn-outline-secondary btn-sm me-1">
                      <i class="bi bi-eye me-1"></i>View
                    </a>

                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-secondary btn-sm me-1">
                      <i class="bi bi-pencil me-1"></i>Edit
                    </a>

                    <form method="POST" action="{{ route('categories.destroy', $category) }}" class="d-inline"
                      onsubmit="return confirm('Delete {{ $category->CategoryName }}?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-sm" @if ($category->products_count > 0)
                        disabled
                        title="This category still has products"
                        @endif>
                        <i class="bi bi-trash me-1"></i>Delete
                      </button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center text-secondary py-4">
                    No categories yet. Create the first one!
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->


@endsection