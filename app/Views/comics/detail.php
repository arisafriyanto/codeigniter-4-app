<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mb-3">Comic Detail</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/images/<?= $comic['cover']; ?>" class="img-fluid rounded-start" alt="<?= $comic['title']; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comic['title']; ?></h5>
                            <p class="card-text"><b>Author: </b><?= $comic['author']; ?></p>
                            <p class="card-text"><b>Publisher: </b> <?= $comic['publisher']; ?></p>

                            <div class="mt-5 pt-3">
                                <a href="/comics/edit/<?= $comic['slug']; ?>" class="btn btn-warning">Edit</a>

                                <form class="d-inline" action="/comics/<?= $comic['id']; ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete the data?')" class="btn btn-danger">Delete</button>
                                </form>

                            </div>
                        </div>
                        <a href="/comics" class="btn btn-link" style="text-decoration: none;">
                            👈 Back to comics list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>