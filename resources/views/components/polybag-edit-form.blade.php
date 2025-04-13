@props(['order','polybag','carton'])

<form action="{{ route('polybag-update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="polybagContainer" class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div
            class="card-header text-white py-3 bg-gradient bg-primary d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold m-0 text-white flex-grow-1">Polybag Section</h5>
            <button class="btn btn-link p-0 border-0 shadow-lg toggle-btn ms-auto">
                <i class="fa-solid fa-circle-chevron-down fs-6 text-white"></i>
            </button>
        </div>
        <div class="card-body p-4 ">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pack</label>
                        <select name="pack" class="form-select" id="">
                            <option disabled {{ empty($polybag->pack ? 'selected' : '') }}>Pilih Pack</option>
                            <option value="Solid" {{ $polybag->pack == 1 ? 'selected' : '' }}>Solid</option>
                            <option value="Assort" {{ $polybag->pack == 2 ? 'selected' : '' }}>Assort</option>
                            <option value="Individual (.com)" {{ $polybag->pack == 3 ? 'selected' : '' }}>Individual
                                (.com)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Size</label>
                        <input type="text" class="form-control" name="size" value="{{ $polybag->size }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="form-label fw-semibold">Ukuran (p x l)</label>
                <div class="col-md-6">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Panjang" name="length"
                            value="{{ $polybag->length }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Lebar" name="width"
                            value="{{ $polybag->width }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi/Polybag</label>
                        <input type="number" class="form-control" name="isi" value="{{ $polybag->isi }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kebutuhan</label>
                        <input type="number" class="form-control" name="kebutuhan" value="{{ $polybag->kebutuhan }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quantity Order</label>
                        <input type="number" class="form-control" name="qty_order" value="{{ $polybag->qty_order }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quantity Beli</label>
                        <input type="number" class="form-control" name="qty_beli" value="{{ $polybag->qty_beli }}">
                    </div>
                </div>
            </div>
            <div class="row px-4 mb-3">
                <div class="col-md-3 ms-auto text-end">
                    <input type="hidden" name="polybag_id" value="{{ $polybag->id }}">
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

    </div>

</form>






<script src="{{ asset('assets/js/minimize-card-form.js') }}"></script>
<script>
    document.getElementById('gambarInput').addEventListener('change', function (event) {
        const input = event.target;
        const preview = document.getElementById('previewGambar');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>