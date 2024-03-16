<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page_title ?? "Codeigniter 4"; ?></title>

    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- My Css -->
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

    <?= $this->include("layouts/_navbar"); ?>

    <main>
        <div class="mt-4 mb-2">
            <?= $this->renderSection('content'); ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->
    <script>
        const autoCloseElements = document.querySelectorAll(".auto-close");

        function fadeAndSlide(element) {
            const fadeDuration = 500;
            const slideDuration = 500;

            let opacity = 1;
            const fadeInterval = setInterval(function() {
                if (opacity > 0) {
                    opacity -= 0.1;
                    element.style.opacity = opacity;
                } else {
                    clearInterval(fadeInterval);
                    // Step 2: Slide up the element
                    let height = element.offsetHeight;
                    const slideInterval = setInterval(function() {
                        if (height > 0) {
                            height -= 10;
                            element.style.height = height + "px";
                        } else {
                            clearInterval(slideInterval);
                            // Step 3: Remove the element from the DOM
                            element.parentNode.removeChild(element);
                        }
                    }, slideDuration / 10);
                }
            }, fadeDuration / 10);
        }

        setTimeout(function() {
            autoCloseElements.forEach(function(element) {
                fadeAndSlide(element);
            });
        }, 3000);
    </script>
</body>

</html>