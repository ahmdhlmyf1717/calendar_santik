<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- CSS SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- JS SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@props(['action', 'data'])

<div class="modal-dialog modal-dialog-centered">
    <form id="form-action" action="{{ $action }}" method="post">
        @csrf

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Events</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                {{ $slot }}
            </div>

            <div class="modal-footer d-flex justify-content-between">
                @if ($data->id)
                    <button type="button" class="btn btn-danger"
                        onclick="showDeleteConfirmation(this, '{{ route('events.destroy', $data->id) }}')">
                        <i class="bi bi-trash me-1"></i> Delete
                    </button>
                @else
                    <div></div> <!-- Placeholder kosong untuk menjaga layout -->
                @endif

                <div class="d-flex">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function showDeleteConfirmation(button, deleteUrl) {
            // Dapatkan modal induk
            const modal = button.closest('.modal');

            // Sembunyikan modal Bootstrap
            if (modal) {
                button.blur(); // hilangkan fokus dari tombol yang ditekan
                document.activeElement.blur(); // pastikan tidak ada elemen fokus
                const modalInstance = bootstrap.Modal.getOrCreateInstance(modal);
                modalInstance.hide();
            }


            // Pastikan CSRF token ada
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
            if (!csrfToken) {
                console.error('CSRF token tidak ditemukan!');
                return;
            }

            // Tampilkan SweetAlert
            Swal.fire({
                title: 'Yakin ingin hapus?',
                text: 'Data tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Buat form delete
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = deleteUrl;

                    // Tambahkan CSRF token
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;
                    form.appendChild(csrfInput);

                    // Tambahkan method spoofing DELETE
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    form.appendChild(methodInput);

                    // Kirim form via fetch biar kita bisa handle respon-nya
                    fetch(deleteUrl, {
                            method: 'POST',
                            body: new FormData(form),
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Tampilkan hasil SweetAlert berdasarkan respon
                            Swal.fire({
                                icon: data.swal?.icon || 'success',
                                title: data.swal?.title || 'Sukses',
                                text: data.swal?.text || 'Data berhasil dihapus',
                            }).then(() => {
                                // Setelah alert ditutup, refresh halaman atau reload data
                                location.reload();
                            });
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus.', 'error');
                        });
                }

            });
        }
    </script>
</div>
