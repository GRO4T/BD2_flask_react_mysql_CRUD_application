from flask import jsonify
import app.schemas as schemas
import app.orm as orm
from app.request_models import CreateAbsenceRequest, GetPresentTimePeriodRequest, CreateSubRequest
from app import session
from sqlalchemy import or_, and_
from app.exception import NoEntryInSubDict

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

def get_all_subs_for_abs(abs_id):
    return pack_in_json(
        session.query(orm.Zastepstwo).filter_by(nieobecnosci_id=abs_id).all(),
        schemas.Zastepstwo.from_orm
    )

def get_subordinate_abs_and_subs(superior_id):
    response_data = []
    suboridanates = session.query(orm.Pracownik).filter_by(pracownik_id=superior_id).all()
    for suboridinate in suboridanates:
        emp_data = schemas.Pracownik.from_orm(suboridinate).dict()
        absences = session.query(orm.Nieobecnosci).filter_by(pracownik_id=suboridinate.id).all()
        emp_data["absences"] =  [schemas.Nieobecnosci.from_orm(row).dict() for row in absences]
        for i in range(len(absences)):
            emp_data["absences"][i]["substitutions"] = [
                schemas.Zastepstwo.from_orm(row).dict()
                for row in session.query(orm.Zastepstwo).filter_by(nieobecnosci_id=absences[i].id).all()
            ]
        response_data.append(emp_data)
    return jsonify(response_data)

def get_subordinate_present_in_period(request: GetPresentTimePeriodRequest):
    query_result = session.query(orm.Pracownik).\
        join(orm.Nieobecnosci, orm.Nieobecnosci.pracownik_id == orm.Pracownik.id).\
        filter(
            and_(
                or_(
                    orm.Nieobecnosci.koniec < request.poczatek, orm.Nieobecnosci.poczatek > request.koniec
                ),
                orm.Pracownik.pracownik_id == request.id_przelozonego
            )
        ).all()
    return pack_in_json(query_result, schemas.Pracownik.from_orm)

def insert_substitution(request: CreateSubRequest):
    absence = session.query(orm.Nieobecnosci).filter_by(id=request.id_nieobecnosci).one()
    sub_dict = session.query(orm.SlownikZastepstw).filter(
        and_(
            orm.SlownikZastepstw.pracownik_kogo == absence.pracownik_id,
            orm.SlownikZastepstw.pracownik_kto == request.id_pracownika
        )
    ).one_or_none()

    if sub_dict is None:
        raise NoEntryInSubDict()

    sub = orm.Zastepstwo(
        poczatek=absence.poczatek, koniec=absence.koniec, nieobecnosci_id=absence.id, slowzast_id=sub_dict.id
    )
    try:
        session.add(sub)
        session.commit()
    except:
        session.rollback()
        raise

def delete_substitution(id):
    del_rows = 0
    try:
        del_rows = session.query(orm.Zastepstwo).filter_by(id=id).delete()
        session.commit()
    except:
        session.rollback()
    return del_rows
