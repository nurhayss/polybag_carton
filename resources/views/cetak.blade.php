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
    border: 1px solid #000;
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
  @forelse ($order->polybags as $polybag)
  <div class="flex">
    <div class="sketsa-column">
      <div class="sketsa-box">
        <div class="sketsa">
          <img style="width: 200px;" src="{{ asset('storage/' . $polybag->image) }}">
        </div>
      </div>
      <div class="sketsa-box">
        <div class="sketsa">
          <img style="width: 200px;" src="{{ asset('storage/' . $polybag->image) }}">
        </div>
      </div>
      <div class="sketsa-box">
        <div class="sketsa">
          <img style="width: 200px;" src="{{ asset('storage/' . $polybag->image) }}">
        </div>
      </div>
      <div class="sketsa-box">
        <div class="sketsa">
          <p>Catt : DI UKURAN POLYBAG, LINGKARI PADA BUKAAN ADA DI PANJANG (P) ATAU LEBAR (L) PADA BUKAAN ADA DI PANJANG
            (P) ATAU LEBAR (L)</p>
        </div>
      </div>

    </div>
    <div class="table-column">
      <div class="form-table">
        <div class="flex-container">
          <span style="float:left;">Pack: {{ $polybag->pack }}</span>
        </div>
        <table>
          <tr>
            <th>SIZE</th>
            <th>{{ $polybag->size }} </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
          </tr>
          <tr>
            <td>UKURAN (P x L)</td>
            <td>{{ $polybag->length }} x {{ $polybag->width }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>QTY ORDER</td>
            <td>{{ $polybag->qty_order }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>ISI / POLYBAG</td>
            <td>{{ $polybag->isi }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>KEBUTUHAN</td>
            <td>>{{ $polybag->kebutuhan }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>QTY BELI</td>
            <td>{{ $polybag->qty_beli }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </div>
      <div class="form-table">
        <div class="flex-container">
          <span style="float:left;">Pack: {{ $polybag->pack }}</span>
        </div>
        <table>
          <tr>
            <th>SIZE</th>
            <th>{{ $polybag->size }} </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
          </tr>
          <tr>
            <td>UKURAN (P x L)</td>
            <td>{{ $polybag->length }} x {{ $polybag->width }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>QTY ORDER</td>
            <td>{{ $polybag->qty_order }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>ISI / POLYBAG</td>
            <td>{{ $polybag->isi }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>KEBUTUHAN</td>
            <td>>{{ $polybag->kebutuhan }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>QTY BELI</td>
            <td>{{ $polybag->qty_beli }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </div>
      <div class="form-table">
        <div class="flex-container">
          <span style="float:left;">Pack: {{ $polybag->pack }}</span>
        </div>
        <table>
          <tr>
            <th>SIZE</th>
            <th>{{ $polybag->size }} </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
          </tr>
          <tr>
            <td>UKURAN (P x L)</td>
            <td>{{ $polybag->length }} x {{ $polybag->width }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>QTY ORDER</td>
            <td>{{ $polybag->qty_order }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>ISI / POLYBAG</td>
            <td>{{ $polybag->isi }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>KEBUTUHAN</td>
            <td>>{{ $polybag->kebutuhan }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>QTY BELI</td>
            <td>{{ $polybag->qty_beli }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  </div>
  @empty
  @endforelse
  <p></p>
  <!-- Notes -->
  <div class="note">
    <div class="note-box">
      @forelse ($order->cartons as $carton)
      <strong>Notes:</strong><br>
      <ul style="margin-top: 5px; padding-left: 15px;">
        @php
        $peChecked = $order->plastic_quality === '1' ? '☑' : '☐';
        $ppChecked = $order->plastic_quality === '2' ? '☑' : '☐';
        @endphp

        <li><strong>KUALITAS PLASTIK:</strong> {{ $peChecked }} PE {{ $ppChecked }} PP</li>
        <li><strong>KETEBALAN:</strong> {{$order->thickness}} </li>
        <li><strong>PRINT WARNING:</strong> {{$order->print_warning}} </li>
      </ul>
    </div>
  </div>
  <p></p>
  <hr>

  <!-- B. Carton Order Form -->
  <p class="subheader">B. CARTON ORDER FORM</p>
  <table class="noborder">
    <tr>
      <td><strong>Ref No. :</strong> GM</td>
      <td><strong> </strong> </td>
      <td><strong>Buyer:</strong> {{ $order->buyer }}</td>
    </tr>
    <tr>
      <td><strong>ON STYLE:</strong> {{ $order->style }}</td>
      <td><strong> </strong> </td>
      <td><strong>Gmt. Delivery:</strong> {{ $order->gmt_delivery }}</td>
    </tr>
    <tr>
      <td><strong>QTY Garment:</strong> {{ $order->qty_garment }}</td>
      <td><strong> </strong> </td>
      @php
      $peChecked = $order->shipment === '1' ? '☑' : '☐';
      $ppChecked = $order->shipment === '2' ? '☑' : '☐';
      @endphp
      <td><strong>SHIPMENT MODE:</strong> {{ $peChecked }} SEA {{ $ppChecked }} AIR</td>
    </tr>
  </table>

  <table>
    <tr>
    <tr>
      <td colspan="9">
        <strong>
          PO NO.:
          <span style="display:inline-block; border-bottom: 1px dotted #000; min-width: 200px;">
            {{ $order->po_no ?? ' ' }}
          </span>
          &nbsp;&nbsp; KIRIM TGL. :
          <span style="display:inline-block; border-bottom: 1px dotted #000; min-width: 200px;">
            {{ $order->arrived_at ?? ' ' }}
          </span>
        </strong>
      </td>
    </tr>
    <th> </th>
    <th>PACKING</th>
    <th>QUALITY</th>
    <th>UKURAN (P x L x T)</th>
    <th>VOLUME</th>
    <th>ISI</th>
    <th>BERAT</th>
    <th>TOTAL PESAN</th>
    <th>SATUAN</th>
    </tr>
    <tr>
      <td>PAKAI EXPORT CARTON BIASA</td>
      <td>{{ $carton->packing }}</td>
      <td>{{ $carton->quality }}</td>
      <td>{{ $carton->length }} x {{ $carton->width }} x {{ $carton->height }}</td>
      <td>{{ $carton->volume }}</td>
      <td>{{ $carton->qty }}</td>
      <td>{{ $carton->weight }}</td>
      <td>{{ $carton->total_order }}</td>
      <td>BOX</td>
    </tr>
    <tr>
      <td>PAKAI EXPORT CARTON BIASA</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>BOX</td>
    </tr>
    <tr>
      <td>PAKAI EXPORT CARTON BIASA</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>BOX</td>
    </tr>
    <tr>
      <td>PAKAI EXPORT CARTON BIASA</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>BOX</td>
    </tr>
    <tr>
      <td>PAKAI LAYER</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>LBR</td>
    </tr>
    <tr>
      <td>PAKAI LAYER</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>LBR</td>
    </tr>
    <tr>
      <td><strong>ALAMAT KIRIM:</strong> {{ $order->location }}</td>
      <td colspan="8"><strong>KETERANGAN:</strong> SAMBUNGKAN SISI CARTON PAKAI LEM</span> </td>
    </tr>
  </table>

  @empty
  @endforelse
  <div class="row">
    <div class="col-6">
      <span class="small">
        Prosedur: Follow Up → Marketing → Pemeriksa → Purchasing<br>
        Lembar 1 (Putih); Lembar 2 (Hijau); Kentan: Lembar 3 (Hijau); PL: Lembar 4 (Hijau); DA<br>
        145/R2/MKT-01/F54/14</span>
    </div>

    @php
    @endphp

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
        <form action="{{ route('create-approval') }}" method="POST" enctype="multipart/form-data">
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
      const select = document.getElementById('approvalStatus');
      if (select) {
          const notesSection = document.getElementById('notesSection');
          const signatureSection = document.getElementById('signatureSection');
  
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
      }
  });
  </script>


</body>

</html>