-- tuto : se connecter a maria db avec la cmd de windows

-- cd PROGR TAB
-- cd MARIa TAB
-- cd bin 

-- C:\Program Files\MariaDB 10.5\bin>

  mysql --user=root --password=0000 

Création des utilisateurs :

CREATE USER 'util1'@'%' IDENTIFIED BY '0000';

CREATE USER 'util2'@'%' IDENTIFIED BY '0000';

CREATE USER 'util3'@'%' IDENTIFIED BY '0000';

Affections des droits utilisateurs :

tous les PRIVILEGES pour l utilisateur 1
GRANT ALL PRIVILEGES ON papyrus.* TO 'util1'@'%';

util2 ne peut que sélectionner les informations dans la base
GRANT SELECT ON papyrus.* TO 'util2'@'%';

util3 n'a aucun droit sur la base de données, sauf d'afficher la table fournis
GRANT SELECT ON papyrus.fournis TO 'util3'@'%';

verification de la création des utilisateurs et des droits avec root

select user,host from mysql.user;
+-------------+-----------+
| User        | Host      |
+-------------+-----------+
| util1       | %         |
| util2       | %         |
| util3       | %         |
| root        | 127.0.0.1 |
| root        | ::1       |
| mariadb.sys | localhost |
| root        | localhost |
| root        | pc-mikael |
+-------------+-----------+
8 rows in set (0.001 sec)

 show grants for "util1"@"%";
+------------------------------------------------------------------------------------------------------+
| Grants for util1@%                                                                                   |
+------------------------------------------------------------------------------------------------------+
| GRANT USAGE ON *.* TO `util1`@`%` IDENTIFIED BY PASSWORD '*97E7471D816A37E38510728AEA47440F9C6E2585' |
| GRANT ALL PRIVILEGES ON `papyrus`.* TO `util1`@`%`                                                   |
+------------------------------------------------------------------------------------------------------+
2 rows in set (0.000 sec)

show grants for "util2"@"%";
+------------------------------------------------------------------------------------------------------+
| Grants for util2@%                                                                                   |
+------------------------------------------------------------------------------------------------------+
| GRANT USAGE ON *.* TO `util2`@`%` IDENTIFIED BY PASSWORD '*97E7471D816A37E38510728AEA47440F9C6E2585' |
| GRANT SELECT ON `papyrus`.* TO `util2`@`%`                                                           |
+------------------------------------------------------------------------------------------------------+
2 rows in set (0.000 sec)

show grants for "util3"@"%";
+------------------------------------------------------------------------------------------------------+
| Grants for util3@%                                                                                   |
+------------------------------------------------------------------------------------------------------+
| GRANT USAGE ON *.* TO `util3`@`%` IDENTIFIED BY PASSWORD '*97E7471D816A37E38510728AEA47440F9C6E2585' |
| GRANT SELECT ON `papyrus`.`fournis` TO `util3`@`%`                                                   |
+------------------------------------------------------------------------------------------------------+
2 rows in set (0.000 sec)


cmd pour se connecter avec les utilisateurs :

mysql --user=util1 --password=0000 papyrus

mysql --user=util2 --password=0000 papyrus

mysql --user=util3 --password=0000 papyrus

