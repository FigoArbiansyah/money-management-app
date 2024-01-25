<div class="modal fade" id="addModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/transactions" method="post">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="type" class="form-label">Tipe</label>
                            <select name="type" id="type"
                                class="form-control @error('type') is-invalid @enderror">
                                <option value="expense">Uang Keluar</option>
                                <option value="income">Uang Masuk</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('type')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="amount" class="form-label">Jumlah Transaksi</label>
                            {{-- <p>{{ Carbon::now()->format('d-m-Y') }}</p> --}}
                            <input type="number" id="amount"
                                class="form-control @error('amount') is-invalid @enderror" name="amount"
                                value="{{ old('amount') }}">
                            <div class="invalid-feedback">
                                @error('amount')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="date" class="form-label">Tanggal</label>
                            <input type="date" id="date" value="{{ old('date', date('Y-m-d')) }}"
                                class="form-control @error('date') is-invalid @enderror" name="date">
                            <div class="invalid-feedback">
                                @error('date')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    @php
                        $categories = ["Makanan", "Transportasi", "Hiburan", "Gaji", "Kerja Freelance", "Keperluan", "Bonus", "Lainnya"];
                    @endphp
                    <div class="row">
                        <div class="col mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select name="category" id="category"
                                class="form-control @error('category') is-invalid @enderror">
                                @foreach ($categories as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('category')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="note" class="form-label">Catatan</label>
                            <textarea name="note" id="note" cols="30" rows="5"
                                class="form-control @error('note') is-invalid @enderror">{{ old('note') }}</textarea>
                            <div class="invalid-feedback">
                                @error('note')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
