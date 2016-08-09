<?php
/**
 * Created by PhpStorm.
 * User: ENCYTE-PC
 * Date: 8/9/2016
 * Time: 4:52 PM
 */

if (isset($data)) {
    if (!empty($data)) {
        $detail_db = $data[0];

        ?>
        <div id="header">
            <div class="page-full-width cf">
                <div id="login-intro" class="fl">
                    <h1>DataBase </h1>
                </div>
                <!-- login-intro -->

                <!-- Change this image to your own company's logo -->
                <!-- The logo will automatically be resized to 39px height. -->
                <!--        <a href="#" id="company-branding" class="fr"><img src="upload/posnic.png" alt="Point of Sale"/></a>-->

            </div>
            <!-- end full-width -->
        </div>
        <!-- end header -->
        <!-- MAIN CONTENT -->
        <div id="content">
            <form action="setup_page.php" method="POST" id="login-form" class="cmxform" autocomplete="off">
                <fieldset>
                    <!--            <p> --><?php
                    //
                    //                if (isset($_REQUEST['msg'])) {
                    //
                    //                    $msg = $_REQUEST['msg'];
                    //                    echo "<p style=color:red>$msg</p>";
                    //                }
                    //                ?>
                    <!---->
                    <!--            </p>-->

                    <p>
                        <?php
                        if ($detail_db['permission'] == 1) {
                            ?>
                            <input type="radio" value="1" name="select[]" id="create"
                                   onclick="create_data()">Create New DataBase
                            <input type="text" id="name" class="round full-width-input" name="name" autofocus/>
                            <?php
                        } else {
                            ?>

                            <input type="radio" disabled="disabled">Create New DataBase
                            <input type="text" disabled="disabled" class="round full-width-input"
                                   placeholder="No Permission To Create New Database" name="name" autofocus/>
                            <?php
                        }
                        ?>


                    </p>

                    <p>
                        <input type="radio" name="select[]" id="select" onclick="select_data()">Select Created
                        DataBase<br>
                        <select name="select_box" class="round full-width-input" id="select_box"
                                style="padding: 5px 10px 5px 10px; border: 1px solid #D9DBDD;">
                            <?php
                            for ($i = 0; $i < count($detail_db['db_list']); $i++) {
                                echo "<option value=" . $detail_db['db_list'][$i] . " style=margin:10px 10px 10px 10px;><p >" . $detail_db['db_list'][$i] . "</p></option>";
                            }
                            ?>
                        </select>

                    </p>
                    <input type="hidden" name="host" value="<?php echo $detail_db['host']; ?>">

                    <input type="hidden" name="username" value="<?php echo $detail_db['user']; ?>">
                    <input type="hidden" name="password" value="<?php echo $detail_db['password']; ?>">

                    <br>
<!--                    <input type="checkbox" name="dummy" value="1">Add Demo Data-->
<!--                    <br>-->
                    <br>


                    <!--<a href="dashboard.php" class="button round blue image-right ic-right-arrow">LOG IN</a>-->
                    <input type="submit" class="button round blue image-right ic-right-arrow" name="submit"
                           value="INSTALL"/>
                </fieldset>

            </form>

        </div>
        <?php
    }
}
?>
