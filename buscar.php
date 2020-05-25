<?php 
require_once("controller/Conexao.php");

/*
$cidade = $_POST['palavra'];
$uf = $_POST['uf'];

$sql = "SELECT * FROM cidade where uf = '$uf' and descricao like '%$cidade%' ";

$query = $db->prepare($sql);
//$query->bindParam(':id', $id);
$query->execute();
while($row = $query->fetch(PDO::FETCH_ASSOC)){

echo '<option value="'.$row['id'].'">'.$row['descricao'].'</option>';
}

*/
print_r(filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING));
$cidade = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);
/*
$cidade = $_POST['palavra'];
$uf = $_POST['uf'];
*/

$sql = "SELECT * FROM cidade where  descricao like '%$cidade%' limit 10";

$query = $db->prepare($sql);

$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	
	$data[] = utf8_encode($row['descricao']);

}
 
 echo json_encode($data);
 //var_dump(json_encode($data));

?>
