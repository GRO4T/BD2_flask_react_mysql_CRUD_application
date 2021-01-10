from app import app
from app import db

@app.route('/api/test')
def index():
    print([ row[0] for row in db.engine.execute("SELECT * FROM kompetencje_pracownika")])
    return { 'status': 'OK' }
