@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Kirim Promosi</h4>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('send-promotions.create') }}" class="btn btn-primary">
                            Kirim Promosi Baru
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Customer</th>
                                    <th>Judul Promosi</th>
                                    <th>Status</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sendPromotions as $index => $sendPromotion)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $sendPromotion->customer->name }}</td>
                                        <td>{{ $sendPromotion->promotion->title }}</td>
                                        <td>
                                            @if($sendPromotion->status == 'sent')
                                                <span class="badge bg-success">Terkirim</span>
                                            @else
                                                <span class="badge bg-danger">Gagal</span>
                                            @endif
                                        </td>
                                        <td>{{ $sendPromotion->sent_at }}</td>
                                        <td>
                                            <a href="{{ route('send-promotions.show', $sendPromotion->id) }}" 
                                               class="btn btn-info btn-sm">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data pengiriman promosi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
