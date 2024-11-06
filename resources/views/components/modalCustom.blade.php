 {{-- Modal Comprobante --}}
 <div class="modal fade align-content-md-center" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h1 class="modal-title fs-4 text-success-emphasis text-titulo fw-normal" id="{{ $id }}">
                    <i class="bi bi-house-exclamation-fill text-leono"></i> {{ $title }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
