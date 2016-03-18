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
                    <li><a href="/shop/cart">CART</a></li>
                    <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="jumbotron"></div>
    <main id="page-content">
        <div class="container">
            <section>
                <h1>About</h1>
                <p>Sed tincidunt et massa sit amet convallis. Nunc magna tortor, iaculis ac elit vel, pellentesque tempus dolor. Vivamus lorem tortor, tincidunt in turpis sit amet, accumsan facilisis lacus. Integer dictum aliquet turpis, eu porta lectus dapibus sit amet. Sed convallis, nisl vel suscipit imperdiet, nulla dui porta leo, at suscipit justo massa blandit felis. Sed semper risus ut dignissim lobortis. Donec a aliquam tellus. Donec ut condimentum arcu. Ut vel tempus mi, nec convallis ex. Integer non auctor tortor, nec tempor turpis. Suspendisse congue velit ultrices, consectetur ex dignissim, rhoncus mauris. Aliquam a semper lectus. Duis leo erat, vulputate et nibh in, imperdiet luctus ligula.</p>
                <p>Duis eget nisi ut erat viverra tristique. Fusce eget imperdiet velit, in luctus dolor. Proin non enim tempor elit finibus sollicitudin et sed arcu. Suspendisse volutpat, massa et auctor malesuada, turpis neque eleifend eros, non ultrices libero enim a dui. In molestie turpis sit amet mollis aliquet. Fusce vel sodales erat, ut porta sem. Aenean venenatis ut ante tristique finibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Vivamus sed condimentum orci. Phasellus condimentum malesuada felis, non facilisis nulla varius at. Morbi ultrices justo pulvinar, fringilla metus ut, vulputate dui. In non congue velit. Quisque vitae nisi et arcu tincidunt tempus ut non lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis leo nec mi sagittis, non accumsan risus molestie. Nullam auctor euismod magna sit amet ultrices. Nulla vel dictum mi, ac luctus ex.</p>
                <p>Aenean luctus ligula hendrerit, imperdiet turpis quis, congue ante. Nullam sagittis eget dui in maximus. Donec a varius neque, a vehicula ex. Nam pharetra enim sit amet nulla faucibus tincidunt nec quis lacus. Aliquam id fringilla ante. Aenean sed justo et nibh aliquam pellentesque quis at justo. Nam tempus nisl nec egestas gravida. Praesent et nisi neque. Quisque id ligula et magna condimentum rhoncus interdum ut ex. Pellentesque tristique, nibh id auctor sodales, massa leo tempor sapien, id placerat risus mi sed dolor. Donec in mauris suscipit, ornare lectus vel, imperdiet sapien. Proin finibus arcu in sapien mollis dignissim. Aenean at elit sem. Nunc lacinia porttitor orci, id consequat dolor vestibulum ut. Quisque vehicula condimentum turpis. Etiam volutpat sem ac tortor aliquet, a finibus dolor rutrum. Praesent lobortis dui enim, at laoreet ipsum hendrerit vel. Nunc cursus dolor non arcu laoreet laoreet. Aliquam dictum odio non justo rutrum hendrerit. Fusce sodales iaculis vehicula. Curabitur imperdiet ipsum augue, vel tincidunt felis consequat nec. Sed nec augue vehicula, aliquam nunc nec, dapibus sem. Nullam nisi diam, lacinia in semper at, semper a purus. Nullam nunc eros, scelerisque eu auctor in, iaculis vitae libero. Sed a sapien ipsum. Nam tempor convallis nisi ac tempor. Nunc venenatis dictum eros, mattis pellentesque elit interdum vestibulum. Praesent et commodo eros, viverra vulputate dolor. Sed pharetra eleifend velit et feugiat. Nulla facilisi. Donec congue, velit et semper feugiat, tellus dolor bibendum dui, id ultricies enim urna a purus.</p>
            </section>
        </div>
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
</body>
</html>