<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @notifyCss
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <a href="/" style="text-decoration: none;">
            <h1 class="text-white">
                <b>Github</b>
                <span class="font-weight-lighter">Jobs</span>
            </h1>
        </a>
        @if (Auth::check())
        @auth
        <div class="col-3 d-flex align-items-center justify-content-between">
            <h3 class="m-0 text-white text-truncate">
                Hello, {{ auth()->user()->fullName }}
            </h3>
            <a href="/logout">
                <button type="button" class="btn btn-outline-light">Logout</button>
            </a>
        </div>
        @endauth
        @else
        <div class="col-1">
            <button type="button" class="btn btn-outline-light" onclick="showModalLogin()">Login</button>
        </div>
        @endif
    </nav>
    <div class="modal" id="login" style="display: none; background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModalLogin()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="mt-4 btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container container-content overflow-auto py-3">
        @yield('content')
    </div>
    <nav class="d-flex justify-content-center navbar navbar-light bg-light py-3">
        <p id="footer" class="m-0 text-center"></p>
    </nav>
    <script type="text/javascript">
        const thisYear = new Date().getFullYear();
        document.getElementById("footer").innerHTML = `Github Jobs ©${thisYear}`;

        function showModalLogin() {
            document.getElementById("login").style.display = "block";
        }

        function closeModalLogin() {
            document.getElementById("login").style.display = "none";
        }
    </script>
    <script src="https://cdn.tiny.cloud/1/sga86i1vk08zk8u6ggrauvn7xrm5lzn7kisc6o5t5up2wyht/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea#tiny-mce',
        plugins: 'anchor autolink emoticons image link lists media checklist mediaembed',
        toolbar: 'undo redo | blocks fontsize | bold italic underline strikethrough | link image media | align lineheight | numlist bullist indent outdent | charmap',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
    </script>
    <script>
        @yield('script')
    </script>
</body>
</html>