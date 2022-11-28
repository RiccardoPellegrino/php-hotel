<?php

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

if (isset($_GET['parking']) && !empty($_GET['parking'])) {


    $temp = [];


    foreach ($hotels as $item) {
        $park = $item['parking'] ? 'si' : 'no';

        if ($park == $_GET['parking']) {

            $temp[] = $item;
        }
    }
    $hotels = $temp;
}

if (isset($_GET['vote']) && !empty($_GET['vote'])) {
    $vote = $_GET['vote'];
    $hotels = array_filter($hotels, fn($value) => $value['vote'] >= $vote);
}
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <title>PHP hotel</title>
</head>

<body class="bg-dark ">
    <div class="container">
        <h1 class="text-warning text-center">Lista Hotel</h1>
        <form action="index.php" method="GET" name="filtro">
            <div class="mb-3 mt-3 d-flex justify-content-center">
                <label for="type">
                    <select name="parking">
                        <option value="" selected>Tutti</option>
                        <option value="si">Parcheggio</option>
                        <option value="no">No parcheggio</option>
                    </select>
                    <select name="vote" id="vote">
                        <option value="" selected>scegli </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <div class="d-flex justify-content-center"> <button type="submit"
                            class="btn btn-secondary mt-3">invia</button></div>

                </label>
            </div>
        </form>
        <table class='table text-white'>
            <thead>
                <tr class="text-danger">
                    <th scope='col'>Name</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Parking</th>
                    <th scope='col'>Vote</th>
                    <th scope='col'>Distance_to_center</th>
                </tr>
            </thead>
            <?php foreach ($hotels as $item) {
                $park = $item['parking'] ? 'si' : 'no';
                ;
                echo
                    "<tbody>
                <tr>
                    <td>'$item[name]'</td>
                    <td>'$item[description]'</td>
                    <td>'$park'</td>
                    <td>'$item[vote]'</td>
                    <td>'$item[distance_to_center]'</td>
                </tr>
            </tbody>";

            } ?>
        </table>
    </div>
</body>

</html>