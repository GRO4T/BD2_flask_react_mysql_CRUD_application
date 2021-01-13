from flask import jsonify
import app.schemas as schemas
import app.orm as orm
from app import session

def pack_in_json(query_result, convert_to_schema):
    return jsonify([convert_to_schema(res).json() for res in query_result])

def get_all_employees():
    return pack_in_json(session.query(orm.Pracownik), schemas.Pracownik.from_orm)

def get_all_departments():
    return pack_in_json(session.query(orm.Dzial), schemas.Dzial.from_orm)

