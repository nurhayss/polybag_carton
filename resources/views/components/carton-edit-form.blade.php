@props(['order','polybag','carton','packing_type'])

<form action="{{ route('carton-update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="cartonSection" class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div
            class="card-header text-white py-3 bg-gradient bg-primary d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold m-0 text-white flex-grow-1">Carton Section</h5>
            <button class="btn btn-link p-0 border-0 shadow-lg toggle-btn ms-auto">
                <i class="fa-solid fa-circle-chevron-down fs-6 text-white"></i>
            </button>
        </div>
        <div class="card-body p-4 ">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Send Date</label>
                        <input type="date" class="form-control" name="send" value="{{ $carton->send }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Packing</label>
                        <input type="text" class="form-control" name="carton_packing" value="{{ $carton->packing }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quality</label>
                        <input type="text" class="form-control" name="quality" value="{{ $carton->quality }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="form-label fw-semibold">Ukuran (p x l x t)</label>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Panjang" name="carton_length"
                            value="{{ $carton->length }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Lebar" name="carton_width"
                            value="{{ $carton->width }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Tinggi" name="carton_height"
                            value="{{ $carton->height }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Volume</label>
                        <input type="text" class="form-control" name="volume" value="{{ $carton->volume }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi</label>
                        <input type="text" class="form-control" name="qty" value="{{ $carton->qty }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Berat</label>
                        <input type="text" class="form-control" name="weight" value="{{ $carton->weight }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Total Order</label>
                        <input type="number" class="form-control" name="total_order" value="{{ $carton->total_order }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Total Order</label>
                        <select name="packing_type" class="form-select" id="">
                            <option disabled>Pilih Packing Type</option>
                            <option selected value="{{ $carton->packingType->id }}">{{ $carton->packingType->name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row px-4 mb-3">
                <div class="col-md-3 ms-auto text-end">
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