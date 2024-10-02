<?php
    $pregunta = $_GET["pregunta"];
    $res_alea = ["Si", "no","quizás, claro que sí", "por supuesto que no", "no lo tengo claro", "seguro", "yo diría que sí", "ni de coña"];
    echo "La pregunta es $pregunta";
    echo "<br> la respuesta es = ", $res_alea[rand(0,count($res_alea) -1)];
?>