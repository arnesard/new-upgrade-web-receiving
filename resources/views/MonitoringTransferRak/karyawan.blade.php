@extends('MonitoringTransferRak.app')

@section('title', 'Karyawan')

@push('styles')
    <style>
        .karyawan-wrap {
            padding: 16px;
            color: #e2e8f0;
        }

        .page-title {
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 14px;
            color: #64c8ff;
        }

        .card {
            background: rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 12px;
            margin-bottom: 14px;
        }

        .form-row {
            display: flex;
            gap: 10px;
        }

        .input {
            flex: 1;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid rgba(59, 130, 246, 0.25);
            background: rgba(15, 23, 42, 0.8);
            color: #e2e8f0;
            outline: none;
        }

        .input.small {
            padding: 8px 10px;
        }

        .btn-add {
            padding: 10px 14px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: white;
            font-weight: 700;
        }

        .btn-edit {
            padding: 8px 10px;
            border: none;
            border-radius: 8px;
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            font-weight: 700;
        }

        .btn-delete {
            padding: 8px 10px;
            border: none;
            border-radius: 8px;
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
            font-weight: 700;
        }

        .list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.03);
        }

        .edit-form {
            display: flex;
            gap: 8px;
            flex: 1;
        }

        .empty {
            text-align: center;
            color: #64748b;
            padding: 20px;
        }

        .modal {
            z-index: 2000 !important;
        }

        .modal-backdrop {
            z-index: 1990 !important;
        }
    </style>
@endpush
@section('content')
    <div class="karyawan-wrap">

        <div class="page-title">
            📋 Karyawan Transfer Rak
        </div>

        {{-- FORM TAMBAH --}}
        <div class="card">
            <form method="POST" action="{{ route('karyawan.store') }}" class="form-row">
                @csrf
                <input name="name" placeholder="Masukkan nama karyawan..." class="input" required>
                <button class="btn-add">＋ Tambah</button>
            </form>
        </div>

        {{-- LIST --}}
        <div class="list">
            @forelse ($data as $k)
                <div class="item">

                    {{-- EDIT --}}
                    <form method="POST" action="{{ route('karyawan.update', $k->id) }}" class="edit-form">
                        @csrf
                        @method('PUT')

                        <input name="name" value="{{ $k->name }}" class="input small">
                        <button class="btn-edit">Edit</button>
                    </form>

                    {{-- DELETE --}}
                    <button type="button" class="btn-delete" data-id="{{ $k->id }}" data-name="{{ $k->name }}"
                        onclick="openDeleteEmployeeModal({{ $k->id }}, '{{ addslashes($k->name) }}')">
                        ✕
                    </button>
                </div>
            @empty
                <div class="empty">Belum ada data karyawan</div>
            @endforelse
        </div>
    </div>

    {{-- MODAL DELETE --}}
    <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px; overflow: hidden;">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Hapus Karyawan</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Apakah Anda yakin ingin menghapus
                        <strong id="deleteEmployeeName"></strong>?
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light border rounded-pill" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <form id="deleteEmployeeForm" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger rounded-pill px-4">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openDeleteEmployeeModal(id, name) {
            const modalEl = document.getElementById('deleteEmployeeModal');

            document.getElementById('deleteEmployeeName').textContent = name;
            document.getElementById('deleteEmployeeForm').action = `/transfer-rak/karyawan/delete/${id}`;

            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    </script>
@endpush
