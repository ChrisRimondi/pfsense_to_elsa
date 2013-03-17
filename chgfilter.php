<?php
$filter=file_get_contents ('/etc/inc/filter.inc');
$filternew =
    str_replace(
        "-ttt -i pflog0 | logger -t pf -p local0.info",
        "-ttt -i pflog0 | /usr/bin/sed -e 'N;s/\\\\n //;P;D;' | logger -t pf -p local0.info",$filter);
if (strcmp($filter, $filternew) !=0) {
    file_put_contents('filter.inc.new',$filternew);
    file_put_contents('filter.inc.org',$filter);
}
?>