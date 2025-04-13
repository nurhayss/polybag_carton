<style>
    .form-check-input {
        width: 20px;
        height: 20px;
        border: 2px solid #007bff;
        background-color: white;
        transition: all 0.3s ease-in-out;
        appearance: none;
        border-radius: 4px;
        display: inline-block;
        position: relative;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: #007bff;
        border-color: #007bff;
    }

    .form-check-input:checked::before {
        content: "✔";
        color: white;
        font-size: 14px;
        font-weight: bold;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .form-check-label {
        color: #333;
        font-weight: 600;
        margin-left: 8px;
        cursor: pointer;
    }

    .form-check {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .toggle-icon {
        cursor: pointer;
        font-size: 18px;
    }
</style>

@props(['order']);

<form action="{{ route('form-update') }}" method="POST">
    @csrf
    <div id="OrderContainer" class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div
            class="card-header text-white py-3 bg-gradient bg-primary d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold m-0 text-white flex-grow-1">Order Section</h5>
            <button class="btn btn-link p-0 border-0 shadow-lg toggle-btn ms-auto">
                <i class="fa-solid fa-circle-chevron-down fs-6 text-white"></i>
            </button>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">PO Number</label>
                        <input type="text" class="form-control" name="po_no" value="{{ $order->po_no }}">
                    </div>
                </div>
            </div>

            @php
            $hasExisting = $order->count() > 0;
            @endphp

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Order Number</label>
                    <input type="text" class="form-control" name="order_no" value="{{ $order->order_no }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Style</label>
                    <input type="text" class="form-control" name="style" id="styleInput" value="{{ $order->style }}">
                </div>
            </div>



            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Date</label>
                        <input type="date" class="form-control" name="date" value="{{ $order->date }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Buyer</label>
                        <input type="text" class="form-control" name="buyer" value="{{ $order->buyer }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Garment Qty</label>
                        <input type="text" class="form-control" name="qty_garment" value="{{ $order->qty_garment }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Shipment</label>
                        <select name="shipment" id="shipment" class="form-select">
                            <option disabled selected>Pilih Pengiriman</option>
                            <option value="1" {{ old('shipment', $order->shipment) == 1 ? 'selected' : '' }}>Sea
                            </option>
                            <option value="2" {{ old('shipment', $order->shipment) == 2 ? 'selected' : '' }}>Air
                            </option>
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Location</label>
                        <input type="text" class="form-control" name="location" value="{{ $order->location }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">GMT Delivery</label>
                        <input type="date" class="form-control" name="gmt_delivery" value="{{ $order->gmt_delivery }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Arrived At
                            <i class=" fs-4 fa fa-circle-question text-secondary ms-1" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Opsional"></i>
                        </label>
                        <input type="date" class="form-control" name="arrived_at" value="{{ $order->arrived_at }}">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 ms-auto text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#submitModal">
                Submit
            </button>
        </div>
    </div>


    <div class="modal fade" id="submitModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Submission Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-3 mb-4 bg-primary border-bottom">
                        <h5 class="m-0 fw-bold text-white">Polybag Packing</h5>
                    </div>
                    <div class="row mt-3 mb-2">
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    @php
                                    $packingOptions = [
                                    1 => 'Biasa',
                                    2 => 'Hanger Lubang 1',
                                    3 => 'Hanger Lubang 2',
                                    4 => 'Lidah',
                                    5 => 'Gusset',
                                    6 => 'Hanger'
                                    ];
                                    @endphp

                                    @foreach ($packingOptions as $value => $label)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="packing[]"
                                            id="pack{{ $value }}" value="{{ $value }}" {{ in_array($value,
                                            old('packing', $order->packing ?? [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pack{{ $value }}">{{ $label }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="p-3 mb-3 mt-5 bg-primary border-bottom">
                        <h5 class="m-0 fw-bold text-white">Polybag Notes</h5>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Kualitas Plastik</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="plastic_quality" id="pe"
                                                value="1" {{ old('plastic_quality', $order->plastic_quality ?? '') == 1
                                            ? 'checked' : '' }}>
                                            <label class="form-check-label" for="pe">PE</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="plastic_quality" id="pp"
                                                value="2" {{ old('plastic_quality', $order->plastic_quality ?? '') == 2
                                            ? 'checked' : '' }}>
                                            <label class="form-check-label" for="pp">PP</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Ketebalan</label>
                                <input type="text" class="form-control" name="thickness"
                                    value="{{ old('thickness', $order->thickness ?? '') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="print_warning" class="form-label fw-semibold">Print Warning</label>
                                <textarea class="form-control" id="print_warning" name="print_warning" cols="30"
                                    rows="5">{{ old('print_warning', $order->print_warning ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

</form>

<script src="{{ asset('assets/js/minimize-card-form.js') }}"></script>
<script src="{{ asset('assets/js/add-polybag-form.js') }}"></script>
<script src="{{ asset('assets/js/add-carton-form.js') }}"></script>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>