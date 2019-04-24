<form action="<?= $actionForm; ?>" id="formulario" method="post">
    <input type="hidden" value="<?= $token; ?>" name="token_ws" />
</form>

<script>
    document.getElementById("formulario").submit();
</script>