<x-head></x-head>
<style>
    .nav-pills .nav-link {
        background-color: lightgray;
        color: #212529;
        transition: all 0.2s ease-in-out;
    }

    .nav-pills .nav-link.active {
        background-color: #0d6efd;
        color: #fff;
    }
</style>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <x-sidebar :session="$session"></x-sidebar>
        <div class="body-wrapper">
            <header class="app-header">
                <x-navbar :session="$session">Account</x-navbar>
            </header>
            <div class="container-fluid min-vh-100">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <!-- Nav Tabs -->
                <ul class="nav nav-pills justify-content-center mb-5 gap-2" id="accountTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active rounded-pill px-4 py-2 fw-semibold" id="add-tab"
                            data-bs-toggle="pill" data-bs-target="#add" type="button" role="tab" aria-controls="add"
                            aria-selected="true">
                            <i class="bi bi-person-plus me-2"></i> Create Account
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4 py-2 fw-semibold" id="list-tab" data-bs-toggle="pill"
                            data-bs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="false">
                            <i class="bi bi-card-list me-2"></i> List Account
                        </button>
                    </li>
                </ul>



                <div class="tab-content" id="accountTabContent">
                    <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="add-tab">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="text-white">User Form</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{ route('create-user') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email">
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

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="password_confirmation" class="form-label">Confirmation
                                                        Password</label>
                                                    <input type="password"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                                        id="password_confirmation" name="password_confirmation">
                                                    @error('password_confirmation')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="role" class="form-label">Role</label>
                                                    <select class="form-select" id="role" name="role">
                                                        <option selected disabled>Pilih Role</option>
                                                        <option value="1">Merchandise</option>
                                                        <option value="2">Follow Up</option>
                                                        <option value="3">Purchasing</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 text-end">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="text-white">List User</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <table id="usersTable" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>

                                                @php
                                                $roleUser = [1 => 'Merchandise', 2 => 'Follow Up', 3 => 'Purchasing'];
                                                @endphp
                                                <td>{{ $roleUser[$user->role] }}</td>
                                                <td>
                                                    <a href="" class="badge text-bg-warning"><i
                                                            class="fa-solid fa-file-pen"></i></a>
                                                    <a class="badge text-bg-danger"><i
                                                            class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <x-js></x-js>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const hash = window.location.hash;
            
                    if (hash) {
                        const trigger = document.querySelector(`[data-bs-target="${hash}"]`);
                        if (trigger) {
                            const tab = new bootstrap.Tab(trigger);
                            tab.show();
                        }
                    }
                });
            </script>

</body>