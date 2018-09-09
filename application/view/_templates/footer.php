<script>
    <?php if(isset($_SESSION["mensaje"]) && $_SESSION["mensaje"] != null): ?>
    alert('<?= $_SESSION["mensaje"] ?>');
    <?php unset($_SESSION["mensaje"]) ?>
    <?php endif; ?>
    var uri = "<?=URL?>";
</script>

<script type="text/javascript" src="<?= URL?>/public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= URL?>/public/js/main.js"></script>
<script type="text/javascript" src="<?= URL?>/public/js/metodos.js"></script>
<script type="text/javascript" src="<?= URL?>/public/js/alertas.js"></script>
<script type="text/javascript" src="<?= URL?>/public/js/load.js"></script>
<script type="text/javascript" src="<?= URL?>/public/js/Exportar.js"></script>
</body>

</html>
