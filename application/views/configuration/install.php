<?php
/**
 * Created by PhpStorm.
 * User: ENCYTE-PC
 * Date: 8/9/2016
 * Time: 2:41 PM
 */
?>
<div id="header">
    <div class="page-full-width cf">

        <div id="login-intro" class="fl">

            <h1>Installation </h1>
        </div>
        <!-- login-intro -->

        <!-- Change this image to your own company's logo -->
        <!-- The logo will automatically be resized to 39px height. -->
        <!--        <a href="#" id="company-branding" class="fr"><img src="--><?php //if (isset($_SESSION['logo'])) {
        //                echo "upload/" . $_SESSION['logo'];
        //            } else {
        //                echo "upload/posnic.png";
        //            } ?><!--" alt=""/></a>-->

    </div>
    <!-- end full-width -->
</div>
<!-- end header -->
<!-- MAIN CONTENT -->
<div id="content">

    <form action="<?php echo base_url() . 'Install/database_install' ?>" method="POST" id="login-form" class="cmxform"
          autocomplete="off">

        <fieldset>
            <p style=color:red>  <?php echo $this->session->flashdata('msg'); ?></p>

            <p>
                <label for="login-host">DataBase Host Name</label>
                <input type="text" id="host" class="round full-width-input" placeholder="ENTER DATABASE HOST NAME"
                       name="host" autofocus/>
            </p>

            <p>
                <label for="login-user">DataBase User Name</label>
                <input type="text" id="username" name="username" placeholder="ENTER DATABASE USERNAME"
                       class="round full-width-input"/>
            </p>

            <p>
                <label for="login-password">DataBase User Password</label>
                <input type="password" id="password" name="password" placeholder="ENTER DATABASE PASSWORD"
                       class="round full-width-input"/>
            </p>


            <!--<a href="dashboard.php" class="button round blue image-right ic-right-arrow">LOG IN</a>-->
            <input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="INSTALL"/>
        </fieldset>

    </form>

</div>
