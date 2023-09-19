@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="mt-3 list-none list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        {{-- <button type="button" class="btn-close" data-bs-dismis="alert" aria-label="close">
                                            </button> --}}
        <h3>Login Berhasil</h3>
    </div>
@endif

@if (session()->has('message-error'))
    <div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('message-error') }}
    </div>
@endif
