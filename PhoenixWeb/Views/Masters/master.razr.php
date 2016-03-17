<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>@( $title )</title>
    <link type="text/css" rel="stylesheet" href="/css/reset.min.css" />
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron" />
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel" />
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="/css/theme.css" />
    @foreach($stylesheets as $stylesheet)
        <link type="text/css" rel="stylesheet" href="/css/@( $stylesheet ).css" />
    @endforeach
</head>
<body>
    <header id="page-header">
        <div class="container">
            <a href="/">
                <img src="/imgs/peak-outdoor.png" alt="Peak Outdoor Logo" />
                <h1>Peak Outdoor Adventure</h1>
            </a>
            <nav>
                <ul>
                    <li><a href="/shop">SHOP</a></li>
                    <li><a href="/collections">COLLECTIONS</a></li>
                </ul>
            </nav>
            <nav>
                <ul>
                    <li><a href="/about">ABOUT</a></li>
                    <li><a href="/blog">BLOG</a></li>
                    <li><a href="/cart">CART</a></li>
                    <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="jumbotron">

    </div>
    <main id="page-content">
        <div class="container">
            @block('contentblock')
            @endblock
        </div>
    </main>
    <footer id="page-footer">

    </footer>
</body>
</html>