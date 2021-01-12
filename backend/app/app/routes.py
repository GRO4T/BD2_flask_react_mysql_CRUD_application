from app import app
from app import db
from app import session
from app.orm import Dzial, Pracownik
from flask import jsonify
from pydantic import BaseModel
from pydantic_sqlalchemy import sqlalchemy_to_pydantic
from flask_jwt import JWT, jwt_required, current_identity
from werkzeug.security import safe_str_cmp
import hashlib

def auth(username, password):
    user = session.query(KontoUzytkownika).filter_by(nazwa_uzytkownika=username).first()
    if user is not None and user.haslo == hashlib.sha256(password.encode()).hexdigest():
        return user
def identity(payload):
    user_id = payload['identity']
    return session.query(KontoUzytkownika).filter_by(id=user_id).first()

jwt = JWT(app, auth, identity)

PydanticPracownik = sqlalchemy_to_pydantic(Pracownik)

@app.route('/api/test')
def index():
    print([ row[0] for row in db.engine.execute("SELECT * FROM kompetencje_pracownika")])
    return { 'status': 'OK' }

@app.route('/api/dzial')
def dzial():
    departments =[ (i.id, i.nazwa) for i in session.query(Dzial).all() ]
    return {'res': departments}

@app.route('/api/pracownik')
def pracownik():
    return jsonify([PydanticPracownik.from_orm(prac).json() for prac in session.query(Pracownik).all()])

@app.route('/api/auth_test')
@jwt_required()
def auth_test():
    return "%s" % current_identity
