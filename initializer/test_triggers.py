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

def get_unit_id(cursor, unit_name, condition):
    sql = "SELECT id FROM {} {}".format(unit_name, condition)
    cursor.execute(sql)
    return cursor.fetchone()[0]

def get_unit_superior_id(cursor, unit_name, condition):
    sql = "SELECT kierownik_id FROM {} {}".format(unit_name, condition)
    cursor.execute(sql)
    return cursor.fetchone()[0]

def get_emp_id(cursor, condition):
    sql = "SELECT id FROM pracownik {}".format(condition)
    cursor.execute(sql)
    return cursor.fetchone()[0]

def get_emp_superior_id(cursor, emp_id):
    sql = "SELECT pracownik_id FROM pracownik WHERE id = {}".format(emp_id)
    cursor.execute(sql)
    return cursor.fetchone()[0]

def test_insert_zarzad():
    with TEST_CONN.cursor() as cursor:
        # próba dodania jako członka zarządu kierownika działu
        sql = "SELECT kierownik_id FROM dzial"
        cursor.execute(sql)
        department_manager = cursor.fetchone()[0]
        sql = "INSERT INTO zarzad (nazwa_stanowiska, pracownik_id) VALUES('zarzad_test_bad', {})".format(department_manager)
        sql_and_assert(cursor, sql, False)
        # dodanie nowego pracownika i mianowanie go członkiem zarządu
        sql = "INSERT INTO konto_uzytkownika VALUES(99999, 'user', 'haslo')"
        cursor.execute(sql)
        sql = "INSERT INTO pracownik VALUES (99999, 'Jan', 'Kowalski', NULL, '99052312345', 'test@gmail.com', '123456789', 99999)"
        cursor.execute(sql)
        sql = "INSERT INTO zarzad (nazwa_stanowiska, pracownik_id) VALUES('zarzad_test_bad', 99999)"
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_update_zarzad():
    with TEST_CONN.cursor() as cursor:
        # przypisanie roli członka zarządu kierownikowi działu
        sql = "SELECT kierownik_id FROM dzial"
        cursor.execute(sql)
        department_manager = cursor.fetchone()[0]
        sql = "UPDATE zarzad SET pracownik_id = {} LIMIT 1".format(department_manager)
        sql_and_assert(cursor, sql, False)
        TEST_CONN.rollback()

def test_insert_dzial():
    with TEST_CONN.cursor() as cursor:
        # dodanie działu, którego kierownikiem jest lider zespołu
        manager_of_other_unit = get_unit_superior_id(cursor, "zespol", "LIMIT 1")
        board_id = get_unit_id(cursor, "zarzad", "LIMIT 1")
        sql = "INSERT INTO dzial (nazwa, zarzad_id, kierownik_id) VALUES('dzial_test_bad', {}, {})".format(board_id, manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        # dodanie działu, którego kierownikiem jest pracownik zespołu
        normal_employee = get_emp_id(cursor, "ORDER BY ID DESC LIMIT 1")    # może działać niepoprawnie jeśli generator nie będzie
                                                                            # przydzielał pracowników w kolejności
        sql = "INSERT INTO dzial (nazwa, zarzad_id, kierownik_id) VALUES('dzial_test_good', {}, {})".format(board_id, normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_update_dzial():
    with TEST_CONN.cursor() as cursor:
        # próba przypisania roli kierownika działu liderowi zespołu
        manager_of_other_unit = get_unit_superior_id(cursor, "zespol", "LIMIT 1")
        sql = "UPDATE dzial SET kierownik_id = {} LIMIT 1".format(manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        # przypisanie roli kierownika działu pracownikowi zespołu
        normal_employee = get_emp_id(cursor, "ORDER BY ID DESC LIMIT 1")    # może działać niepoprawnie jeśli generator nie będzie
                                                                            # przydzielał pracowników w kolejności
        sql = "UPDATE dzial SET kierownik_id = {} LIMIT 1".format(normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_insert_grupa():
    with TEST_CONN.cursor() as cursor:
        # próba dodania grupy, której liderem jest lider zespołu
        manager_of_other_unit = get_unit_superior_id(cursor, "zespol", "LIMIT 1")
        dep_id = get_unit_id(cursor, "dzial", "LIMIT 1")
        sql = "INSERT INTO grupa (nazwa, dzial_id, kierownik_id) VALUES('dzial_test_bad', {}, {})".format(dep_id, manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        # dodanie grupy, której liderem jest pracownik zespołu
        normal_employee = get_emp_id(cursor, "ORDER BY ID DESC LIMIT 1")    # może działać niepoprawnie jeśli generator nie będzie
                                                                            # przydzielał pracowników w kolejności
        sql = "INSERT INTO grupa (nazwa, dzial_id, kierownik_id) VALUES('dzial_test_good', {}, {})".format(dep_id, normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_update_grupa():
    with TEST_CONN.cursor() as cursor:
        # próba przypisania roli lidera grupy liderowi zespołu
        manager_of_other_unit = get_unit_superior_id(cursor, "zespol", "LIMIT 1")
        sql = "UPDATE grupa SET kierownik_id = {} LIMIT 1".format(manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        # przypisanie roli lidera grupy pracownikowi zespołu
        normal_employee = get_emp_id(cursor, "ORDER BY ID DESC LIMIT 1")    # może działać niepoprawnie jeśli generator nie będzie
                                                                            # przydzielał pracowników w kolejności
        sql = "UPDATE grupa SET kierownik_id = {} LIMIT 1".format(normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_insert_zespol():
    with TEST_CONN.cursor() as cursor:
        # próba dodania zespołu, którego liderem jest lider grupy
        manager_of_other_unit = get_unit_superior_id(cursor, "grupa", "LIMIT 1")
        group_id = get_unit_id(cursor, "grupa", "LIMIT 1")
        sql = "INSERT INTO zespol (nazwa, grupa_id, kierownik_id) VALUES('dzial_test_bad', {}, {})".format(group_id, manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        # dodanie zespołu, której liderem jest pracownik zespołu
        normal_employee = get_emp_id(cursor, "ORDER BY ID DESC LIMIT 1")    # może działać niepoprawnie jeśli generator nie będzie
                                                                            # przydzielał pracowników w kolejności
        sql = "INSERT INTO zespol (nazwa, grupa_id, kierownik_id) VALUES('dzial_test_bad', {}, {})".format(group_id, normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()

def test_update_zespol():
    with TEST_CONN.cursor() as cursor:
        manager_of_other_unit = get_unit_superior_id(cursor, "grupa", "LIMIT 1")
        sql = "UPDATE zespol SET kierownik_id = {} LIMIT 1".format(manager_of_other_unit)
        sql_and_assert(cursor, sql, False)
        normal_employee = get_emp_id(cursor, "ORDER BY ID DESC LIMIT 1")    # może działać niepoprawnie jeśli generator nie będzie
                                                                            # przydzielał pracowników w kolejności
        sql = "UPDATE zespol SET kierownik_id = {} LIMIT 1".format(normal_employee)
        sql_and_assert(cursor, sql, True)
        TEST_CONN.rollback()
