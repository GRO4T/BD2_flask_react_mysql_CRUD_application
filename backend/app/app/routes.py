from app import app
from app import db
from app import session
from app.orm import *


@app.route('/api/test')
def index():
    print([ row[0] for row in db.engine.execute("SELECT * FROM kompetencje_pracownika")])
    return { 'status': 'OK' }

@app.route('/api/dzial')
def dzial():
    departments =[ (i.id, i.nazwa) for i in session.query(Dzial).all() ]
    return {'res': departments}
