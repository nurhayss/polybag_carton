@props(['order'])

<form action="{{ route('polybag-create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="polybagContainer" class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div
            class="card-header text-white py-3 bg-gradient bg-primary d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold m-0 text-white flex-grow-1">Polybag Section</h5>
            <button class="btn btn-link p-0 border-0 shadow-lg toggle-btn ms-auto">
                <i class="fa-solid fa-circle-chevron-down fs-6 text-white"></i>
            </button>
        </div>
        <div class="card-body p-4 d-none ">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pack</label>
                        <select name="pack" class="form-select" id="">
                            <option disabled selected>Pilih Pack</option>
                            <option value="solid">Solid</option>
                            <option value="assort">Assort</option>
                            <option value="individual">Individual (.com)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Size</label>
                        <input type="text" class="form-control" name="size">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="form-label fw-semibold">Ukuran (p x l)</label>
                <div class="col-md-6">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Panjang" name="length">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Lebar" name="width">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi/Polybag</label>
                        <input type="number" class="form-control" name="isi">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kebutuhan</label>
                        <input type="number" class="form-control" name="kebutuhan">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quantity Order</label>
                        <input type="number" class="form-control" name="qty_order">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quantity Beli</label>
                        <input type="number" class="form-control" name="qty_beli">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload Image</label>
                        <input type="file" class="form-control" name="image" id="gambarInput">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mt-2 mb-3">
                        <label for="previewGambar" class="form-label fw-semibold">Image Preview</label>
                        <img id="previewGambar" src="#" alt="Preview Gambar" style="max-width: 100%; display: none;"
                            class="rounded border">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ms-auto text-end px-3 mb-3">
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>


    </div>
</form>
<form action="{{ route('carton-create') }}" method="POST">
    @csrf
    <div id="cartonSection" class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div
            class="card-header text-white py-3 bg-gradient bg-primary d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold m-0 text-white flex-grow-1">Carton Section</h5>
            <button class="btn btn-link p-0 border-0 shadow-lg toggle-btn ms-auto">
                <i class="fa-solid fa-circle-chevron-down fs-6 text-white"></i>
            </button>
        </div>
        <div class="card-body p-4 d-none ">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Packing</label>
                        <input type="text" class="form-control" name="carton_packing">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quality</label>
                        <input type="text" class="form-control" name="quality">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="form-label fw-semibold">Ukuran (p x l x t)</label>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Panjang" name="carton_length">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Lebar" name="carton_width">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Tinggi" name="carton_height">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Volume</label>
                        <input type="text" class="form-control" name="volume">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Berat</label>
                        <input type="number" class="form-control" name="weight">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Total Order</label>
                        <input type="number" class="form-control" name="total_order">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ms-auto text-end px-3 mb-3">
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
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