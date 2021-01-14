from app import app, session
from app.orm import KontoUzytkownika
import app.crud as crud
import app.schemas as schemas
from app.request_models import CreateAbsenceRequest
from flask_pydantic import validate
from flask import request
from http import HTTPStatus

from flask_jwt import JWT, jwt_required, current_identity
from werkzeug.security import safe_str_cmp
import hashlib
from app.orm import *


@app.route('/api/test')
def index():
    return { 'status': 'OK' }


def auth(username, password):
    user = session.query(KontoUzytkownika).filter_by(nazwa_uzytkownika=username).first()
    if user is not None and user.haslo == hashlib.sha256(password.encode()).hexdigest():
        return user

def identity(payload):
    user_id = payload['identity']
    return session.query(KontoUzytkownika).filter_by(id=user_id).first()

jwt = JWT(app, auth, identity)

@app.route('/api/auth_test')
@jwt_required()
def auth_test():
    return "%s" % current_identity


@app.route('/api/department', methods=['GET'])
def department():
    return crud.get_all_departments()

@app.route('/api/employee', methods=['GET'])
def employee():
    return crud.get_all_employees()

@app.route('/api/employee/by-id/<id>', methods=['GET'])
def employee_by_id(id):
    return crud.get_employee_by_id(id)

@app.route('/api/employee/by-username/<username>', methods=['GET'])
def employee_by_username(username):
    return crud.get_employee_by_username(username)

@app.route('/api/substitution/by-substitute/<id>', methods=['GET'])
def subs_by_substitute(id):
    return crud.get_all_subs_for_emp(id)

@app.route('/api/absence/by-emp-id/<id>', methods=['GET'])
def abs_by_emp_id(id):
    return crud.get_all_abs_for_emp(id)

@app.route('/api/employee/by-subordinate/<id>', methods=['GET'])
def employee_by_subordinate(id):
    return crud.get_employee_by_subordinate(id)

@app.route('/api/absence', methods=['POST'])
@validate(body=CreateAbsenceRequest)
def add_absence():
    try:
        crud.insert_absence(request.body_params)
    except:
        return {}, HTTPStatus.CONFLICT
    return {}, HTTPStatus.OK

@app.route('/api/absence/<id>', methods=['DELETE'])
def delete_absence(id):
    affected_rows = crud.delete_absence(id)
    return {"affected rows": affected_rows}, HTTPStatus.OK

