<x-head></x-head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <x-sidebar :session="$session"></x-sidebar>
        <div class="body-wrapper">
            <header class="app-header">
                <x-navbar :session="$session">Order Form</x-navbar>
            </header>
            <div class="container-fluid">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">User Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route('update-user') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $user->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password">
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-select" id="role" name="role">
                                                <option value="1" {{ old('role', $user->role ?? '') == 1 ? 'selected' :
                                                    '' }}>Merchandise</option>
                                                <option value="2" {{ old('role', $user->role ?? '') == 2 ? 'selected' :
                                                    '' }}>Follow Up</option>
                                                <option value="3" {{ old('role', $user->role ?? '') == 3 ? 'selected' :
                                                    '' }}>Purchasing</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-js></x-js>
</body>