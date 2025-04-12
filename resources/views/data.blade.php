<x-head></x-head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <x-sidebar :session="$session" />
        <div class="body-wrapper">
            <header class="app-header">
                <x-navbar :session="$session">Order Form</x-navbar>
            </header>

            <div class="container-fluid">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <x-data-form :order="$order" />


                <div class="mt-5 card ">
                    @if (session('success'))
                    <div class="alert alert-success m-3">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="card-header bg-primary">
                        <h4 class="card-title text-white">Table Polybag</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="mt-3 table-responsive">
                                <table id="polybagTable" class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pack</th>
                                            <th>Size</th>
                                            <th>Ukuran <span class="text-primary">(p x l)</span></th>
                                            <th>Qty Order</th>
                                            <th>Isi</th>
                                            <th>Kebutuhan</th>
                                            <th>Qty Beli</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order->polybags as $polybag)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $polybag->pack }}</td>
                                            <td>{{ $polybag->size }}</td>
                                            <td>{{ $polybag->length }} x {{ $polybag->width }}</td>
                                            <td>{{ $polybag->qty_order }}</td>
                                            <td>{{ $polybag->isi }}</td>
                                            <td>{{ $polybag->kebutuhan }}</td>
                                            <td>{{ $polybag->qty_beli }}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 card ">
                    @if (session('success'))
                    <div class="alert alert-success m-3">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="card-header bg-primary">
                        <h4 class="card-title text-white">Table Carton</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="mt-3 table-responsive">
                                <table id="cartonTable" class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Packing</th>
                                            <th>Quality</th>
                                            <th>Ukuran <span class="text-primary">(p x l x t)</span></th>
                                            <th>Volume</th>
                                            <th>Qty</th>
                                            <th>Weight</th>
                                            <th>Total Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order->cartons as $carton)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $carton->packing }}</td>
                                            <td>{{ $carton->quality }}</td>
                                            <td>{{ $carton->length }} x {{ $carton->width }} x {{ $carton->height }}
                                            </td>
                                            <td>{{ $carton->volume }}</td>
                                            <td>{{ $carton->qty }}</td>
                                            <td>{{ $carton->weight }}</td>
                                            <td>{{ $carton->total_order_formatted }}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-js></x-js>
    </div>
</body>