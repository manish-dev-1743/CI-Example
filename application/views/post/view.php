
<style>
    
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Posts</h1>

    </div>
    <div class="container-fluid m-auto p-5">
        <?= $this->session->flashdata('error'); ?>
        <?= $this->session->flashdata('success'); ?>
        <span id="suc"></span>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Images</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
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
                url: "<?= site_url('pots') ?>",
                type: 'post',
                data: {
                    name: 'posts'
                },
                success: function(res) {

                    // console.log(res);
                    let dat = $.parseJSON(res)
                    console.log(dat);

                    for (let i = 0; i < dat.length; i++) {
                        // console.log(dat[i]['id'])
                        $('tbody').append('<tr><th scope="row">' + dat[i]['id'] + '</th><td>'+imgtab(dat[i]['post_imgs'])+'</td><td>'+ dat[i]['title'] + '</td><td>' + dat[i]['description'] + '</td><td><a href="javascript:void(0)" data-toogle="tooltip" data-id="' + dat[i]['id'] + '" data-original-title="Edit" class="edit btn btn-primary btn-sm editCat">Edit</a>   <a href="javascript:void(0)" data-toogle="tooltip" data-id="' + dat[i]['id'] + '" data-original-title="Delete" class="delete btn btn-danger btn-sm delCat">Delete</a><td></tr>')
                
                    
                    }


                }
            });
        }

        function imgtab(img){
            let dat = '<div id="carouselExampleControls" class="carousel slide fl-3" data-bs-ride="carousel" style="max-width:150px;max-height:100px; min-width:150px;min-height:100px; left:65px;">';
            dat+='<div class="carousel-inner">';
            let images = $.parseJSON(img);
            var fist_img=images['0']["imgname"];
            console.log(images);
            
            dat+='<div class="carousel-item active">';
            dat+=' <img src="assets/img/posts/'+fist_img+'" class="d-block mx-auto w-100" alt="...">';
            dat+='</div>';
            for(let i=1; i<images.length; i++){
                dat+='<div class="carousel-item">';
                dat+=' <img src="assets/img/posts/'+images[i]["imgname"]+'" class="d-block mx-auto w-100" alt="...">';
                dat+='</div>';
            }
            dat+=' <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>';
            dat+='<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button></div>';
            return dat;
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