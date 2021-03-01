<?php include('headadmin.php'); ?>
<?php include('db_connect.php'); ?>
<div class="container">

    <div class="row" style="margin-bottom:5rem;">
    </div>

    <div class="row">
        <div class="col-4">
            <div class="card" >
                <div class="col-md-12">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="">Category Form</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Category">
                                <small id="emailHelp" class="form-text text-muted">Add a category.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-secodary">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card" >
                <div class="col-md-12">
                    <h4 class="card-title" style="padding-top:10px;"><b> Categories</b></h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table sorter">
                                <thead>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <!-- INSERT BIDDINGS HERE -->
                                    <tr>
                                        <td>Hellow</td>
                                        <td>Hi</td>
                                        <td>Meme</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php include('footadmin.php'); ?>