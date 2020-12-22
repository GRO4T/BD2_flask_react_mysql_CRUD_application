import pymysql
from app.connection import TEST_CONN

DATA_SIZE = 1000

def sql_and_assert(cursor, sql, val):
    passed = True
    try:
        cursor.execute(sql)
    except Exception as e:
        print(e)
        passed = False
    assert passed == val


def test_insert_zarzad():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM dzial"
        cursor.execute(sql)
        department_manager = cursor.fetchone()[0]
        sql = "INSERT INTO zarzad (nazwa_stanowiska, pracownik_id) VALUES('zarzad_test_bad', {})".format(department_manager)
        sql_and_assert(cursor, sql, False)
        sql = "INSERT INTO konto_uzytkownika VALUES(99999, 'user', 'haslo')"
        cursor.execute(sql)
        sql = "INSERT INTO pracownik VALUES (99999, 'Jan', 'Kowalski', NULL, '99052312345', 'test@gmail.com', '123456789', 99999)"
        cursor.execute(sql)
        sql = "INSERT INTO zarzad (nazwa_stanowiska, pracownik_id) VALUES('zarzad_test_bad', 99999)"
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_update_zarzad():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM dzial"
        cursor.execute(sql)
        department_manager = cursor.fetchone()[0]
        sql = "UPDATE zarzad SET pracownik_id = {} LIMIT 1".format(department_manager)
        sql_and_assert(cursor, sql, False)
        TEST_CONN.rollback()

def test_insert_dzial():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM zespol LIMIT 1"
        cursor.execute(sql)
        manager_of_other_unit = cursor.fetchone()[0]
        sql = "SELECT id FROM zarzad LIMIT 1"
        cursor.execute(sql)
        board_id = cursor.fetchone()[0]
        sql = "INSERT INTO dzial (nazwa, zarzad_id, kierownik_id) VALUES('dzial_test_bad', {}, {})".format(board_id, manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        sql = "SELECT id FROM pracownik ORDER BY ID DESC LIMIT 1"   # może działać niepoprawnie jeśli generator nie będzie
                                                                    # przydzielał pracowników w kolejności
        cursor.execute(sql)
        normal_employee = cursor.fetchone()[0]
        sql = "INSERT INTO dzial (nazwa, zarzad_id, kierownik_id) VALUES('dzial_test_good', {}, {})".format(board_id, normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_update_dzial():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM zespol LIMIT 1"
        cursor.execute(sql)
        manager_of_other_unit = cursor.fetchone()[0]
        sql = "UPDATE dzial SET kierownik_id = {} LIMIT 1".format(manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        sql = "SELECT id FROM pracownik ORDER BY ID DESC LIMIT 1"   # może działać niepoprawnie jeśli generator nie będzie
                                                                    # przydzielał pracowników w kolejności
        cursor.execute(sql)
        normal_employee = cursor.fetchone()[0]
        sql = "UPDATE dzial SET kierownik_id = {} LIMIT 1".format(normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_insert_grupa():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM zespol LIMIT 1"
        cursor.execute(sql)
        manager_of_other_unit = cursor.fetchone()[0]
        sql = "SELECT id FROM dzial LIMIT 1"
        cursor.execute(sql)
        dep_id = cursor.fetchone()[0]
        sql = "INSERT INTO grupa (nazwa, dzial_id, kierownik_id) VALUES('dzial_test_bad', {}, {})".format(dep_id, manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        sql = "SELECT id FROM pracownik ORDER BY ID DESC LIMIT 1"   # może działać niepoprawnie jeśli generator nie będzie
                                                                    # przydzielał pracowników w kolejności
        cursor.execute(sql)
        normal_employee = cursor.fetchone()[0]
        sql = "INSERT INTO grupa (nazwa, dzial_id, kierownik_id) VALUES('dzial_test_good', {}, {})".format(dep_id, normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_update_grupa():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM zespol LIMIT 1"
        cursor.execute(sql)
        manager_of_other_unit = cursor.fetchone()[0]
        sql = "UPDATE grupa SET kierownik_id = {} LIMIT 1".format(manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        sql = "SELECT id FROM pracownik ORDER BY ID DESC LIMIT 1"   # może działać niepoprawnie jeśli generator nie będzie
                                                                    # przydzielał pracowników w kolejności
        cursor.execute(sql)
        normal_employee = cursor.fetchone()[0]
        sql = "UPDATE grupa SET kierownik_id = {} LIMIT 1".format(normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_insert_zespol():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM grupa LIMIT 1"
        cursor.execute(sql)
        manager_of_other_unit = cursor.fetchone()[0]
        sql = "SELECT id FROM grupa LIMIT 1"
        cursor.execute(sql)
        group_id = cursor.fetchone()[0]
        sql = "INSERT INTO zespol (nazwa, grupa_id, kierownik_id) VALUES('dzial_test_bad', {}, {})".format(group_id, manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        sql = "SELECT id FROM pracownik ORDER BY ID DESC LIMIT 1"   # może działać niepoprawnie jeśli generator nie będzie
                                                                    # przydzielał pracowników w kolejności
        cursor.execute(sql)
        normal_employee = cursor.fetchone()[0]
        sql = "INSERT INTO zespol (nazwa, grupa_id, kierownik_id) VALUES('dzial_test_bad', {}, {})".format(group_id, normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_update_zespol():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM grupa LIMIT 1"
        cursor.execute(sql)
        manager_of_other_unit = cursor.fetchone()[0]
        sql = "UPDATE zespol SET kierownik_id = {} LIMIT 1".format(manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        sql = "SELECT id FROM pracownik ORDER BY ID DESC LIMIT 1"   # może działać niepoprawnie jeśli generator nie będzie
                                                                    # przydzielał pracowników w kolejności
        cursor.execute(sql)
        normal_employee = cursor.fetchone()[0]
        sql = "UPDATE zespol SET kierownik_id = {} LIMIT 1".format(normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()
