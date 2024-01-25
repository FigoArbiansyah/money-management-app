@extends('layouts.main')
{{-- @dd($transactions) --}}
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @if (session('info'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <span>{{ session('info') }} ✅</span>
                    </div>
                </div>
            @elseif (session('errors'))
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <span>{{ session('errors') }}</span>
                    </div>
                </div>
            @endif
            <div class="col-12">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded">
                                </div>
                                <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded d-none"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Uang Masuk</span>
                            <h3 class="card-title mb-2">{{ 'Rp ' . number_format($income, 2, ',', '.') }}</h3>
                            {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                                </div>
                                <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded d-none"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Uang Keluar</span>
                            <h3 class="card-title mb-2">{{ 'Rp ' . number_format($expense, 2, ',', '.') }}</h3>
                            {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card pb-5">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Info Transaksi</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Transaksi</button>
                    </div>
                    @include('transactions.modals.add')
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>#</th>
                                    <th>Tipe</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Kategori</th>
                                    <th>Catatan</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $key => $transaction)
                                <tr>
                                    <th scope="row">{{ $transactions->firstItem() + $loop->index }}</th>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ 'Rp ' . number_format($transaction->amount, 2, ',', '.') }}</td>
                                    <td>{{ $transaction->date }}</td>
                                    <td>{{ $transaction->category }}</td>
                                    <td>{{ $transaction->note }}</td>
                                    <td>
                                        <div class="d-flex gap-2 items-center">
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $transaction->id }}">
                                                <i class="bx bx-pen"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $transaction->id }}">
                                                <i class="bx bx-eraser"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @include('transactions.modals.edit')
                                @include('transactions.modals.delete')
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex mt-5 justify-content-center">
                            {!! $transactions->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
