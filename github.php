<?php
    echo exec('git reset --hard HEAD && git pull');
    echo exec('git clone https://github.com/leralins/Mr.REA.git && cp Mr.REA/build/*.html ui && cp -R Mr.REA/build/ui/* ui && rm -rf Mr.REA');
 