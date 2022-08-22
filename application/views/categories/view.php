<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Categories</h1>

    </div>
    <div class="container-fluid m-auto p-5">
        <?= $this->session->flashdata('error'); ?>
        <?= $this->session->flashdata('success'); ?>
        <span id="suc"></span>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        </table>
    </div>

    </div>
</main>
<div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= site_url('upCat') ?>" method="post">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <label for="catname" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="catname" name="name" required>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Category?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="text-danger"> Are you sure you want to delete it ?? </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="delBtn" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        function loadAll() {
            $.ajax({
                url: "<?= site_url('dats') ?>",
                type: 'post',
                data: {
                    name: 'categories'
                },
                success: function(res) {

                    // console.log(res);
                    let dat = $.parseJSON(res)

                    for (let i = 0; i < dat.length; i++) {
                        // console.log(dat[i]['id'])
                        $('tbody').append('<tr><th scope="row">' + dat[i]['id'] + '</th><td>' + dat[i]['name'] + '</td><td><a href="javascript:void(0)" data-toogle="tooltip" data-id="' + dat[i]['id'] + '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCat">Edit</a>   <a href="javascript:void(0)" data-toogle="tooltip" data-id="' + dat[i]['id'] + '" data-original-title="Delete" class="delete btn btn-danger btn-sm delCat">Delete</a><td></tr>')
                    }


                }
            });
        }

        loadAll();

        $('body').on('click', '.editCat', function() {

            // Get the id data attribute
            var id = $(this).data("id");
            $.ajax({
                url: "<?= site_url('editcat') ?>",
                type: "POST",
                data: {
                    id: id
                },
                success: function(res) {
                    // loadAll()
                    let dat = $.parseJSON(res)
                    console.log(dat[0])
                    $('#updateModal').modal('toggle')
                    $('#id').val(dat[0]['id']);
                    $('#catname').val(dat[0]['name'])
                }
            })
        });

        $('body').on('click', '.delCat', function() {
            var id = $(this).data("id");
            $('#delmodal').modal('toggle');
            $('#delBtn').click(function() {

                $.ajax({
                    url: "<?= site_url('delcat') ?>",
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(res) {
                        // loadAll()
                        $('#suc').html(res)
                        $('#delmodal').modal('toggle');

                        $("table tbody tr").remove();
                        loadAll()
                    }
                })


            })


        })
    });
</script>