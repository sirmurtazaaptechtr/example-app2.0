@extends('layouts.master')

@section('title', 'Customers')

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
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
                        <h5 class="card-title">Datatables</h5>
                        <p>Add lightweight datatables to your project with using the <a
                                href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                            wish to conver to a datatable</p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">CustomerID </th>
                                    <th scope="col">CustomerName</th>
                                    <th scope="col">ContactName</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">PostalCode</th>
                                    <th scope="col">Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                <tr>
                                    <th scope="row">{{ $customer->CustomerID }}</th>
                                    <td>{{ $customer->CustomerName }}</td>
                                    <td>{{ $customer->ContactName }}</td>
                                    <td>{{ $customer->Address }}</td>
                                    <td>{{ $customer->City }}</td>
                                    <td>{{ $customer->PostalCode }}</td>
                                    <td>{{ $customer->Country }}</td>
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
