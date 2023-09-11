<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Somen Banerjee">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Codeigniter 4 Gallery</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>

<body>

    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                        <circle cx="12" cy="13" r="4" />
                    </svg>
                    <strong>CI<span class="text-danger">4</span>Gallery</strong>
                </a>
            </div>
        </div>
    </header>

    <main>

        <section class="py-3 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">A Simple Gallery</h1>
                    <p class="lead text-muted">Where you can upload any image. After uploading you can view, download and delete that image directly from the files without any database interaction.</p>
                    <form class="text-start pt-4" action="<?= base_url('new') ?>" method='post' enctype='multipart/form-data'>
                        <div class="mb-3">
                            <input class="form-control form-control-lg" name="image" type="file">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark btn-lg">Submit</button>
                        </div>
                        <?php
                        if (session()->getFlashdata('error') !== NULL) :
                            foreach (session()->getFlashdata('error') as $error) :
                        ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                    <li><?= esc($error) ?></li>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>

                        <?php
                        if (session()->getFlashdata('success') !== NULL) :
                        ?>
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <?= session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        endif;
                        ?>
                    </form>

                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <?php
                if (empty($images)) :
                ?>
                    <row class="row row-cols-1 text-center">
                        <div class="col">
                            <div class="alert alert-light" role="alert">
                                Sorry! No image found in this gallery.
                            </div>
                        </div>
                    </row>
                <?php else : ?>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php
                        foreach ($images as $image) :

                        ?>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="uploads/<?= $image['name'] ?>" alt="<?= $image['name']  ?>">

                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="download/<?= $image['name'] ?>" class="btn btn-sm btn-outline-secondary">Download</a>
                                                <a href="delete/<?= $image['name'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                                            </div>
                                            <small class="text-muted"><?= $image['size'] ?> KB</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">By Somen Banerjee</p>
            <p class="mb-0">With Codeigniter 4 and Bootstrap 5.3.</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>