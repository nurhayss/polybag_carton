<!doctype html>
<html lang="en">

<x-head></x-head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <x-sidebar></x-sidebar>
    <div class="body-wrapper">
      <header class="app-header">
        <x-navbar :session="$session"></x-navbar>
      </header>
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <table id="usersTable" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach($session as $user) --}}
                  <tr>
                    <td>tes</td>
                    <td>tes</td>
                    <td>tes</td>
                    <td>tes</td>
                  </tr>
                  <tr>
                    <td>tes</td>
                    <td>tes</td>
                    <td>tes</td>
                    <td>tes</td>
                  </tr>
                  {{-- @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <x-js></x-js>
</body>

</html>