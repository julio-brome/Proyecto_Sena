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
<script type="text/javascript" src="<?= URL?>/public/select2/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script type="text/javascript" src="<?= URL ?>/public/js/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?= URL ?>/js/main.js"></script>
</body>

</html>
