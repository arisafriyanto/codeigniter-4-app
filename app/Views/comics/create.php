<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mb-3">Add Comic</h2>
            <div class="card">
                <div class="card-body">
                    <form action="/comics/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= validation_show_error('title') ? 'is-invalid' : '' ?>" name="title" id="title" placeholder="One Piece" value="<?= old('title'); ?>" autofocus>

                                <div id="title" class="invalid-feedback">
                                    <small><?= validation_show_error('title') ?></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="author" class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="author" id="author" placeholder="John Doe" value="<?= old('author'); ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Gramedia" value="<?= old('publisher'); ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control  <?= validation_show_error('cover') ? 'is-invalid' : '' ?>" name="cover" id="cover">

                                <div id="cover" class="invalid-feedback">
                                    <small><?= validation_show_error('cover') ?></small>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>