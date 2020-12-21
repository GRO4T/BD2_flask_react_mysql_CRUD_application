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

def test_insert_dzial():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM zespol WHERE id = 1"
        cursor.execute(sql)
        manager_of_other_unit = cursor.fetchone()[0]
        sql = "INSERT INTO dzial (nazwa, zarzad_id, kierownik_id) VALUES('dzial_test_bad', 1, {})".format(manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        normal_employee = DATA_SIZE # pracownik z ostatnim id powiniem należeć tylko do zespołu
        sql = "INSERT INTO dzial (nazwa, zarzad_id, kierownik_id) VALUES('dzial_test_good', 1, {})".format(normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_update_dzial():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM zespol WHERE id = 1"
        cursor.execute(sql)
        manager_of_other_unit = cursor.fetchone()[0]
        sql = "UPDATE dzial SET kierownik_id = {} WHERE id = 4".format(manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        normal_employee = DATA_SIZE # pracownik z ostatnim id powiniem należeć tylko do zespołu
        sql = "UPDATE dzial SET kierownik_id = {} WHERE id = 4".format(normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_insert_grupa():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM zespol WHERE id = 1"
        cursor.execute(sql)
        manager_of_other_unit = cursor.fetchone()[0]
        sql = "INSERT INTO grupa (nazwa, dzial_id, kierownik_id) VALUES('dzial_test_bad', 4, {})".format(manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        normal_employee = DATA_SIZE # pracownik z ostatnim id powiniem należeć tylko do zespołu
        sql = "INSERT INTO grupa (nazwa, dzial_id, kierownik_id) VALUES('dzial_test_good', 4, {})".format(normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_update_grupa():
    with TEST_CONN.cursor() as cursor:
        sql = "SELECT kierownik_id FROM zespol WHERE id = 1"
        cursor.execute(sql)
        manager_of_other_unit = cursor.fetchone()[0]
        sql = "UPDATE grupa SET kierownik_id = {} WHERE id = 1".format(manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        normal_employee = DATA_SIZE # pracownik z ostatnim id powiniem należeć tylko do zespołu
        sql = "UPDATE grupa SET kierownik_id = {} WHERE id = 1".format(normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()


