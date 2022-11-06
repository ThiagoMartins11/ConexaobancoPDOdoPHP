<?php

include_once(__DIR__.'/../vendor/autoload.php');

echo "app... </br>";

use App\Model\Pessoa;
use App\Persistence\ConnectionFactory;
use APP\DTOS\SensorDTO;

$p = new Pessoa("huginhooo", "12234");

print ("</br> ".$p);

$connFactory = new ConnectionFactory();
$conn = $connFactory->getInstance();
var_dump($conn);


$SensorDTO11 = new SensorDTO(10, 100);
$SensorDTO22 = new SensorDTO(20, 200);

$sqlInsertSensorData = "insert into dadosbrutos (temperatura, umidade) values ";
$conn->exec($sqlInsertSensorData."(".$SensorDTO11->_temperatura.",".$SensorDTO11->_umidade.");");
$conn->exec($sqlInsertSensorData."(".$SensorDTO22->_temperatura.",".$SensorDTO22->_umidade.");");

$sqlSelectDadosBrutos = "select * from dadosbrutos";

$stmt = $conn->query($sqlSelectDadosBrutos);
$sensorDataArr = $stmt->fetchAll(\PDO::FETCH_ASSOC);

echo "<br></br>temperatura -- umidade <br></br>";

foreach ($sensorDataArr as $sensorData){
    echo "<br></br>".$sensorData['temperatura']." -- ".$sensorData['umidade'];
}
