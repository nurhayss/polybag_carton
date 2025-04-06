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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="modalLabel"
                    aria-hidden="true">
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
                          'Merchandiser' => ['status' => 1, 'date' => $order->created_date ?? null, 'by' =>
                          $order->created_by ?? 'Belum diproses'],
                          'Follow Up' => ['status' => 2, 'date' => $order->follow_up_date ?? null, 'by' =>
                          $order->follow_up ?? 'Belum diproses'],
                          'Purchasing' => ['status' => 3, 'date' => $order->purchasing_date ?? null, 'by' =>
                          $order->purchasing ?? 'Belum diproses'],
                          ];
                          @endphp

                          <div class="vstack gap-3">
                            @foreach ($validations as $title => $info)
                            <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border-start border-4 
                              border-{{ $order->status >= $info['status'] ? 'success' : 'secondary' }}">
                              <div class="me-3 pt-1">
                                <i class="fa-solid 
                                  {{ $order->status >= $info['status'] ? 'fa-circle-check text-success' : 'fa-hourglass-start text-secondary' }} 
                                  fs-4"></i>
                              </div>
                              <div>
                                <h6 class="mb-1 fw-semibold">{{ $title }}</h6>
                                <div class="text-black small">
                                  @if ($order->status < $info['status']) Menunggu: @elseif ($info['status']==1) Dibuat
                                    oleh: @else Disetujui oleh: @endif <strong>{{ $info['by'] }}</strong><br>

                                    @if ($order->status >= $info['status'] && $info['date'])
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
              1 => 'badge bg-warning fw-bold text-dark p-2 fs-2 rounded-pill shadow-sm border-0',
              2 => 'badge bg-primary fw-bold text-light p-2 fs-2 rounded-pill shadow-sm border-0',
              3 => 'badge bg-secondary fw-bold text-light p-2 fs-2 rounded-pill shadow-sm border-0',
              4 => 'badge bg-success fw-bold text-light p-2 fs-2 rounded-pill shadow-sm border-0',
              ];

              $orderStatus = [
              1 => 'Pending',
              2 => 'Approved by Merchandiser',
              3 => 'Approved by Follow Up',
              4 => 'Approved by Purchasing',
              ];
              @endphp

              <td>
                <button data-bs-toggle="modal" data-bs-target="#statusModal"
                  class="{{ $class[$order->status] ?? 'badge bg-dark text-light p-2 fs-6 rounded-pill shadow-sm' }}">
                  {{ $orderStatus[$order->status] ?? 'Unknown Status' }}
                </button>
              </td>
              <td>
                <a class="badge text-bg-primary"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('edit-form',['id' => $order->id]) }}" class="badge text-bg-warning"><i
                    class="fa-solid fa-file-pen"></i></a>
                {{-- <a class="badge text-bg-danger"><i class="fa-solid fa-trash"></i></a> --}}
              </td>
            </tr>
            @endforeach
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