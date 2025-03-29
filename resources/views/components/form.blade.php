<style>
    .form-check-input {
        width: 20px;
        height: 20px;
        border: 2px solid #007bff;
        background-color: white;
        transition: all 0.3s ease-in-out;
        appearance: none;
        /* Menghilangkan tampilan default */
        border-radius: 4px;
        /* Bikin kotak, hilangkan border-radius kalau mau tajam */
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
        /* Tambahkan centang */
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
</style>
<form>
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header text-white text-center py-3 bg-gradient bg-primary">
            <h5 class="card-title fw-bold m-0 text-white"> Order Section</h5>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">PO Number</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Order Number</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Style</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Date</label>
                        <input type="date" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Buyer</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Garment Qty</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header text-white text-center py-3 bg-gradient bg-primary">
            <h5 class="card-title fw-bold m-0 text-white"> Polybag Section</h5>
        </div>
        <div class="card-body p-4">
            <div class="row mt-3 mb-2">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pack" id="pack1">
                                <label class="form-check-label" for="pack1">Biasa</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pack" id="pack2">
                                <label class="form-check-label" for="pack2">Hanger Lubang 1</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pack" id="pack3">
                                <label class="form-check-label" for="pack3">Hanger Lubang 2</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pack" id="pack4">
                                <label class="form-check-label" for="pack4">Lidah</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pack" id="pack4">
                                <label class="form-check-label" for="pack4">Gusset</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pack" id="pack5">
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
                        <select name="" class="form-select" id="">
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
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="form-label fw-semibold">Ukuran (p x l)</label>
                <div class="col-md-6">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Panjang">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Lebar">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi/Polybag</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kebutuhan</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quantity Order</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kualitas Plastik</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pack" id="pe">
                                    <label class="form-check-label" for="pe">PE</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pack" id="pp">
                                    <label class="form-check-label" for="pp">PP</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ketebalan</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="" class="form-label fw-semibold">Print Warning</label>
                        <textarea name="" class="form-control" id="" cols="10" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header text-white text-center py-3 bg-gradient bg-primary">
            <h5 class="card-title fw-bold m-0 text-white"> Carton Section</h5>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Packing</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quality</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="form-label fw-semibold">Ukuran (p x l x t)</label>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Panjang">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Lebar">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Tinggi">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Volume</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Berat</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>