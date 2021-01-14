from flask import jsonify
import app.schemas as schemas
import app.orm as orm
from app.request_models import CreateAbsenceRequest
from app import session

def pack_in_json(query_result, convert_to_schema):
    return jsonify([convert_to_schema(res).dict() for res in query_result])

def get_all_employees():
    return pack_in_json(session.query(orm.Pracownik), schemas.Pracownik.from_orm)

def get_employee_by_id(id):
    return pack_in_json(session.query(orm.Pracownik).filter_by(id=id), schemas.Pracownik.from_orm)

def get_employee_by_username(username):
    return pack_in_json(
        session.query(orm.Pracownik).join(orm.Pracownik.konto_uzytkownika).filter_by(nazwa_uzytkownika=username),
        schemas.Pracownik.from_orm
    )

def get_all_departments():
    return pack_in_json(session.query(orm.Dzial), schemas.Dzial.from_orm)

def get_all_subs_for_emp(emp_id):
    query_result = session.query(orm.Pracownik.imie, orm.Pracownik.nazwisko, orm.Zastepstwo.poczatek, orm.Zastepstwo.koniec).\
        join(orm.SlownikZastepstw, orm.Zastepstwo.slowzast_id == orm.SlownikZastepstw.id).\
        join(orm.Pracownik, orm.SlownikZastepstw.pracownik_kogo == orm.Pracownik.id).\
        filter(orm.SlownikZastepstw.pracownik_kto == emp_id).all()
    response = [{"imie": res.imie, "nazwisko": res.nazwisko, "poczatek": res.poczatek, "koniec": res.koniec} for res in query_result]
    return jsonify(response)

def get_all_abs_for_emp(emp_id):
    query_result = session.query(orm.Nieobecnosci).\
        filter(orm.Nieobecnosci.pracownik_id == emp_id).all()
    return pack_in_json(query_result, schemas.Nieobecnosci.from_orm)

def get_employee_by_subordinate(subordinate_id):
    superior_id = session.query(orm.Pracownik).filter_by(id=subordinate_id).one().pracownik_id
    query_result = session.query(orm.Pracownik).filter_by(id=superior_id)
    return pack_in_json(query_result, schemas.Pracownik.from_orm)

def get_employee_by_superior(superior_id):
    return pack_in_json(
        session.query(orm.Pracownik).filter_by(pracownik_id=superior_id).all(),
        schemas.Pracownik.from_orm
    )

def insert_absence(request: CreateAbsenceRequest):
    absence = orm.Nieobecnosci(poczatek=request.poczatek, koniec=request.koniec, pracownik_id=request.id)
    try:
        session.add(absence)
        session.commit()
    except:
        session.rollback()
        raise

def delete_absence(id):
    del_rows = 0
    try:
        session.query(orm.Zastepstwo).filter_by(nieobecnosci_id=id).delete()
        del_rows = session.query(orm.Nieobecnosci).filter_by(id=id).delete()
        session.commit()
    except:
        session.rollback()
    return del_rows

