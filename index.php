<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Kondenzációs kazánok - Szerelvénybolt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="product-card.css">
</head>
<body>

<header>
    <div class="container">
        <a href="#" class="brand">
            Szerelvenybolt.hu
        </a>
    </div>
</header>

<main>

    <div class="bg-circles">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
        <div class="circle circle-3"></div>
        <div class="circle circle-4"></div>
    </div>

    <div class="container">
        <div class="item-list">
            <?php
            $products = json_decode(file_get_contents(__DIR__ . '/products.json'), true);
            foreach ($products as $product):
                $buttonText = $product['stock'] > 0 ? 'Kosárba' : 'Értesítést kérek';
                $outOfStock = $product['stock'] === 0 ? ' out-of-stock' : '';
                $formattedPrice = number_format($product['price'], 0, ',', ' ') . ' Ft';
            ?>
            <div class="product-card<?= $outOfStock ?>">
                <div class="image-wrapper">
                    <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                </div>
                <div class="body-wrapper">
                    <div class="title"><?= $product['name'] ?></div>
                    <div class="sku"><?= $product['sku'] ?></div>
                    <div class="tags">
                        <div class="tag">
                            A
                        </div>
                        <div class="tag">
                            fűtő
                        </div>
                        <div class="tag">
                            69,5kW
                        </div>
                        <div class="tag">
                            fehér
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="price-wrapper">
                        <div class="price"><?= $formattedPrice ?></div>
                    </div>
                    <a href="#" class="btn"><?= $buttonText ?></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</main>

<footer>
    <div class="container">
        <div class="copyright">
            © 2026 Szerelvénybolt teszt feladat. Minden jog fenntartva. Készítette Beviz Zoltán
        </div>
    </div>
</footer>

</body>
</html>