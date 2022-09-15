#!/bin/bash
/usr/bin/mysqld_safe --skip-grant-tables &
sleep 5
mysql -u root -e "CREATE DATABASE feegow"
mysql -u root mydb < /var/mysql/dump.sql