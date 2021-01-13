from app import app, session

from flask_jwt import JWT, jwt_required, current_identity
from werkzeug.security import safe_str_cmp
import hashlib

from app.crud import *

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


@app.route('/api/dzial')
def dzial():
    return get_all_departments()

@app.route('/api/pracownik')
def pracownik():
    return get_all_employees()

