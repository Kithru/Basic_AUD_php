<?php
//fetch.php
$connect = new PDO("mysql:host=localhost;dbname=exam", "root", "");
$column = array("nic", "name", "age", "address", "mobile", "program");
$query = "SELECT * FROM student";
if(isset($_POST["search"]["value"]))
{
    $query .= '
    WHERE nic LIKE "%'.$_POST["search"]["value"].'%"
    OR name LIKE "%'.$_POST["search"]["value"].'%"
    OR age LIKE "%'.$_POST["search"]["value"].'%"
    OR address LIKE "%'.$_POST["search"]["value"].'%"
    OR mobile LIKE "%'.$_POST["search"]["value"].'%"
    OR program LIKE "%'.$_POST["search"]["value"].'%"';
}
if(isset($_POST['order']))
{  $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';}
else
{   $query .= 'ORDER BY nic ASC '; }
$query1 = '';
if($_POST['length'] != -1)
{$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];}
$statement = $connect->prepare($query);
$statement->execute();
$number_filter_row = $statement->rowCount();
$result = $connect->query($query . $query1);
$data = array();
foreach($result as $row)
{
    $sub_array = array();
    $sub_array[] = $row['nic'];
    $sub_array[] = $row['name'];
    $sub_array[] = $row['age'];
    $sub_array[] = $row['address'];
    $sub_array[] = $row['mobile'];
    $sub_array[] = $row['program'];
    $data[] = $sub_array;
}
function count_all_data($connect)
{
    $query = "SELECT * FROM student";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}
$output = array(
    "draw"      =>  intval($_POST["draw"]),
    "recordsTotal"  =>  count_all_data($connect),
    "recordsFiltered"   =>  $number_filter_row,
    "data"      =>  $data
);
echo json_encode($output);
?>