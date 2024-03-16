<?= $this->extend("layouts/app"); ?>

<?= $this->section("content"); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="d-flex justify-content-end">
                    <div class="auto-close alert alert-success alert-dismissible position-absolute end-0 me-5 fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg> <?= session()->getFlashdata('message'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>List Of Comics</h1>
                <a href="/comics/create" class="btn btn-primary">Add Comic</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($comics as $comic) : ?>
                        <tr class="align-middle">
                            <th scope="row"><?= $no++; ?></th>
                            <td><img src="/images/<?= $comic['cover']; ?>" alt="Cover" class="cover img-fluid"></td>
                            <td><?= $comic['title']; ?></td>
                            <td>
                                <a href="/comics/<?= $comic['slug']; ?>" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>