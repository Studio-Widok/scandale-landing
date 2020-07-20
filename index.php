<?php
  $facebook  = 'https://www.facebook.com/ScandaleRoyal';
  $instagram = 'https://www.instagram.com/scandaleroyal';
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scandale Royal</title>
  <script src="https://cdn.jsdelivr.net/npm/cash-dom@6.0.2/dist/cash.min.js">
  </script>
  <link rel="stylesheet" href="css/base.css">

  <!-- Google Tag Manager -->

  <script>
  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start':

        new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],

      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =

      'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);

  })(window, document, 'script', 'dataLayer', 'GTM-KQ2PFLT');
  </script>

  <!-- End Google Tag Manager -->

</head>

<body>

  <?php include __DIR__ . '/top.php';?>

  <div id="gallery" class="content flex">
    <div class="col2">
      <div class="gallery-item vertical fade">
        <img src="./media/4.jpg">
      </div>
      <div class="gallery-item fade">
        <img src="./media/7.jpg">
      </div>
      <div class="gallery-item vertical fade">
        <img src="./media/1.jpg">
      </div>
    </div>
    <div class="col2">
      <div class="gallery-item fade">
        <img src="./media/6.jpg">
      </div>
      <div class="gallery-item vertical fade">
        <img src="./media/5.jpg">
      </div>
      <div class="gallery-item fade">
        <img src="./media/8.jpg">
      </div>
      <div id="gallery-contact"
        class="flex flex-align-center flex-justify-center flex-wrap gallery-item fade">
        <div>more here:</div>
        <a href="<?=$instagram?>" target="_blank">
          <?php include __DIR__ . '/media/inst.svg';?>
        </a>
        <a href="<?=$facebook?>" target="_blank">
          <?php include __DIR__ . '/media/fb.svg';?>
        </a>
      </div>
    </div>
  </div>

  <script src="js/main.js"></script>


  <!-- Google Tag Manager (noscript) -->

  <noscript><iframe
      src="https://www.googletagmanager.com/ns.html?id=GTM-KQ2PFLT" height="0"
      width="0" style="display:none;visibility:hidden"></iframe></noscript>

  <!-- End Google Tag Manager (noscript) -->

</body>

</html>
