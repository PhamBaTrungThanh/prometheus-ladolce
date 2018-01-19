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
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="columns">
                        <div class="column is-8 is-offset-2 ">
                            <h3 class="title">
                                Choose XML file 
                            </h3>
                            <div class="field">
                                <div class="control">
                                    <input class="input" type="file" name="file" id="file" placeholder="Chọn file XML">
                                </div>            
                            </div>
                            <div class="field">
                                <div class="control has-text-centered">
                                    <input type="submit" value="Upload" class="button is-large is-primary">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>
</html>