<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mb-3">Edit Comic</h2>
            <div class="card">
                <div class="card-body">
                    <form action="/comics/update/<?= $comic['id']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= validation_show_error('title') ? 'is-invalid' : '' ?>" name="title" id="title" placeholder="One Piece" value="<?= old('title') ?? $comic['title']; ?>" autofocus>

                                <div id="title" class="invalid-feedback">
                                    <small><?= validation_show_error('title') ?></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="author" class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="author" id="author" placeholder="John Doe" value="<?= old('author') ?? $comic['author'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Gramedia" value="<?= old('publisher') ?? $comic['publisher'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cover" id="cover" value="<?= old('cover') ?? $comic['cover'] ?>">
                            </div>
                        </div>

                        <a href="/comics/<?= $comic['slug']; ?>" class="btn btn-link" style="text-decoration: none;">👈 Back</a>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>