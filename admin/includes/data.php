<?php
//getting table columns
function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}
//getting table name and columns
function qSELECT($query, $object = NULL){
	global $link;
	$result = mysqli_query($link, $query);
	$return = [];
	if($result){
		$num = mysqli_num_rows($result);
		for ($i=0; $i<$num; $i++){
			if(!is_null($object)){
				$row = mysqli_fetch_object($result);
			}else{
				$row = mysqli_fetch_array($result);
			}
			$return[$i]=$row;
		}
	return $return;
	}
	else {
	$errorMessage = 'Невозможно осуществить запрос';
    throw new Exception($errorMessage);
   }
}
//counting number of table rows
function counting($table, $what){
	global $link;
	$query = "SELECT COUNT(1) FROM ".$table;
	$result = mysqli_query($link, $query);
	$num = mysqli_result($result, 0, 0);
	return $num;
}
//sorting by id - displaying rows dividing to pages
function getById($table, $id){
	$query = "SELECT * FROM ".$table." WHERE id=".$id." ";
	$errorMessage = 'Невозможно получить данные таблицы';
	if (!$query)
    throw new Exception($errorMessage);
    else {
	$result = qSELECT($query);
	if($result) return $result[0];
	else return $result;
}
}

//retrieving data from data
function getAll($table){
	$query = "SELECT * FROM ".$table;
	$errorMessage = 'Невозможно получить данные таблицы';
	if (!$query)
    throw new Exception($errorMessage);
    else {
	$result = qSELECT($query);
	return $result;
 }	
}
//searching value from table
function queryToSelect($table, $where, $operator, $zerovalue, $key, $value, $id){
	$ul = '<option value="'.$zerovalue.'">Please select</option>';
	//query to search
	$query = "SELECT * FROM ".$table." WHERE `".$where."` ".$operator." ".$zerovalue." ";
	$errorMessage = 'Данные отсутствуют';
	if (!$query)
    throw new Exception($errorMessage);
    else {
	$result = qSELECT($query);
	//displaying query result as table
	foreach ($result as $row){
		$ul .= '<option value="'.$row[$key].'" ';
		$ul .= $id == $row[$key] ? "selected" : "" ;
		$ul .= '>'.$row[$value].'</option>';
	}
	return $ul;
    }   
}
?>