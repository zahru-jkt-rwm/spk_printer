<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
function dashboard_logged_in()
{
    $CI =& get_instance();
    $is_logged_in = $CI->session->userdata('keterangan');
    if(!isset($is_logged_in))
    {
        redirect('autentikasi');
    }    
}
function user_logged_in()
{
    $CI =& get_instance();
    $is_logged_in = $CI->session->userdata('keterangan');
    if(!isset($is_logged_in)||$is_logged_in != "Admin")
    {
        redirect('autentikasi');
    }   
}
function solusipakar_logged_in()
{
    $CI =& get_instance();
    $is_logged_in = $CI->session->userdata('keterangan');
    if(!isset($is_logged_in))
    {
        redirect('autentikasi');
    }   
}
function datapakar_logged_in()
{
    $CI =& get_instance();
    $is_logged_in = $CI->session->userdata('keterangan');
    if(!isset($is_logged_in)||$is_logged_in == "Pelanggan"||$is_logged_in == "Tehnik")
    {
        redirect('autentikasi');
    } 
}
function sudah_login()
{
    $CI =& get_instance();
    if ($CI->session->has_userdata('id')) {
        redirect('dashboard');
    }
}
?>