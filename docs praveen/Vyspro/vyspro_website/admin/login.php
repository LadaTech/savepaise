<?PHP
//session_start();
include_once '../common/adminheader.php';
?>

<div id="fh5co-course-categories">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Login</a></li>
                    </ol>
                </nav>     

            </div>  
        </div>

            <div class="row">           
                <div class="animate-box col-md-8 offset-md-2 ">
                    <form class="form-horizontal" action="/admin/loginaction.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">User Name</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter email">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                    </form>		
                </div>
            </div>
        </div>
    </div>
    <?PHP
    include_once '../common/adminfooter.php';
    ?>

