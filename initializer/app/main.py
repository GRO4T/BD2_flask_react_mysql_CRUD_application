#!/usr/bin/python3

import generators.generators as generators
import pymysql
import os
import time

def open_connection():
    username = os.environ["DB_USERNAME"]
    password = os.environ["DB_PASSWORD"]
    host = "db"
    database = os.environ["DB_DATABASE"]
    return pymysql.connect(host, username, password, database, client_flag=pymysql.constants.CLIENT.MULTI_STATEMENTS)

def try_connect():
    try:
        return open_connection()
    except Exception as e:
        print(e)
        return None

def connect():
    conn = try_connect()
    while conn is None:
        print("Retrying connection")
        conn = try_connect()
        time.sleep(1)
    return conn

def check_db_empty(conn):
    with conn.cursor() as cursor:
        cursor.execute("""
SELECT count(*)
FROM information_schema.TABLES
WHERE (TABLE_SCHEMA = '{}') AND (TABLE_NAME = '{}')
        """.format(os.environ["DB_DATABASE"], 'Pracownik'))
        return cursor.fetchone()[0] == 0

def run_init_scripts(conn):
    with conn.cursor() as cursor:
        files = list(map(lambda x: os.path.join('/app/sql', x), os.listdir('/app/sql')))
        files.sort()
        for file_name in files:
            with open(file_name, "r") as file:
                print("Executing file {}".format(file_name))
                sql = file.read()
                cursor.execute(sql)
    conn.commit()

def main():
    conn = connect()
    data = generators.generate_accounts_and_employees(10)

    if check_db_empty(conn):
        run_init_scripts(conn)
    print("Database initialized")





if __name__ == "__main__":
    main()
