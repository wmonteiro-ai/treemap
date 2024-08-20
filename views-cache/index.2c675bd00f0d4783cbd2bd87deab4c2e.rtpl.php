<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Treemap</title>
    <link rel="stylesheet" href="../resource/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../resource/js/script.js" defer></script>
</head>

<body>
    <section>
        <div class="container">
            <h1 class="text-center">The Treemap</h1>
            <div class="d-flex justify-content-center">
                <div class="row board shadow">
                    <?php $counter1=-1;  if( isset($frames) && ( is_array($frames) || $frames instanceof Traversable ) && sizeof($frames) ) foreach( $frames as $key1 => $value1 ){ $counter1++; ?>
                        <div class="frame d-flex flex-column" data-largura="<?php echo htmlspecialchars( $value1["largura"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-variacao="<?php echo htmlspecialchars( $value1["variacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <div><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></div>
                            <div><?php echo htmlspecialchars( $value1["largura"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%</div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>