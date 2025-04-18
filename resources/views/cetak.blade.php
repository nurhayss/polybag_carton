<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>POLYBAG & CARTON ORDER FORM</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    font-size: 12px;
    margin: 20px;
  }

  .header {
    text-align: center;
    font-weight: bold;
    font-size: 16px;
    margin-bottom: 10px;
  }

  .subheader {
    font-weight: bold;
    margin-top: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 5px;
  }

  th,
  td {
    border: 1px solid #000;
    padding: 2px;
    vertical-align: top;
  }

  .noborder td,
  .noborder th {
    border: none;
  }

  .check {
    font-family: Arial, sans-serif;
  }

  .sketsa {
    height: 120px;
    text-align: center;
    font-size: 10px;
    line-height: 1;
  }

  .sign-row td {
    height: 60px;
    text-align: center;
  }

  .note {
    border: 1px solid #000;
    height: 80px;
    text-align: left;
    line-height: 1.4;
    font-size: 11px;
  }

  .note-box {
    width: 60%;
  }

  .small {
    font-size: 11px;
    margin-top: 0px;
  }

  hr {
    border: 1px solid black;
  }

  .flex {
    display: flex;
    justify-content: space-between;
  }

  .flex-container {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
  }

  .sketsa-column {
    display: flex;
    flex-direction: column;
    width: 30%;
  }

  .sketsa-box {
    border: 1px;
    padding: 5px;
  }

  .table-column {
    display: flex;
    flex-direction: column;
    width: 68%;
  }

  .form-table {
    border: 1px;
    padding: 2px;
  }

  .form-table table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #000;
  }

  .form-table table th,
  .form-table table td {
    border: 1px solid #000;
    padding: 3px;
    text-align: center;
  }
</style>
@if(isset($isPdf) && $isPdf)
<style>
  /* Styling khusus PDF */
  .btn,
  .modal,
  .no-print {
    display: none !important;
  }

  body {
    font-family: Arial, sans-serif;
    font-size: 12px;
    margin: 20px;
  }

  .header {
    text-align: center;
    font-weight: bold;
    font-size: 16px;
    margin-bottom: 10px;
  }

  .subheader {
    font-weight: bold;
    margin-top: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 5px;
  }

  th,
  td {
    border: 1px solid #000;
    padding: 2px;
    vertical-align: top;
  }

  .noborder td,
  .noborder th {
    border: none;
  }

  .check {
    font-family: Arial, sans-serif;
  }

  .sketsa {
    height: 120px;
    text-align: center;
    font-size: 10px;
    line-height: 1;
  }

  .sign-row td {
    height: 60px;
    text-align: center;
  }

  .note {
    border: 1px solid #000;
    height: 80px;
    text-align: left;
    line-height: 1.4;
    font-size: 11px;
  }

  .note-box {
    width: 60%;
  }

  .small {
    font-size: 11px;
    margin-top: 0px;
  }

  hr {
    border: 1px solid black;
  }

  .flex {
    display: flex;
    justify-content: space-between;
  }

  .flex-container {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
  }

  .sketsa-column {
    display: flex;
    flex-direction: column;
    width: 30%;
  }

  .sketsa-box {
    border: 1px;
    padding: 5px;
  }

  .table-column {
    display: flex;
    flex-direction: column;
    width: 68%;
  }

  .form-table {
    border: 1px;
    padding: 2px;
  }

  .form-table table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #000;
  }

  .form-table table th,
  .form-table table td {
    border: 1px solid #000;
    padding: 3px;
    text-align: center;
  }
</style>
@endif


