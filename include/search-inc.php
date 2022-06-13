<?php
session_start();
if(isset($_POST['submit']))
{
	// require_once("../perpage.php");	
	$search_term = $_POST['search-term'];
    include 'functions.php';
    // include '../classes/dbh-classes.php';
    // include '../classes/search-classes.php';
    // include '../classes/search-contr-classes.php';

    // $search = new SearchContr($search_term);

    // $search->search();

    $search_result = $table->getSearchResult($search_term);

    



    header("location: ../dashboard-partner-property.php?error=none");
}
?>
