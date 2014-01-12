<?php

echo "<div class='alert-box alert' >";
echo \service\MsgService::getInstance()->getMsg('404_pageNotFound');
echo "</div>";