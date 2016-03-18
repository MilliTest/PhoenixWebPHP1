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
    @foreach($stylesheets as $url)
        <link type="text/css" rel="stylesheet" href="/css/@( $url ).css" />
    @endforeach
</head>
<body>
    <header id="page-header">
        <div class="container">
            <a href="/">
                <img src="/imgs/peak-outdoor.png" alt="Peak Outdoor Logo" />
                <h1>Peak Outdoor Adventure Gear</h1>
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
                    <li><a href="#">BLOG</a></li>
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
        @block('topblock')
        @endblock
        <div class="container">
            @block('contentblock')
            @endblock
        </div>
        @block('bottomblock')
        @endblock
    </main>
    <footer id="page-footer">
        <div class="container">
            <div class="row">
                <nav>
                    <ul>
                        <li><a href="/legal/terms">Terms</a></li>
                        <li><a href="/legal/privacy">Privacy</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </nav>
                <div id="footer-social-icons">

                </div>
            </div>
            <div class="row">
                <p>&copy; @( $copyright ), Studio Web Productions. All rights reserved.</p>
            </div>
        </div>
    </footer>
    @if( isset($javascript) && !empty($javascript) )
        @foreach( $javascript as $url )
        <script type="text/javascript" src="@( $url )"></script>
        @endforeach
    @endif
</body>
</html>