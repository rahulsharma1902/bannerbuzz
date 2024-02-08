<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
            integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
            integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
        <title>Design online</title>
    </head>
    <body>
        <header class="header_wrap">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="./img/new_create_logo.png" class="img-fluid" alt="" /></a>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <!--   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            </li>
                        </ul> -->
                        <div class="button-group">
                            <button data-title="Undo" data-placement="bottom" class="spride-svg btnundo is-disabled bottom" id="undo" disabled="disabled" aria-label="Undo">
                                <span class="menu-text"><img src="./img/undo.png" class="img-fluid" alt="" /></span>
                            </button>
                            <button data-title="Redo" data-placement="bottom" class="spride-svg btnredo is-disabled bottom" id="redo" disabled="disabled" aria-label="Redo">
                                <span class="menu-text"><img src="./img/redo.png" class="img-fluid" alt="" /></span>
                            </button>
                            <div class="button-group trash-box">
                                <button id="trash" data-title="Trash" data-placement="bottom" class="spride-svg btntrash bottom" aria-label="Trash">
                                    <span class="menu-text"><img src="./img/delete-img.png" class="img-fluid" alt="" /></span>
                                </button>
                            </div>
                        </div>
                        <div class="hd_ryt_buttn">
                            <a hef="#" class="btn cta">Continue</a>
                            <a hef="#" class="btn cta btn-pnk">Proceed & Checkout</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
            integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="js/script.js"></script>
    </body>
</html>
