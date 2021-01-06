CREATE USER 'util1'@'%' IDENTIFIED BY '0000';

CREATE USER 'util2'@'%' IDENTIFIED BY '0000';

CREATE USER 'util3'@'%' IDENTIFIED BY '0000';

GRANT ALL PRIVILEGES ON papyrus.* TO 'util1'@'%';

GRANT SELECT ON papyrus.* TO 'util2'@'%';

GRANT SELECT ON papyrus.fournis TO 'util3'@'%';

select user,host from mysql.user;

show grants for "util1"@"%";

show grants for "util2"@"%";

show grants for "util3"@"%";