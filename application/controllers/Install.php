<?php

/**
 * Created by PhpStorm.
 * User: ENCYTE-PC
 * Date: 8/9/2016
 * Time: 2:04 PM
 */
class Install extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $data['main_content'] = 'configuration/install';
        $this->load->view('template_install/template', $data);
    }

    public function database_install()
    {

        if ((isset($_POST['host']) and isset($_POST['username']) and $_POST['host'] != "" and $_POST['username'] != "") or (isset($_SESSION['host']) and isset($_SESSION['user']))) {
            if (isset($_POST['host'])) {
                $host = trim($_POST['host']);
                $user = trim($_POST['username']);
                $password = isset($_POST['password']) ? trim($_POST['password']) : "";
            }
            $link = mysqli_connect($host, $user, $password);
            if (!$link) {
                echo "Error: Unable to connect to MySQL.";
                $this->session->set_flashdata('msg', 'Database Configration is Not vaild');
                redirect('/Install/index');
            } else {
                mysqli_close($link);
                $ourFileName = "config.ini";
                $ourFileHandle = fopen($ourFileName, 'w') or die("Not able to write config file (check directory permissions). You can directly Create config.ini file as like config.ini.sample file. ");
                $ini_data = "[database]\nhost=" . $host . "\nuser=" . $user . "\npassword=" . $password . "";
                fwrite($ourFileHandle, $ini_data);
                fclose($ourFileHandle);
                $ci_setup_data = array();
                if (file_exists("config.ini")) {
                    $this->load->database();
                    $databases_list = array();
                    $query_list = $this->db->query('SHOW DATABASES');
                    if ($query_list->num_rows() > 0) {
                        foreach ($query_list->result() as $row) {
                            array_push($databases_list, $row->Database);
                        }
                    }
                    if ($this->db->query('CREATE DATABASE ci_setup_permission')) {
                        $this->db->query('DROP DATABASE ci_setup_permission');
                        array_push($ci_setup_data, array('permission' => 1, 'host' => $host, 'user' => $user, 'password' => $password, 'db_list' => $databases_list));
                        $data['data'] = $ci_setup_data;
                        $data['main_content'] = 'configuration/view_database_install';
                        $this->load->view('template_install/template', $data);
                    } else {
                        array_push($ci_setup_data, array('permission' => 0, 'host' => $host, 'user' => $user, 'password' => $password, 'db_list' => $databases_list));
                        $data['data'] = $ci_setup_data;
                        $data['main_content'] = 'configuration/view_database_install';
                        $this->load->view('template_install/template', $data);
                    }

                }
            }
        } else {
            $this->session->set_flashdata('msg', 'Database Configration is Not vaild');
            redirect('/Install/index');
        }
    }

    public function view_database_install()
    {
        $data['main_content'] = 'configuration/view_database_install';
        $this->load->view('template_install/template', $data);
    }
}