<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prometheus</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
    </head>
<body>
    <section class="hero is-bold ">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-spaced">
                    Prometheus
                </h1>
                <h2 class="subtitle">
                    A simple project build by <a href="fb.me/pham.ba.trung.thanh">Trung Thành</a>
                </h2>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="tile is-ancestor">
            <div class="tile notification is-primary is-parent">
                <div class="tile is-child">
                    <div class="content">
                        <p class="title is-3 has-text-centered">Process completed! Redirect to download in 3 secconds</p> 
                        <p class="has-text-centered">
                            <a href='<?php echo "storage/{$today}.xlsx" ?>' class="button is-link is-medium" id="downloader">Download <?php echo "{$today}.xlsx"?></a>
                        </p>                    
                    </div>
                </div>        
            </div>
        </div>
    </section>
    <script language="javascript">
        var downloader = document.getElementById("downloader");
        var redirect = setTimeout(function() {
            window.location = downloader.getAttribute('href');
        }, 3000);
        downloader.addEventListener('click', function() {
            clearTimeout(redirect);
            return true;
        });
    </script>
</body>
</html>
    