<main role="main" class="col-md-10 ml-sm-auto px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Post</h1>

    </div>
    <?= $this->session->flashdata('success'); ?>
    <?= $this->session->flashdata('error'); ?>
    <div class="row">
        <div class="col-4 g-3 align-items-center p-0 mt-5 card" style="width: 380px;">

            <form method="POST" action="<?= site_url('addblog') ?>" enctype='multipart/form-data'>
                <div class="card-header text-bg-secondary d-flex justify-content-center">
                    <span class="text text-md-center ">Add Post</span>
                </div>
                <div class="card-body">
                    <div class="col-auto">
                        <label for="cat_id" class="col-form-label">Categories</label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select" aria-label="Default select example" id='cat_id' name="cat_id">
                            <option selected disabled>Select Category</option>
                            <?php foreach ($category as $cat) { ?>
                                <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-auto pt-2">

                        <label for="title" class="col-form-label">Title</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="title" name="title" class="form-control" aria-describedby="passwordHelpInline">
                        <span class="text-danger"><?= form_error('title'); ?></span>
                    </div>
                    <div class="col-auto">
                        <span id="passwordHelpInline" class="form-text">
                            Must be valid Title.
                        </span>
                    </div>

                    <div class="col-auto pt-2">
                        <label for="name" class="col-form-label">Description</label>
                    </div>
                    <div class="col-auto">
                        <textarea name="description" class="form-control" id="description">Enter description here...</textarea>
                    </div>

                    <div class="col-auto pt-2">
                        <label for="imgname" class="form-label">Upload Post Images</label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" type="file" id="imgname" name="imgname[]" multiple>

                    </div>



                </div>

                <div class="card-footer text-bg-secondary d-flex justify-content-center pt-2">
                    <button type="submit" class="btn btn-outline-dark bg-primary bg-opacity-25">Submit</button>
                </div>
            </form>
        </div>

        <div class="col-8 pl-5 pt-4">
            <div class="card-title text-center fw-bold fs-3">Preview Images on upload</div>
            <div class="row" id="preview">

            </div>

        </div>
    </div>


    </div>





</main>

<script>
    function previewImages() {

        var $preview = $('#preview').empty();
        if (this.files) $.each(this.files, readAndPreview);

        function readAndPreview(i, file) {

            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } // else...

            var reader = new FileReader();

            $(reader).on("load", function() {

                $preview.append('<div class="card w-25 ml-2 mt-4 mr-2 border-0"><div class="card-body"><img src="' + this.result + '" class="w-100 mx-auto h-200"></div></div>')
            });

            reader.readAsDataURL(file);

        }

    }

    $('#imgname').on("change", previewImages);
</script>