<!doctype html>
<html lang="en">

<x-head></x-head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <x-sidebar :session="$session"></x-sidebar>
    <div class="body-wrapper">
      <header class="app-header">
        <x-navbar :session="$session">Dashboard</x-navbar>
      </header>
      <div class="container-fluid min-vh-100">
        <div class="card">
          @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif
          <div class="card-header bg-primary">
            <h5 class="text-white">Table Orders</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <table id="usersTable" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>PO Number</th>
                    <th>Order Number</th>
                    <th>Style</th>
                    <th>Buyer</th>
                    <th>Garment Delivery</th>
                    <th>Status</th>
                    @if($session->role == 1)
                    <th>Data</th>
                    @endif
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($orders as $order)
                  <div class="modal fade" id="statusModal{{ $order->id }}" tabindex="-1"
                    aria-labelledby="modalLabel{{ $order->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                      <div class="modal-content border-0 shadow-lg rounded-4">

                        <div class="modal-header bg-dark text-white fw-bold rounded-top-4 px-4 py-3 border-0">
                          <i class="fa-solid fa-timeline me-2"></i> Validation Progress
                          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>

                        <div class="modal-body px-4 py-4 bg-light">
                          @php
                          $validations = [
                          'Merchandiser' => [
                          'status' => 1,
                          'date' => $order->created_date ?? null,
                          'by' => $order->created_by ?? 'Belum diproses',
                          'is_rejected' => $order->status === -1,
                          ],
                          'Follow Up' => [
                          'status' => 2,
                          'date' => $order->follow_up_date ?? null,
                          'by' => $order->follow_up ?? 'Belum diproses',
                          'is_rejected' => $order->status === -2,
                          ],
                          'Purchasing' => [
                          'status' => 3,
                          'date' => $order->purchasing_date ?? null,
                          'by' => $order->purchasing ?? 'Belum diproses',
                          'is_rejected' => $order->status === -3,
                          ],
                          ];
                          @endphp

                          <div class="vstack gap-3">
                            @foreach ($validations as $title => $info)
                            @php
                            $borderColor = $info['is_rejected'] ? 'danger' : ($order->status >= $info['status'] ?
                            'success' : 'secondary');
                            $iconClass = $info['is_rejected'] ? 'fa-circle-xmark text-danger' : ($order->status >=
                            $info['status'] ? 'fa-circle-check text-success' : 'fa-hourglass-start text-secondary');
                            @endphp

                            <div
                              class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border-start border-4 border-{{ $borderColor }}">
                              <div class="me-3 pt-1">
                                <i class="fa-solid {{ $iconClass }} fs-4"></i>
                              </div>
                              <div>
                                <h6 class="mb-1 fw-semibold">{{ $title }}</h6>
                                <div class="text-black small">
                                  @if ($info['is_rejected'])
                                  Ditolak
                                  @elseif ($order->status < $info['status']) Menunggu: <strong>{{ $info['by']
                                    }}</strong><br>
                                    @elseif ($info['status'] == 1)
                                    Dibuat oleh: <strong>{{ $info['by'] }}</strong><br>
                                    @else
                                    Disetujui oleh: <strong>{{ $info['by'] }}</strong><br>
                                    @endif

                                    @if (($order->status >= $info['status'] || $info['is_rejected']) && $info['date'])
                                    <span class="text-black">{{ \Carbon\Carbon::parse($info['date'])->format('d M Y')
                                      }}</span>
                                    @endif
                                </div>

                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>


                        <div class="modal-footer bg-white border-0 rounded-bottom-4">
                          <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark me-1"></i> TUTUP
                          </button>
                        </div>

                      </div>
                    </div>
                  </div>

                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->po_no }}</td>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->style }}</td>
                    <td>{{ $order->buyer }}</td>
                    <td>{{ $order->gmt_delivery }}</td>

                    @php
                    $class = [
                    -2 => 'badge bg-danger fw-bold text-light p-2 fs-2 rounded-pill shadow-sm border-0',
                    -3 => 'badge bg-danger fw-bold text-light p-2 fs-2 rounded-pill shadow-sm border-0',
                    -4 => 'badge bg-danger fw-bold text-light p-2 fs-2 rounded-pill shadow-sm border-0',
                    1 => 'badge bg-warning fw-bold text-dark p-2 fs-2 rounded-pill shadow-sm border-0',
                    2 => 'badge bg-primary fw-bold text-light p-2 fs-2 rounded-pill shadow-sm border-0',
                    3 => 'badge bg-secondary fw-bold text-light p-2 fs-2 rounded-pill shadow-sm border-0',
                    4 => 'badge bg-success fw-bold text-light p-2 fs-2 rounded-pill shadow-sm border-0',
                    ];

                    $orderStatus = [
                    -2 => 'Rejected by Follow Up',
                    -3 => 'Rejected by Purchasing',
                    1 => 'Order created',
                    2 => 'Approved by Follow Up',
                    3 => 'Approved by Purchasing',
                    ];
                    @endphp

                    <td>
                      <button data-bs-toggle="modal" data-bs-target="#statusModal{{ $order->id }}"
                        class="{{ $class[$order->status] ?? 'badge bg-dark fw-bold text-light p-2 fs-2 rounded-pill shadow-sm border-0' }}">
                        {{ $orderStatus[$order->status] ?? 'Unknown Status' }}
                      </button>
                    </td>
                    @if($session->role == 1)
                    <td>
                      <a class="badge bg-info fw-bold text-light p-2 fs-2 text shadow-sm border-0"
                        href="{{ route('data-get', ['po_no' => $order->po_no]) }}">Add Data</a>
                    </td>
                    @endif

                    <td>
                      <a href="{{ route('cetak',['po_no' => $order->po_no]) }}" class="badge text-bg-primary"><i class="fa-solid fa-eye"></i></a>
                      @if($session->role == 1)
                      <a href="{{ route('edit-form',['id' => $order->id]) }}" class="badge text-bg-warning"><i
                          class="fa-solid fa-file-pen"></i></a>
                      @endif
                      <a href="{{ route('download',['po_no' => $order->po_no]) }}" class="badge text-bg-primary"><i class="fa-solid fas fa-save"></i></a>
                      {{-- <a class="badge text-bg-danger"><i class="fa-solid fa-trash"></i></a> --}}
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
    <x-js></x-js>
</body>

</html>