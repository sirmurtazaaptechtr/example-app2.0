@extends('layouts.master')

@section('title', 'suppliers')

@section()
<main id="main" class="main">

    <div class="pagetitle">
        <h1>All Suppliers</h1>
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
                        <h5 class="card-title">Suppliers</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ShipperID </th>
                                    <th scope="col">ShipperName</th>
                                    <th scope="col">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($Suppliers as $shipper)
                                <tr>
                                    <th scope="row">{{ $shipper->ShipperID }}</th>
                                    <td>{{ $shipper->ShipperName }}</td>
                                    <td>{{ $shipper->Phone }}</td>
                                </tr>
                                @empty

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