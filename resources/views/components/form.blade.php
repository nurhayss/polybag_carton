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
<form action="{{ route('form-post') }}" method="POST">
    @csrf
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
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
                        <input type="text" class="form-control" name="po_no">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Order Number</label>
                        <input type="text" class="form-control" name="order_no">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Style</label>
                        <input type="text" class="form-control" name="style">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Date</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Buyer</label>
                        <input type="text" class="form-control" name="buyer">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Garment Qty</label>
                        <input type="text" class="form-control" name="qty_garment">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Shipment</label>
                        <select name="shipment" id="shipment" class="form-select">
                            <option disabled selected>Pilih Pengiriman</option>
                            <option value="1">Sea</option>
                            <option value="2">Air</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Location</label>
                        <input type="text" class="form-control" name="location">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">GMT Delivery</label>
                        <input type="date" class="form-control" name="gmt_delivery">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="polybagContainer" class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div
            class="card-header text-white py-3 bg-gradient bg-primary d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold m-0 text-white flex-grow-1">Polybag Section</h5>
            <button class="btn btn-link p-0 text-white border-0 me-3" type="button" id="addCardBtn">
                <i class="fa fa-plus"></i>
            </button>
            <button class="btn btn-link p-0 text-white border-0 me-3" type="button" id="removeCardBtn">
                <i class="fa fa-minus"></i>
            </button>
            <button class="btn btn-link p-0 border-0 shadow-lg toggle-btn ms-auto">
                <i class="fa-solid fa-circle-chevron-down fs-6 text-white"></i>
            </button>
        </div>
        <div class="card-body p-4 d-none">
            <div class="row mt-3 mb-2">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="packing" id="pack1" value="1">
                                <label class="form-check-label" for="pack1">Biasa</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="packing" id="pack2" value="2">
                                <label class="form-check-label" for="pack2">Hanger Lubang 1</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="packing" id="pack3" value="3">
                                <label class="form-check-label" for="pack3">Hanger Lubang 2</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="packing" id="pack4" value="4">
                                <label class="form-check-label" for="pack4">Lidah</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="packing" id="pack4" value="5">
                                <label class="form-check-label" for="pack4">Gusset</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="packing" id="pack5" value="6">
                                <label class="form-check-label" for="pack5">Hanger</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <input type="text" class="form-control" placeholder="Panjang" name="length">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Lebar" name="width">
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
        </div>
    </div>
    <div id="cartonSection" class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div
            class="card-header text-white py-3 bg-gradient bg-primary d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold m-0 text-white flex-grow-1">Carton Section</h5>
            <button class="btn btn-link p-0 text-white border-0 me-3" type="button" id="addCartonBtn">
                <i class="fa fa-plus"></i>
            </button>
            <button class="btn btn-link p-0 text-white border-0 me-3" type="button" id="removeCartonBtn">
                <i class="fa fa-minus"></i>
            </button>
            <button class="btn btn-link p-0 border-0 shadow-lg toggle-btn ms-auto">
                <i class="fa-solid fa-circle-chevron-down fs-6 text-white"></i>
            </button>
        </div>
        <div class="card-body p-4 d-none">
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
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Volume</label>
                        <input type="text" class="form-control" name="volume">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi</label>
                        <input type="text" class="form-control" name="qty">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Berat</label>
                        <input type="text" class="form-control" name="weight">
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Submission Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-3 mb-3 bg-primary border-bottom">
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
                                                value="1">
                                            <label class="form-check-label" for="pe">PE</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="plastic_quality" id="pp"
                                                value="2">
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
                                <input type="text" class="form-control" name="thickness">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="print_warning" class="form-label fw-semibold">Print Warning</label>
                                <textarea class="form-control" id="print_warning" name="print_warning" cols="30"
                                    rows="5"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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