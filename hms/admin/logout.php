<?php
if(session_id() == '') {
    session_start();
}
$_SESSION['login']=="";
session_unset();
session_destroy();
?>
<script language="javascript">
document.location="index";
</script>
