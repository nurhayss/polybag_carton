<x-head></x-head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <x-sidebar></x-sidebar>
        <div class="body-wrapper">
            <header class="app-header">
                <x-navbar :session="$session">Order Form</x-navbar>
            </header>
            <div class="container-fluid">
                <x-form></x-form>
            </div>
        </div>
        <x-js></x-js>
</body>