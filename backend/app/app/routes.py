from app import app
from app import db
from app import session
from app.orm import Dzial, Pracownik
from flask import jsonify
from pydantic import BaseModel
from pydantic_sqlalchemy import sqlalchemy_to_pydantic

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
