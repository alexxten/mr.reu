<?php
    exec('git reset --hard HEAD && git pull');
    exec('git clone https://github.com/leralins/Mr.REA && mv Mr.REA/build mr.reu/ui && git rm -r Mr.REA');
 