<!DOCTYPE html>
<html>
<body>

<!--
2) Crie um formulario contendo os campos baseados na classe acima e dois botões com valores 
(XML e JSON). Ao clicar em XML, mostre o formato XML e em JSON o formato JSON.
OBS: Você deve usar a classe acima já criada.
-->

<form method="POST" action="/simulado-ex01.php">
    Nome:<input type="text" name="nome"/><br>
    Valor:<input type="text" name="valor"/><br>
    <input type="submit" value="toJSON" name="metodo"/>
    <input type="submit" value="toXML" name="metodo"/>
</form>
