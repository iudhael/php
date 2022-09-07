<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false); //regle le probleme de ce document a expirer


	session_start();
  require_once('../modele/testmo.php');
   
    if(isset($_POST['records-limit']))
    {
        $_SESSION['records-limit'] = $_POST['records-limit'];
    }

    $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 2;

    $page = (isset($_GET['page']) && is_numeric($_GET['page']))  ? $_GET['page'] : 1;
    if (isset($_POST['choix_page']))
    {
      $page = $_POST['page'];

    }
    if (isset($_POST['next']))
    {
      $page = $_POST['next_hidden'];

    }
    if (isset($_POST['prev']))
    {
      $page = $_POST['prev_hidden'];

    }
   

    $paginationStart = ($page - 1) * $limit;

    $requete = pagination($limit,$paginationStart);

    $sql = count_ville();

    $allRecrods = $sql[0]['id'];
    

    // Calculate total pages
  $totoalPages = ceil($allRecrods / $limit);


  // Prev + Next
  $prev = $page - 1;
  $next = $page + 1;









    require_once('../vue/te.php');
?>