<body>

  <div class="header">
    <div style="float:left;">
      <img src="{{ $logo }}" style="width: 25px;">
    </div>
    POLYBAG & CARTON ORDER FORM
  </div>

  <hr>

  <!-- A. Polybag Order Form -->
  <p class="subheader">A. POLYBAG ORDER FORM</p>


  <table class="noborder">
    <tr>
      <td><strong>Date : </strong> {{ $order->date }}</td>
      <td><strong>Buyer : </strong> {{ $order->buyer }}</td>
    </tr>
    <tr>
      <td><strong>Ref No. :</strong> GM</td>
      <td><strong>Gmt. Delivery :</strong> {{ $order->gmt_delivery }} </td>
    </tr>
    <tr>
      <td><strong>ON STYLE :</strong> {{ $order->style }}</td>
      <td><strong>Tgl Kedatangan / kirim ke: </strong> {{ $order->arrived_at }}/{{ $order->location }}</td>
    </tr>
    <tr>
      <td><strong>QTY Garment :</strong> {{ $order->qty_garment }}</td>
      <td><strong>PO # :</strong> {{ $order->po_no }}</td>
    </tr>
  </table>

  <table>
    <tr>
      @php
      $packingOptions = [
      1 => 'Base',
      2 => 'Hanger Lubang 1',
      3 => 'Hanger Lubang 2',
      4 => 'Lidah',
      5 => 'Gusset',
      6 => 'Hanger',
      ];

      $selectedPacking = is_array($order->packing) ? $order->packing : json_decode($order->packing, true);
      @endphp

      <td colspan="7" class="check">
        @foreach($packingOptions as $value => $label)
        <label style="margin-right: 10px;">
          <input type="checkbox" disabled {{ in_array($value, $selectedPacking ?? []) ? 'checked' : '' }}>
          {{ $label }}
        </label>
        @endforeach
      </td>





    </tr>
  </table>
  @php
  $groupedPolybag = $order->polybags->groupBy('pack')->take(3);
  @endphp

  @foreach ($groupedPolybag as $pack => $polybags)
  <div class="flex">
    {{-- BAGIAN GAMBAR --}}
    <div class="sketsa-column">
      @foreach ($order->polybags->take(3) as $polybag)
      <div class="sketsa-box">
        <div class="sketsa">
          @if(isset($isPdf) && $isPdf)
          <img style="width: 200px;" src="{{ public_path('storage/' . $polybag->image) }}" alt="Polybag Image">
          @else
          <img style="width: 200px;" src="{{ asset('storage/' . $polybag->image) }}" alt="Polybag Image">
          @endif
        </div>
      </div>
      @endforeach


      <div class="sketsa-box">
        <div class="sketsa">
          <p>
            Catt : DI UKURAN POLYBAG, LINGKARI PADA BUKAAN ADA DI PANJANG (P) ATAU LEBAR (L)
          </p>
        </div>
      </div>
    </div>

    {{-- BAGIAN TABEL --}}
    <div class="table-column">
      <div class="form-table">
        <div class="flex-container">
          <span style="float:left;">Pack: {{ $pack }}</span>
        </div>
        <table class="with-border">
          <thead>
            <tr>
              <th>SIZE</th>
              <th>UKURAN (P x L)</th>
              <th>QTY ORDER</th>
              <th>ISI / POLYBAG</th>
              <th>KEBUTUHAN</th>
              <th>QTY BELI</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($polybags as $polybag)
            <tr>
              <td>{{ $polybag->size }}</td>
              <td>{{ $polybag->length }} x {{ $polybag->width }}</td>
              <td>{{ $polybag->qty_order }}</td>
              <td>{{ $polybag->isi }}</td>
              <td>{{ $polybag->kebutuhan }}</td>
              <td>{{ $polybag->qty_beli }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endforeach

  <p></p>
  <!-- Notes -->
  <div class="note">
    <div class="note-box">
      <strong>Notes:</strong><br>
      <ul style="margin-top: 5px; padding-left: 15px;">
        @php
        $peChecked = $order->plastic_quality === '1' ? '☑' : '☐';
        $ppChecked = $order->plastic_quality === '2' ? '☑' : '☐';
        @endphp

        <li><strong>KUALITAS PLASTIK:</strong> {{ $peChecked }} PE {{ $ppChecked }} PP</li>
        <li><strong>KETEBALAN:</strong> {{ $order->thickness }}</li>
        <li><strong>PRINT WARNING:</strong> {{ $order->print_warning }}</li>
      </ul>
    </div>
  </div>

  <hr>

  <!-- B. Carton Order Form -->
  <p class="subheader">B. CARTON ORDER FORM</p>
  <table class="noborder">
    <tr>
      <td><strong>Ref No. :</strong> GM</td>
      <td></td>
      <td><strong>Buyer:</strong> {{ $order->buyer }}</td>
    </tr>
    <tr>
      <td><strong>ON STYLE:</strong> {{ $order->style }}</td>
      <td></td>
      <td><strong>Gmt. Delivery:</strong> {{ $order->gmt_delivery }}</td>
    </tr>
    <tr>
      <td><strong>QTY Garment:</strong> {{ $order->qty_garment }}</td>
      <td></td>
      @php
      $seaChecked = $order->shipment === '1' ? '☑' : '☐';
      $airChecked = $order->shipment === '2' ? '☑' : '☐';
      @endphp
      <td><strong>SHIPMENT MODE:</strong> {{ $seaChecked }} SEA {{ $airChecked }} AIR</td>
    </tr>
  </table>

  <table>
    <tr>
      <td colspan="9">
        <strong>
          PO NO.:
          <span style="display:inline-block; border-bottom: 1px dotted #000; min-width: 200px;">
            {{ $order->po_no ?? ' ' }}
          </span>
          &nbsp;&nbsp;
          KIRIM TGL. :
          <span style="display:inline-block; border-bottom: 1px dotted #000; min-width: 200px;">
            {{ $order->arrived_at ?? ' ' }}
          </span>
        </strong>
      </td>
    </tr>
    <tr>
      <th></th>
      <th>PACKING</th>
      <th>QUALITY</th>
      <th>UKURAN (P x L x T)</th>
      <th>VOLUME</th>
      <th>ISI</th>
      <th>BERAT</th>
      <th>TOTAL PESAN</th>
      <th>SATUAN</th>
    </tr>

    @forelse ($order->cartons as $carton)
    <tr>
      <td>{{ $carton->packingType->name}}</td>
      <td>{{ $carton->packing }}</td>
      <td>{{ $carton->quality }}</td>
      <td>{{ $carton->length }} x {{ $carton->width }} x {{ $carton->height }}</td>
      <td>{{ $carton->volume }}</td>
      <td>{{ $carton->qty }}</td>
      <td>{{ $carton->weight }}</td>
      <td>{{ $carton->total_order }}</td>
      <td>{{ $carton->packingType->satuan}}</td>
    </tr>
    <td>BOX</td>
    </tr>
    @empty
    <tr>
      <td colspan="9" style="text-align: center;">Tidak ada data carton</td>
    </tr>
    @endforelse

    <!-- Alamat & Keterangan -->
    <tr>
      <td><strong>ALAMAT KIRIM:</strong> {{ $order->location }}</td>
      <td colspan="8"><strong>KETERANGAN:</strong> SAMBUNGKAN SISI CARTON PAKAI LEM</td>
    </tr>
  </table>

  <div class="row">
    <div class="col-6">
      <span class="small">
        Prosedur: Follow Up → Marketing → Pemeriksa → Purchasing<br>
        Lembar 1 (Putih); Lembar 2 (Hijau); Kentan: Lembar 3 (Hijau); PL: Lembar 4 (Hijau); DA<br>
        145/R2/MKT-01/F54/14</span>
    </div>
    <!-- Button Validate -->

    @if (
    ((int) $session->role == 1 && in_array($order->status, [1, -2, -3]) && is_null($order->merchandiser)) ||
    ((int) $session->role == 2 && $order->status == 1 && !is_null($order->merchandiser)) ||
    ((int) $session->role == 3 && $order->status == 2)
    )
    <div class="col-6 text-end px-5">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#approvalModal">Validate</button>
    </div>
    @endif


  </div>

  <!-- Modal -->
  <div class="modal fade" id="approvalModal" tabindex="-1" aria-labelledby="approvalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ route('create-approval') }}" method="POST" enctype="multipart/form-data" id="approvalForm">
          @csrf
          <input type="hidden" name="order_id" id="approvalOrderId">

          <div class="modal-header">
            <h5 class="modal-title" id="approvalModalLabel">Validation Approval</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>

          <div class="modal-body">
            @if ($session->role == 1)
            <input type="hidden" name="approval" value="setuju">
            <div class="mb-3" id="signatureSection">
              <label for="signature" class="form-label fs-7 text-black">Signature</label>
              <input type="file" class="form-control" name="signature" id="signature" accept=".jpg,.jpeg,.png" required>
            </div>
            @else
            <div class="mb-3">
              <label for="approvalStatus" class="form-label fs-7 text-black">Status</label>
              <select class="form-select" id="approvalStatus" name="approval" required>
                <option value="" selected disabled>-- Choose Approval --</option>
                <option value="setuju">Setuju</option>
                <option value="tolak">Tolak</option>
              </select>
            </div>

            {{-- Notes kalau ditolak --}}
            <div class="mb-3 d-none" id="notesSection">
              <label for="notes" class="form-label fs-7 text-black">Notes</label>
              <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
            </div>

            {{-- Signature kalau disetujui --}}
            <div class="mb-3 d-none" id="signatureSection">
              <label for="signature" class="form-label fs-7 text-black">Signature</label>
              <input type="file" class="form-control" name="signature" id="signature" accept=".jpg,.jpeg,.png">
            </div>
            @endif
          </div>

          <div class="modal-footer">
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const validateButton = document.getElementById('validateButton');
    const approvalForm = document.getElementById('approvalForm');
    const signatureInput = document.getElementById('signature');
    const notesSection = document.getElementById('notesSection');
    const signatureSection = document.getElementById('signatureSection');
    const select = document.getElementById('approvalStatus');

    // Menghilangkan tombol "Validate" setelah form disubmit
    approvalForm.addEventListener('submit', function () {
      validateButton.style.display = 'none'; // Menyembunyikan tombol setelah form disubmit
    });

    // Menyembunyikan/menampilkan bagian Signature dan Notes tergantung pada status approval
    select.addEventListener('change', function () {
      if (this.value === 'tolak') {
        notesSection.classList.remove('d-none');
        signatureSection.classList.add('d-none');
      } else if (this.value === 'setuju') {
        signatureSection.classList.remove('d-none');
        notesSection.classList.add('d-none');
      } else {
        notesSection.classList.add('d-none');
        signatureSection.classList.add('d-none');
      }
    });
  });
  </script>


  @php
  $signatures = [
  1 => 'MD',
  2 => 'Follow Up',
  3 => 'Purchasing',
  4 => 'Checker',
  5 => 'Creator',
  ];
  @endphp

  <table class="noborder sign-row">
    <tr>
      @foreach ($signatures as $label)
      <td>{{ $label }}</td>
      @endforeach
    </tr>
    <tr>
      @foreach ($signatures as $status => $label)
      @php
      $log = $order->approval->firstWhere('status', $status);
      @endphp
      <td>
        @if($log && $log->signature)
        <img src="{{ asset('storage/' . $log->signature) }}" width="100">
        @else
        (...................)
        @endif
      </td>
      @endforeach
    </tr>
  </table>




</body>

</html>