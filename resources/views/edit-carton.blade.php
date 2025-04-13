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
                <x-carton-edit-form :order="$order" :polybag="$polybag" :carton="$carton"></x-carton-edit-form>
            </div>
        </div>
        <x-js></x-js>
</body>