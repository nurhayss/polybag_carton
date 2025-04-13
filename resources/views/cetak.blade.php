
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>POLYBAG & CARTON ORDER FORM</title>
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
    th, td {
      border: 1px solid #000;
      padding: 2px;
      vertical-align: top;
    }
    .noborder td, .noborder th {
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
</head>
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
    <td><strong>Date          :   </strong> {{ $order->date }}</td>
    <td><strong>Buyer         :  </strong> {{ $order->buyer }}</td>
  </tr>
  <tr>
    <td><strong>Ref No.       :</strong> GM</td>
    <td><strong>Gmt. Delivery :</strong> {{ $order->gmt_delivery }} </td>
  </tr>
  <tr>
    <td><strong>ON STYLE      :</strong> {{ $order->style }}</td>
    <td><strong>Tgl Kedatangan / kirim ke: </strong> {{ $order->arrived_at }}/{{ $order->location }}</td>
  </tr>
  <tr>
    <td><strong>QTY Garment    :</strong> {{ $order->qty_garment }}</td>
    <td><strong>PO #           :</strong> {{ $order->po_no }}</td>
  </tr>
</table>

<table>
  <tr>
    <td colspan="7" class="check">
      <label><input type="checkbox" checked disabled> Base</label>
      <label><input type="checkbox" disabled> Hanger Lubang 1</label>
      <label><input type="checkbox" disabled> Hanger Lubang 2</label>
      <label><input type="checkbox" disabled> Udah</label>
      <label><input type="checkbox" disabled> Gusset</label>
      <label><input type="checkbox" disabled> Hanger</label>
    </td>
  </tr>
</table>
@forelse ($order->polybags as $polybag)
<div class="flex">
  <div class="sketsa-column">  
    <div class="sketsa-box">
      <div class="sketsa">
        <p><strong>Sketsa Polybag</strong></p>
        <p>(Tanda panah arah L x P, lubang, recycle symbol, seal tape, tulisan "BUKAAN", airhole, tanda potong, trimming)</p>
        <p>PP: 0.54</p>
      </div>
    </div>
    <div class="sketsa-box">
      <div class="sketsa">
        <p><strong>Sketsa Polybag</strong></p>
        <p>(Tanda panah arah L x P, lubang, recycle symbol, seal tape, tulisan "BUKAAN", airhole, tanda potong, trimming)</p>
        <p>PP: 0.54</p>
      </div>
    </div>
    <div class="sketsa-box">
      <div class="sketsa">
        <img style="width: 200px;" src="{{ asset('storage/' . $polybag->image) }}">
        </div>
    </div>
  </div>
  <div class="table-column">  
    <div class="form-table">
      <div class="flex-container">
        <span style="float:left;">Pack: {{ $polybag->pack }}</span>
        <span style="float:right;">*Coret yang tidak perlu</span>
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
          <td></td>
          <td>{{ $polybag->isi }}</td>
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
          <td></td>
          <td>{{ $polybag->kebutuhan }}</td>
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
          <td></td>
          <td>{{ $polybag->qty_beli }}</td>
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
        <span style="float:left;">Pack: Solid / Assort / .com Individual Polybag</span>
        <span style="float:right;">*Coret yang tidak perlu</span>
      </div>
      <table>
        <tr>
          <th>SIZE</th>
          <td></td>
          <td>{{ $polybag->size }}</td>
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
          <td></td>
          <td>{{ $polybag->length }} x {{ $polybag->width }}</td>
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
          <td></td>
          <td>{{ $polybag->qty_order }}</td>
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
          <td></td>
          <td>{{ $polybag->isi }}</td>
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
          <td></td>
          <td>{{ $polybag->kebutuhan }}</td>
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
          <td></td>
          <td>{{ $polybag->qty_beli }}</td>
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
        <span style="float:left;">Pack: Solid / Assort / .com Individual Polybag</span>
        <span style="float:right;">*Coret yang tidak perlu</span>
      </div>
      <table>
        <tr>
          <th>SIZE</th>
          <th>  </th>
          <th> {{ $polybag->size }}  </th>
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
          <td></td>
          <td>{{ $polybag->length }} x {{ $polybag->width }}</td>
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
          <td></td>
          <td>{{ $polybag->qty_order }}</td>
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
          <td></td>
          <td>{{ $polybag->isi }}</td>
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
          <td></td>
          <td>{{ $polybag->kebutuhan }}</td>
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
          <td></td>
          <td>{{ $polybag->qty_beli }}</td>
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
@empty
@endforelse
<p></p>
<!-- Notes -->
<div class="note">
  <div class="note-box">
    @forelse ($order->cartons as $carton)
    <strong>Notes:</strong><br>
    <ul style="margin-top: 5px; padding-left: 15px;">
      <li><strong>KUALITAS PLASTIK:</strong> ☑ PE ☐ PP</li>
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
    <td><strong>SHIPMENT MODE:</strong> ☑ SEA ☐ AIR</td>
  </tr>
</table>

<table>
  <tr>
    <tr><td colspan="9"><strong> PO NO.: .................................................................&nbsp; KIRIM TGL. : .................................................................</strong></td></tr>
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
    <td></td>
    <td>{{ $carton->packing }}</td>
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
    <td>{{ $carton->quality }}</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>BOX</td>
    </tr>
  <tr><td>PAKAI EXPORT CARTON BIASA</td>
    <td></td>
    <td>{{ $carton->length }} x {{ $carton->width }} x {{ $carton->height }}</td>        
    <td></td><td></td><td></td><td></td><td></td><td>BOX</td></tr>
  <tr><td>PAKAI EXPORT CARTON BIASA</td>
    <td></td>
    <td>{{ $carton->volume }}</td>
    <td></td><td></td><td></td><td></td><td></td><td>BOX</td></tr>
  <tr>
    <td>PAKAI LAYER</td>
    <td></td>
    <td>{{ $carton->qty }}</td>
    <td></td><td></td><td></td><td></td><td></td><td>LBR</td></tr>
  <tr>
    <td>PAKAI LAYER</td>
    <td></td>
    <td>{{ $carton->weight }}</td>
    <td></td><td></td><td></td><td></td><td></td><td>LBR</td></tr>
  <tr><td><strong>ALAMAT KIRIM:</strong> SAMBUNGAN SISI CARTON PAKAI LEM</td><td colspan="8"><strong>KETERANGAN:</strong> </td></tr>
</table>
<p></p>
<table class="noborder sign-row">
  <tr>
    <td>Follow Up</td>
    <td>Marketing</td>
    <td>Diperiksa Oleh</td>
    <td>Purchasing</td>
    <td>Dibuat Oleh</td>
  </tr>
  <tr>
    <td>(...................)</td>
    <td>(...................)</td>
    <td>(...................)</td>
    <td>(...................)</td>
    <td>(...................)</td>
  </tr>

</table>
@empty
@endforelse
<span class="small">
  Prosedur: Follow Up → Marketing → Pemeriksa → Purchasing<br>
  Lembar 1 (Putih); Lembar 2 (Hijau); Kentan: Lembar 3 (Hijau); PL: Lembar 4 (Hijau); DA<br>
  145/R2/MKT-01/F54/14</span>

</body>
</html>
