<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>

            <?php
                 /*$user = new User();
                $user->username = "sampleUser1234";
                $user->password = "samplePassword1234";
                $user->first_name = "sampleFirstName1234";
                $user->last_name = "sampleLastName1234";

                $user->create();*/
                /*$user = User::findUser(7);
                $user->username = " sampleName121";
                $user->password = " sampleName121";
                $user->first_name = " sampleName121";
                $user->last_name = " sampleName121";
                $user->update();*/

              /* $user = User::findUser(5);
               $user->delete();*/
                /*$user = User::findUser(6);
                $user->password = "samplePass";
                $user->first_name = "sampleFirstName";
                $user->last_name = "sampleLastName";
                $user->save();*/

              /* $user = new User();

               $user->username = "SampleName14";

               $user->save();*/
              /*
            $users=User::findAllByID();

            foreach ($users as $user) {
                echo $user->username . "<br>";
            }*/
            $photo = new Photo();
              $photo->title = "photoSample";
              $photo->description = "photoSample";
              $photo->filename = "photoSample.jpg";
              $photo->type = "image";
              $photo->size = 10;

              $photo->create();


            $photos=Photo::findAllByID();

            foreach ($photos as $photo) {
                echo $photo->title . "<br>";
            }


            ?>


            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>