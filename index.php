<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prometheus</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
        <style>
            .prometheus-foot {
                position: absolute;
                left: 0;
                right: 0;
                bottom: 0;
            }
        </style>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    </head>
<body>
    <section class="hero is-bold ">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-spaced">
                    Prometheus
                </h1>
                <h2 class="subtitle">
                    A simple project built by <a href="fb.me/pham.ba.trung.thanh">Trung Thành</a>
                </h2>
            </div>
        </div>
    </section>
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <form method="POST" enctype="multipart/form-data">
                    <div class="columns">
                        <div class="column is-8 is-offset-2 ">
                            <h3 class="title">
                                Choose XML file 
                            </h3>
                            <div class="field">
                                <div class="control">
                                    <div class="file has-name is-fullwidth" id="file-holder">
                                        <label class="file-label">
                                            <input class="file-input" type="file" name="file" id="file">
                                            <span class="file-cta">
                                                <span class="file-icon">
                                                    <i class="fas fa-upload"></i>
                                                </span>
                                                <span class="file-label">
                                                    Choose XML file…
                                                </span>
                                            </span>
                                            <span class="file-name" id="file-name-holder">
                                                
                                            </span>
                                        </label>
                                    </div>
                                    <p class="help is-danger is-invisible" id="help-text">
                                        Not a valid XML file.
                                    </p>
                                </div>            
                            </div>
                            <div class="field is-grouped is-grouped-centered is-invisible" id="buttons">
                                <div class="control">
                                    <button type="submit" name="proccess" class="button is-medium is-primary" formaction="process_xlsx.php">
                                        <span class="icon">
                                            <i class="fas fa-table"></i>
                                        </span>
                                        <span>Download XLXS</span>
                                    </button>
                                </div>
                                <div class="control">
                                    <button type="submit" name="proccess" class="button is-medium is-link" formaction="process_xml.php">
                                        <span class="icon">
                                            <i class="fas fa-file"></i>
                                        </span>
                                        <span>Download XML</span></button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <footer class="footer prometheus-foot">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                    <strong>Prometheus</strong> © 2018 by <a href="https://fb.me/pham.ba.trung.thanh">Trung Thành</a>
                </p>
            </div>
        </div>
    </footer>
    <script language="javascript">
        var buttons = document.getElementById("buttons");
        var file = document.getElementById("file");
        var fileHolder = document.getElementById("file-holder");
        var fileName = document.getElementById("file-name-holder");
        var helpText = document.getElementById("help-text");
        if (window.FileReader && window.Blob) {
            file.addEventListener("change", function() {
                fileName.innerText = file.files[0].name;
                
                if (file.files[0].type !== "text/xml") {
                    fileHolder.classList.add("is-danger");
                    helpText.classList.remove("is-invisible");
                } else {
                    fileHolder.classList.remove("is-danger");
                    helpText.classList.add("is-invisible");
                    buttons.classList.remove("is-invisible");
                }
            });
        } else {
            buttons.classList.remove("is-invisible");
        }
    </script>
</body>
</html>