<style>
    .button {
    position: relative;
    width: 2em;
    height: 2em;
    border: 3px;
    border-color: black;
    background: rgba(180, 83, 107, 0.11);
    border-radius: 50px;
    transition: background 0.3s;
    }

    .X {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 2em;
    height: 1.5px;
    background-color: rgb(5, 5, 5);
    transform: translateX(-50%) rotate(45deg);
    }

    .Y {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 2em;
    height: 1.5px;
    background-color: rgb(5, 5, 5);
    transform: translateX(-50%) rotate(-45deg);
    }

    .close {
    position: absolute;
    display: flex;
    padding: 0.8rem 1.5rem;
    align-items: center;
    justify-content: center;
    transform: translateX(-50%);
    top: -70%;
    left: 50%;
    width: 3em;
    height: 1.7em;
    font-size: 12px;
    background-color: rgb(19, 22, 24);
    color: rgb(187, 229, 236);
    border: 40px;
    border-radius: 3px;
    pointer-events: none;
    opacity: 0;
    }

    .button:hover {
    background-color: rgb(14, 28, 231);
    }

    .button:active {
    background-color: rgb(21, 33, 201)
    }

    .button:hover > .close {
    animation: close 0.2s forwards 0.25s;
    }

    @keyframes close {
    100% {
        opacity: 1;
    }
    }

</style>

@if($isComprobante === false)
    <div class="modal fade align-content-md-center" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content px-3">
                <div class="d-flex justify-content-end row p-2">
                    <button type="button" class="floating-close d-flex justify-content-center align-items-center col-sm-12" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                    <h5 class="modal-title text-primary text-sm-center text-titulo" id="{{ $id }}Label" style="color: blue;">{{ $title }}</h5>
                </div>
                <div class="modal-body text-sm-center">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
@else
    {{-- Modal Comprobante --}}
    <div class="modal fade align-content-md-center" id="{{ $id }}Comprobante" tabindex="-1" aria-labelledby="{{ $id }}ComprobanteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h1 class="modal-title fs-4 text-success-emphasis text-titulo fw-normal" id="{{ $id }}ComprobanteLabel">
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
@endif

