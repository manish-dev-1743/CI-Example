<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Category</h1>

    </div>
    <?= $this->session->flashdata('success'); ?>
    <?= $this->session->flashdata('error'); ?>

    <div class="row g-3 align-items-center  mt-5 card" style="width: 500px;">

        <form method="POST" action="<?= site_url('addcategory')?>">
            <div class="card-header text-bg-secondary d-flex justify-content-center">
                <span class="text text-md-center ">Add category</span>
            </div>
            <div class="card-body">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Category Name</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="name" name="name" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Must be valid Category Name.
                    </span>
                </div>
                </P>
            </div>

            <div class="card-footer text-bg-secondary">
                <button type="submit" class="btn btn-outline-dark bg-primary bg-opacity-25">Submit</button>
            </div>
    </div>

</main>