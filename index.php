<?php
include_once 'Crud.php';
if (isset($_POST['post'])) {
    $t = new Amasty\Crud();
    try {
        $t->createModule(['companyName'=>$_POST['companyName'],'moduleName'=>$_POST['moduleName']]);
    } catch (\Exception $e)
    {
        echo $e->getMessage();
    }
    die();
}
?>
<form method="post" action="index.php">
    <div>
        <input type="text" name="companyName"><label>Insert Company Name(lowercase)</label>
    </div>
    <div>
        <input type="text" name="moduleName"><label>Insert Module Name(lowercase)</label>
    </div>
    <input type="submit" value="Generate" name="post">
</form>
