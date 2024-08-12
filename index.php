<?php
    # definir la API
    const API_URL = "https://whenisthenextmcufilm.com/api";

    # Iniciar una nueva sesión de cURL; ch = cURL handle
    $ch = curl_init(API_URL);

    // Indicar que queremos recibir el resultado de la petición y no mostrar en pantalla 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Desactivar la verificación del certificado SSL (no recomendado para producción)
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    /* Ejecutar la petición 
    y guardar el resultado 
    */
    $result = curl_exec($ch);
    $data = json_decode($result, true);

    # cerrar la conexión
    curl_close($ch);


?>


<head>
    <title>
        La proxima pelicula de Marvel
    </title>

    <meta name="description" content="La proxima pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Centered viewport -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>


<main>
    <pre style="font-size: 12px; overflow: scroll; height: 150px;">
        <?php var_dump($data); ?>
    </pre>

    <section>
        <img 
            src="<?= $data["poster_url"]; ?>"
            widht="100" 
            alt="Poster de <?= $data["title"]; ?>"
            style="border-radius: 16px"
        />
    </section>

    <hgroup>
        <h3>
            <?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias
        </h3>
        <p>
            Fecha de estreno: <?= $data["release_date"]; ?>
        </p>
        <p>
            La siguiente pelicula es: <?= $data["following_production"]["title"]; ?>
        </p>

    </hgroup>

</main>

<style>
    :root{ 
        color-scheme: light dark;
    }

    body{
        display: grid;
        place-content: center;
    }

    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }

</style>