<?php
$parent = realpath(dirname(__FILE__) . '/..');
include_once $parent . '/core/auth.php';
require_once  $parent . '/core/functionalities.php';
use core\functionalities;
require_once $parent . '/semi-orm/Categories.php';
use orm\Categories;
require_once $parent . '/semi-orm/Posts.php';
use orm\Posts;
$functionalitiesInstance = new functionalities();
$db = new database_connection();
$conn  = $db->open();
$Post = new Posts($conn);
$Category = new Categories($conn);
include ('values.php');
?>

<form  method="post" action="<?php echo $path?>" enctype="multipart/form-data">
<input type="hidden" name="masterid" value="<?= $MasterID ?>" />
<input type="hidden" name="id" value="<?= (($Id == null) ? "NULL" : $Id) ?>" />
<input type="hidden" name="type" value="<?= $Type ?>" />
<?php
switch ($Type)
{
    case "POST":
    include('POST.php');
    break;
}
/*
TODO: create drafting and publish mechanisms
      based on user role

    echo '<input type="submit" name="draft" value="پیش‌نویس" />';
    echo '<input type="submit" name="edit" value="ویرایش" />';
    echo '<input type="submit" name="publish" value="انتشار عمومی" />';
    echo '<input type="submit" name="burn" value="لغو انتشار" />';
*/
if ($Type != "")
{
    if ($Id == "" ) {
        echo '<input type="submit" name="insert" value="ارسال" />';
    } else {
        echo '<input type="submit" name="update" value="به روز رسانی" />';
        echo '<input type="submit" name="clear" value="حذف پیوست" />';
        echo '<input type="submit" name="delete" value="حذف" />';
    }
    echo '<a href="index.php">انصراف</a>';
}
?>
</form>