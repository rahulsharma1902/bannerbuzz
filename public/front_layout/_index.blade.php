<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas Template</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css" >
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Include Bootstrap JS (Popper.js and Bootstrap JS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include Fabric.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.js"
        integrity="sha512-hOJ0mwaJavqi11j0XoBN1PtOJ3ykPdP6lp9n29WVVVVZxgx9LO7kMwyyhaznGJ+kbZrDN1jFZMt2G9bxkOHWFQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Include Fabric.js i-text library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
        integrity="sha512-hOJ0mwaJavqi11j0XoBN1PtOJ3ykPdP6lp9n29WVVVVZxgx9LO7kMwyyhaznGJ+kbZrDN1jFZMt2G9bxkOHWFQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">

<!-- Include jQuery (required by Spectrum) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include Spectrum JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script> -->
</head>
<style>
    #layersList {
    display: block;
}
.layer {
    /* justify-content: space-evenly; */
}
    .layer-icon-box{
        width:35px;
        overflow: hidden;
    }
    .layer-icon-box img{
        width:100%;
        height: 100%;
    }
    #layers-content {
    background-color: #f2f2f2;
    padding: 10px;
}

.layer {
    padding: 10px;
    margin-bottom: 5px;
    cursor: pointer;
    user-select: none;
    display: flex;
    align-items: center;
}

.layer:hover {
    background-color: #e0e0e0;
}

.layer-icon {
    margin-right: 10px;
}

button {
    margin: 10px;
}
.selectTemp{
    cursor: pointer;
}
.color{
    width: 30px;
    height: 30px;
    border-radius: 4px;
    border: 1px solid;
}
.colorCng{
    width: 30px;
    height: 30px;
    border-radius: 4px;
    border: 1px solid;
}
</style>

<body>
    <div class="">
        @yield('content')
    </div>
</body>

</html>