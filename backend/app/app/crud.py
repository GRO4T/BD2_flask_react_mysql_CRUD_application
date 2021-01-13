from flask import jsonify
import app.schemas as schemas
import app.orm as orm
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
    query_result = session.query(orm.SlownikZastepstw.pracownik_kogo, orm.Zastepstwo.poczatek, orm.Zastepstwo.koniec).\
        join(orm.SlownikZastepstw, orm.Zastepstwo.slowzast_id == orm.SlownikZastepstw.id).\
        filter(orm.SlownikZastepstw.pracownik_kto == emp_id).all()
    response = [{"pracownik_kogo": res.pracownik_kogo, "poczatek": res.poczatek, "koniec": res.koniec} for res in query_result]
    return jsonify(response)

def get_all_abs_for_emp(emp_id):
    query_result = session.query(orm.Nieobecnosci).\
        filter(orm.Nieobecnosci.pracownik_id == emp_id).all()
    return pack_in_json(query_result, schemas.Nieobecnosci.from_orm)

