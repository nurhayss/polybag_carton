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

                <x-data-form :order="$order" :packing_type="$packing_type" />

                <hr class="my-4" style="height: 2px; background-color: black; border: none;">

                <div class="mt-5 card ">
                    @if (session('polybag_success'))
                    <div class="alert alert-success m-3">
                        {{ session('polybag_success') }}
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order->polybags as $polybag)
                                        <div class="modal fade" id="deleteModal-{{ $polybag->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel-{{ $polybag->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('polybag-delete', ['id' => $polybag->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel-{{ $polybag->id }}">Konfirmasi
                                                                Hapus</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data polybag ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $polybag->id }}">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $polybag->pack }}</td>
                                            <td>{{ $polybag->size }}</td>
                                            <td>{{ $polybag->length }} x {{ $polybag->width }}</td>
                                            <td>{{ $polybag->qty_order }}</td>
                                            <td>{{ $polybag->isi }}</td>
                                            <td>{{ $polybag->kebutuhan }}</td>
                                            <td>{{ $polybag->qty_beli }}</td>
                                            <td>
                                                <a href="{{ route('polybag-edit', ['po_no' => $order->po_no, 'id' => $polybag->id]) }}"
                                                    class="badge text-bg-warning">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </a>
                                                <a href="#" class="badge text-bg-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $polybag->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>

                                            </td>
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
                    @if (session('carton_success'))
                    <div class="alert alert-success m-3">
                        {{ session('carton_success') }}
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
                                            <th>Packing Type</th>
                                            <th>Send Date</th>
                                            <th>Packing</th>
                                            <th>Quality</th>
                                            <th>Ukuran <span class="text-primary">(p x l x t)</span></th>
                                            <th>Volume</th>
                                            <th>Qty</th>
                                            <th>Weight</th>
                                            <th>Total Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order->cartons as $carton)
                                        <div class="modal fade" id="deleteCarton-{{ $carton->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel-{{ $carton->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('carton-delete', ['id' => $carton->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel-{{ $carton->id }}">Konfirmasi
                                                                Hapus</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data carton ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{ $carton->id }}">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $carton->packingType->name }}</td>
                                            <td>{{ $carton->send }}</td>
                                            <td>{{ $carton->packing }}</td>
                                            <td>{{ $carton->quality }}</td>
                                            <td>{{ $carton->length }} x {{ $carton->width }} x {{ $carton->height }}
                                            </td>
                                            <td>{{ $carton->volume }}</td>
                                            <td>{{ $carton->qty }}</td>
                                            <td>{{ $carton->weight }}</td>
                                            <td>{{ $carton->total_order_formatted }}</td>
                                            <td>
                                                <a href="{{ route('carton-edit', ['po_no' => $order->po_no, 'id' => $carton->id]) }}"
                                                    class="badge text-bg-warning">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                    <a href="#" class="badge text-bg-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteCarton-{{ $carton->id }}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>

                                            </td>
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