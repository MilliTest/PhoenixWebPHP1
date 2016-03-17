<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link type="text/css" rel="stylesheet" href="/css/reset.min.css" />
    <link type="text/css" rel="stylesheet" href="/css/theme.css" />
    <style>
        #page-header {
            width: 100%;
            height: 100px;
        }
        #page-nav {
            width: 100%;
            height: 40px;
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <header id="page-header">

    </header>
    <nav id="page-nav">

    </nav>
    @block('contentblock')
    <p>Parent Content</p>
    @endblock
</body>
</html>