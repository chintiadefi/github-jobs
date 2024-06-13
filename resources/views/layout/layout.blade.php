<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <h1 class="text-white">
            <b>Github</b>
            <span class="font-weight-lighter">Jobs</span>
        </h1>
    </nav>
    <div class="container container-content overflow-auto py-3">
        @yield('content')
    </div>
    <nav class="d-flex justify-content-center navbar navbar-light bg-light py-3">
        <p id="footer" class="m-0 text-center"></p>
    </nav>
    <script type="text/javascript">
        const thisYear = new Date().getFullYear();
        document.getElementById("footer").innerHTML = `Ant Design ©${thisYear}`;
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